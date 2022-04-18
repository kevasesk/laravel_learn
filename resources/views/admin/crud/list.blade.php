@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('admin.layouts.struct.notifications')
                    <div class="card">
                        <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route($routeSuffix.".create") }}'" >New</button>
                    </div>
                    <div class="table-responsive">
                        <table
                            id="zero_config"
                            class="table table-striped table-bordered"
                        >
                            <thead>
                                <tr>
                                    @foreach($columns as $column)
                                        @continue(isset($column['hidden']) && $column['hidden'])
                                        <th>{{$column['title']}}</th>
                                    @endforeach
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entities as $entity)
                                    <tr>
                                        @foreach($columns as $column)
                                            @continue(isset($column['hidden']) && $column['hidden'])
                                            @if(!isset($column['type']))
                                                <td>{{$entity[$column['column']]}}</td>
                                            @elseif($column['type'] == 'boolean')
                                                <td>{{$entity[$column['column']] ? 'Yes' : 'No'}}</td>

                                            @elseif($column['type'] == 'image')
                                                <td>
                                                    <img src="{{ asset('storage/'.$entity[$column['column']]) }}" alt="no img" width="100" height="100"/>
                                                </td>
                                            @else
                                                <td>{{$entity[$column['column']]}}</td>
                                            @endif
                                        @endforeach
                                        <td>
                                            <a href="{{ route($routeSuffix.'.edit',['id' => $entity['id']]) }}">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route($routeSuffix.'.destroy',['id' => $entity['id']]) }}">Delete</a>
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
