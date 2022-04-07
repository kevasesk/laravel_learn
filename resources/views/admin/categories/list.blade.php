@extends('admin.layouts.main')

@section('title')
    Categories
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card buttons">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.categories.create") }}'" >New</button>
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
                                @foreach($entities as $entity)
                                    <tr>
                                        <td>{{$entity['id']}}</td>
                                        <td>{{$entity['title']}}</td>
                                        <td>{{$entity['url']}}</td>
                                        <td>{{$entity['is_active'] ? 'Yes' : 'No'}}</td>
                                        <td>{{$entity['parent_id']}}</td>
                                        <td>
                                            @isset($entity['thumbnail'])
                                                <img src="{{ asset('storage/'.$entity['thumbnail']) }}" alt="no image" width="50" height="50"/>
                                            @endisset
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.edit',['id' => $entity['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.categories.destroy',['id' => $entity['id']]) }}">Delete</a>
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
