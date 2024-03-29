<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Redirect;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    protected $modelClass;

    protected $routeClass;

    protected $modelTitle = '';

    protected $columns = [];

    protected $validateRules = [];

    protected $fileAttributes = [];

    protected $fileDir = '';

    protected $relations = [];

    protected $redirectType = null;

    public function index(Request $request)
    {
        $entities = $this->modelClass::query();
        $message = '';
        if($request->has('filter')){
            foreach ($request->all() as $column => $value){
                if($column != 'filter' && $value){
                    $entities->where($column, 'like', '%'.$value.'%');
                }
            }
        }
        if($request->has('mass_action') && $request->massaction){
            $idsToDelete = array_keys($request->massaction);
            $this->modelClass::query()->whereIn('id', $idsToDelete)->delete();
            $message = 'Entities was removed';
        }
        $entities = $entities->paginate(10);

        if($this->redirectType){
            $redirects = Redirect::query()->where('type','=', $this->redirectType)->get();
            $mapped = [];
            foreach ($redirects as $redirect){
                $mapped[$redirect->entity_id] = $redirect->url;
            }
            foreach ($entities as $entity){
                if(isset($mapped[$entity->id])){
                    $entity->url = $mapped[$entity->id];
                }
            }
        }
        $route = new $this->routeClass();

//        $breadcrumbs = [
//            ['url' => $route->routeSuffix, 'title' => $this->modelTitle]
//        ];

        return view('admin.crud.list',[
            'columns' => $this->columns,
            'entities' => $entities,
            'title' => $this->modelTitle,
            'routeSuffix' => $route->routeSuffixName,
            //'breadcrumbs' => $breadcrumbs
        ])->with('success', $message);
    }

    public function create()
    {
        $entity = new $this->modelClass();
        $route = new $this->routeClass();
        $title = $this->modelTitle;
        $columns = $this->columns;
        $routeSuffix = $route->routeSuffixName;
        $breadcrumbs = [
            ['url' => $route->routeSuffix, 'title' => $this->modelTitle]
        ];
        return view('admin.crud.form', compact('entity', 'title','columns', 'routeSuffix', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
        $content = $request->get('content');
        if (preg_match('/data:image\/(\w+);base64,/', $content, $type)) {
            $data = substr($content, strpos($content, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif

            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }
            $data = str_replace( ' ', '+', $data );
            $data = base64_decode($data);

            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }
            //TODO save image and insert it like link to content
            //$res = \Illuminate\Support\Facades\Storage::put("public/media/qwerty11_img.$type", $data, 'public');
            //$res = file_put_contents("/var/www/html/qwerty_img.$type", $data);
        }


        $data = $request->all();
        $route = new $this->routeClass();

        $request->validate($this->validateRules);
        if(!$request->id){
            $entity = new $this->modelClass($data);
        }else{
            $entity = $this->modelClass::query()->where('id','=', $request->id)->first();
            $entity->fill($data);
        }



        foreach ($this->fileAttributes as $fileAttribute){
            if($request->file($fileAttribute)){
                $filePath = $request->file($fileAttribute)->store($this->fileDir, 'public');
            }else{
                $filePath = $entity->{$fileAttribute};
            }
            $entity->{$fileAttribute} = $filePath;
        }
        $this->processOneToMany($request, $entity);
        $this->processManyToMany($request, $entity);
        $entity->save();
        if($this->redirectType){
            $url = !$request->url ? \Illuminate\Support\Str::slug($request->title, '-') : $request->url;

            $redirect = Redirect::query()->where('url','=', $url)->first();
            if(!$redirect){
                $newRedirect = new Redirect();
                $newRedirect->url = $url;
                $newRedirect->entity_id = $entity->id;
                $newRedirect->type = $this->redirectType;
                $newRedirect->save();
            }else{
                if($redirect->entity_id != $entity->id || $redirect->type != $this->redirectType){
                    $validator = Validator::make([], []);
                    $validator->getMessageBag()->add('url', 'This url already in use!');
                    return back()->withErrors($validator);
                }
            }
        }
        //return redirect()->route($route->routeSuffixName.'.list')->with('success', 'Changes Saved!');
        return back()->with('success', 'Changes Saved!');
    }
    public function processOneToMany($request, $entity)
    {
        if($this->relations){
            foreach ($this->relations as $relationType => $relationFields){
                foreach ($relationFields as $relationFieldData){
                    if($relationType == 'onetomany'){
                        $relationField = $relationFieldData['relationField'];
                        $relationChildFields = $relationFieldData['fields'];
                        $type = $relationFieldData['type'];

                        $oldValues = $entity->{$relationField};
                        $entity->{$relationField}()->delete();// TODO remove unused images from file system
                        $relationItems = [];

                        $position = 0;
                        foreach ($oldValues as $oldValue){
                            $row = [];
                            $row[$relationFieldData['key']] = $entity->id;
                            foreach ($relationChildFields as $childField){
                                $row[$childField] = $oldValue->{$childField};
                            }
                            $relationItems[] = $row;
                            $position++;
                        }

                        if($type == 'images'){
                            $images = $request->file($relationField);
                            if($images){
                                foreach ($images as $image){
                                    $relationItems[] = [
                                        $relationFieldData['key'] => $entity->id,
                                        'thumbnail' => $image->store($this->fileDir.'/'.$relationField, 'public'),
                                        'position' => $position
                                    ];
                                    $position++;
                                }
                            }
                        }
                        if($type == 'tabs'){
                            $relationItems = [];
                            $row[$relationFieldData['key']] = $entity->id;
                            foreach ($request->{$relationField} as $tab){
                                $row = [];
                                $row[$relationFieldData['key']] = $entity->id;
                                foreach ($relationChildFields as $childField){
                                    if($childField == 'position'){
                                        $row[$childField] = $position;
                                    }else{
                                        $row[$childField] = $tab[$childField];
                                    }
                                }
                                $toAdd = true;
                                foreach ($row as $val){
                                    if($val === null){
                                        $toAdd = false;
                                        break;
                                    }
                                }
                                if($toAdd){
                                    $relationItems[] = $row;
                                    $position++;
                                }
                            }
                        }
                        $entity->{$relationField}()->createMany($relationItems);
                    }
                }

            }
        }
    }

    public function processManyToMany($request, $entity)
    {

    }
    public function edit($id)
    {
        $route = new $this->routeClass();
        $columns = $this->columns;
        $entity = $this->modelClass::query()->where('id','=', $id)->first();
        if($this->redirectType){
            $redirect = Redirect::query()
                ->where('entity_id','=', $id)
                ->where('type','=', $this->redirectType)
                ->first();
            if($redirect){
                $entity->url = $redirect->url;
            }
        }
        $title = $this->modelTitle;
        $routeSuffix = $route->routeSuffixName;
        $breadcrumbs = [
            ['url' => $route->routeSuffix, 'title' => $this->modelTitle],
            ['title' => $entity->title ?? $entity->firstname]
        ];
        return view('admin.crud.form', compact('entity', 'title', 'columns', 'routeSuffix', 'breadcrumbs'));
    }

    public function destroy($id)
    {
        $route = new $this->routeClass();
        $entity = $this->modelClass::query()->where('id','=', $id)->first();
        $entity->delete();
        return redirect()->route($route->routeSuffixName.'.list')->with('success', 'Item was deleted');
    }
}
