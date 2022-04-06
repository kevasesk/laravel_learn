@extends('admin.layouts.main')

@section('title')
    Products
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card buttons">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.products.create") }}'" >New</button>
                    </div>
                    <div class="table-responsive">
                        <table
                            id="zero_config"
                            class="table table-striped table-bordered"
                        >
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        <th>{{$column}}</th>
                                    @endforeach
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$product['id']}}</td>
                                        <td>{{$product['sku']}}</td>
                                        <td>{{$product['title']}}</td>
                                        <td>{{$product['url']}}</td>
                                        <td>{{$product['price']}}</td>
                                        <td>{{$product['qty']}}</td>
                                        <td>{{$product['is_in_stock'] ? 'Yes' : 'No'}}</td>
                                        <td>{{$product['is_active'] ? 'Yes' : 'No'}}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$product['thumbnail']) }}" alt="no image" width="50" height="50"/>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.edit',['id' => $product['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.products.destroy',['id' => $product['id']]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
