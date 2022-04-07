@extends('admin.layouts.main')

@section('title')
    Blog Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.blog.categories.create") }}'" >New</button>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category['id']}}</td>
                                        <td>{{$category['is_active'] ? 'Yes' : 'No'}}</td>
                                        <td>{{$category['title']}}</td>
                                        <td>{{$category['url']}}</td>
                                        <td>{{$category['desc']}}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$category['thumbnail']) }}" alt="no img" width="100" height="100"/>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.categories.edit',['id' => $category['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.categories.destroy',['id' => $category['id']]) }}">Delete</a>
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
