<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;

class MenuController extends Controller
{
    public function index()
    {
        return view('admin/menu');
    }
    public function get()
    {
        $menuItems = MenuItem::query()->orderBy('position')->get()->all();
        $formatted = [];
        foreach ($menuItems as $menuItem){
            $formatted[] = [
                'id' => $menuItem->id,
                'parent' => $menuItem->parent_id ?: '#',
                'text' => $menuItem->title,
                'li_attr' => [
                    'data-url' => $menuItem->url,
                    'data-icon' => $menuItem->icon,
                    'data-title' => $menuItem->title,
                    'data-parent' => $menuItem->parent_id ?: '#',
                ]
            ];
        }
        return $formatted;

    }
    public function save(Request $request)
    {
        try{
            if($request->jsonTree){
                $result = [];
                $tree = json_decode($request->jsonTree, true);
                $position = 0;
                foreach ($tree as $item){
                    $result[] = [
                        'id' => $item['id'],
                        'title' => $item['text'],
                        'parent_id' => $item['parent'] == '#' ? null : (int)$item['parent'],
                        'url' => isset($item['li_attr']['data-url']) ? $item['li_attr']['data-url'] : '#',
                        'position' => $position
                    ];
                    $position++;
                }
                foreach ($result as $item){
                    $menuItem = MenuItem::query()->find($item['id']);
                    if(!$menuItem){
                        $menuItem = new MenuItem();
                        $menuItem->id = MenuItem::latest()->first()->id + 1;
                    }
                    if(
                        $menuItem->title != $item['title'] ||
                        $menuItem->parent_id != $item['parent_id'] ||
                        $menuItem->url != $item['url'] ||
                        $menuItem->position != $item['position']
                    ){
                        $menuItem->title = $item['title'];
                        $menuItem->parent_id = $item['parent_id'];
                        $menuItem->url = $item['url'];
                        $menuItem->position = $item['position'];
                        $menuItem->save();
                    }
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Changes saved!',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error',
        ]);

    }
    public function saveItem(Request $request)
    {
        try{
            if($request->id && $request->title && $request->url){
                $menuItem = MenuItem::query()->find($request->id);
                if(!$menuItem){
                    $menuItem = new MenuItem();
                    $menuItem->id = MenuItem::latest()->first()->id + 1;
                }
                $menuItem->title = $request->title;
                $menuItem->url = $request->url;
                $menuItem->parent_id = $request->parent == '#' ? null : $request->parent;
                $menuItem->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Changes saved!',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error',
        ]);
    }
    public function deleteItem(Request $request)
    {
        try{
            if($request->id){
                $menuItem = MenuItem::query()->find($request->id);
                $menuItem->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Changes saved!',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
        return response()->json([
            'status' => 'error',
            'message' => 'Error',
        ]);
    }
}
