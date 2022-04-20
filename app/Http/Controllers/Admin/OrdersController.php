<?php

namespace App\Http\Controllers\Admin;

class OrdersController extends CrudController
{
    protected $modelClass = \App\Models\Order::class;

    protected $routeClass = \App\Routes\OrdersRoutes::class;

    protected $modelTitle = 'Orders';

    protected $columns = [
        [ 'column' => 'id', 'title' => 'Id', 'hiddenInForm' => true],
        [ 'column' => 'increment_id', 'title' => 'Increment ID' ],
        [ 'column' => 'cart_id', 'title' => 'Cart ID' ],
        [ 'column' => 'status', 'title' => 'Status' ],
    ];

    public function edit($id)
    {
        $route = new $this->routeClass();
        $columns = $this->columns;
        $order = $this->modelClass::query()->where('id','=', $id)->first();

        $title = $this->modelTitle;
        $routeSuffix = $route->routeSuffixName;
        $breadcrumbs = [
            ['url' => $route->routeSuffix, 'title' => $this->modelTitle],
            ['title' => $entity->title ?? $order->firstname]
        ];
        return view('admin.order.view', compact('order', 'title', 'columns', 'routeSuffix', 'breadcrumbs'));
    }
}
