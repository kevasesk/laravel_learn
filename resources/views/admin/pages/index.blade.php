@extends('admin.layouts.main')

@section('title')
    Pages
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card buttons">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route("admin.pages.create") }}'" >New</button>
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
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{$page['id']}}</td>
                                        <td>{{$page['is_active'] ? 'Yes' : 'No'}}</td>
                                        <td>{{$page['title']}}</td>
                                        <td>{{$page['url']}}</td>
                                        <td>{{ $page->getContentFormatted() }}</td>
                                        <td>
                                            <a href="{{ route('admin.pages.edit',['id' => $page['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.pages.destroy',['id' => $page['id']]) }}">Delete</a>
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
