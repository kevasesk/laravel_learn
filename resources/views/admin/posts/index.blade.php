@extends('admin.layouts.main')

@section('title')
    Posts
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.posts.create") }}'" >New</button>
                        <button type="button" class="btn btn-info btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.posts.send") }}'" >Send Email</button>
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
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{$post['id']}}</td>
                                        <td>{{$post['is_active'] ? 'Yes' : 'No'}}</td>
                                        <td>{{$post['title']}}</td>
                                        <td>{{$post['url']}}</td>
                                        <td>{{$post['desc']}}</td>
                                        <td>
                                            <img src="{{ asset('storage/'.$post['thumbnail']) }}" alt="no img" width="100" height="100"/>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.posts.edit',['id' => $post['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.posts.destroy',['id' => $post['id']]) }}">Delete</a>
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
