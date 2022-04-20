@extends('admin.layouts.main')

@section('title')
    {{$title}}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('common.notifications')
                    <form action="{{route($routeSuffix.".list")}}" method="get">
                        <div style="padding: 20px 0px;">
                            <button type="button" class="btn btn-success btn-lg text-white" style="width:200px;" onclick="window.location='{{ route($routeSuffix.".create") }}'" >New</button>
                            <button type="submit" class="btn btn-info btn-lg text-white" style="width:200px;float: right;" name="filter">Filter/Clear</button>
                        </div>
                        <div class="table-responsive">
                            <table
                                id="zero_config"
                                class="table table-striped table-bordered"
                            >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        @foreach($columns as $column)
                                            @continue(isset($column['hiddenInList']) && $column['hiddenInList'])
                                            <th>{{$column['title']}}</th>
                                        @endforeach
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td></td>
                                    @foreach($columns as $column)
                                        @continue(isset($column['hiddenInList']) && $column['hiddenInList'])
                                        <td>
                                            <input name="{{$column['column']}}" data-role="filter"/>
                                        </td>
                                    @endforeach
                                    <td></td>
                                    <td></td>
                                </tr>
                                @php $number = 1 @endphp
                                @foreach($entities as $entity)
                                    <tr>
                                        <td>{{$number}}</td>@php $number++ @endphp
                                        @foreach($columns as $column)
                                            @continue(isset($column['hiddenInList']) && $column['hiddenInList'])
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
                            {{$entities->links('admin.layouts.struct.paginator')}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
