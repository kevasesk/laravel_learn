<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CrudController extends Controller
{
    protected $modelClass;

    protected $routeClass;

    protected $modelTitle = '';

//    protected $columns = [
//        [
//            'column' => 'id',
//            'title' => 'Id',
//        ]
//    ];

    protected $columns = [];

    protected $validateRules = [];

    protected $fileAttributes = [];

    protected $fileDir = '';

    protected $relations = [];

    public function index()
    {
        $entities = $this->modelClass::all();
        $route = new $this->routeClass();

        $breadcrumbs = [
            ['url' => $route->routeSuffix, 'title' => $this->modelTitle]
        ];

        return view('crud.list',[
            'columns' => $this->columns,
            'entities' => $entities,
            'title' => $this->modelTitle,
            'routeSuffix' => $route->routeSuffixName,
            'breadcrumbs' => $breadcrumbs
        ]);
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
        return view('crud.create', compact('entity', 'title','columns', 'routeSuffix', 'breadcrumbs'));
    }

    public function store(Request $request)
    {
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
        if($this->relations){
            foreach ($this->relations as $relationType => $relationData){
                if($relationType == 'onetomany'){
                    $relationField = $relationData[0]['relationField'];
                    $oldValues = $entity->{$relationField};
                    $entity->{$relationField}()->delete();
                    // TODO remove unused images from file system
                    $relationItems = [];
                    $images = $request->file($relationField);

                    $position = 0;
                    foreach ($oldValues as $oldValue){
                        $relationItems[] = [
                            $relationData[0]['key'] => $entity->id,
                            'thumbnail' => $oldValue->thumbnail,
                            'position' => $oldValue->position
                        ];
                        $position++;
                    }
                    if($images){
                        foreach ($images as $image){
                            $relationItems[] = [
                                $relationData[0]['key'] => $entity->id,
                                'thumbnail' => $image->store($this->fileDir.'/'.$relationField, 'public'),
                                'position' => $position
                            ];
                            $position++;
                        }
                    }
                    $entity->{$relationField}()->createMany($relationItems);
                }

            }
//            $entity->{$this->relations}()->detach();
//            $entity->{$this->relations}()->attach($data[$this->relations]);
        }

        $entity->save();
        //return redirect()->route($route->routeSuffixName.'.list');
        return back();
    }

    public function edit($id)
    {
        $route = new $this->routeClass();
        $columns = $this->columns;
        $entity = $this->modelClass::query()->where('id','=', $id)->first();
        $title = $this->modelTitle;
        $routeSuffix = $route->routeSuffixName;
        $breadcrumbs = [
            ['url' => $route->routeSuffix, 'title' => $this->modelTitle],
            ['title' => $entity->title ?? $entity->firstname]
        ];
        return view('crud.create', compact('entity', 'title', 'columns', 'routeSuffix', 'breadcrumbs'));
    }

    public function destroy($id)
    {
        $route = new $this->routeClass();
        $entity = $this->modelClass::query()->where('id','=', $id)->first();
        $entity->delete();
        return redirect()->route($route->routeSuffixName.'.list');
    }
}
