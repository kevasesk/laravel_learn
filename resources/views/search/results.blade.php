@extends('layouts.main')

@section('title')
    Search Results
@endsection

@section('content')
    <div class="widget-product-collection">
        <div class="row">
            <h2>Some title</h2>
        </div>
        <div class="row">
            @foreach($results as $resultType => $items)
                @if(count($items))
                    <p>{{$resultType}}</p>
                    @foreach($items as $item)
                        <div class="col-md-12 col-sm-12 col-xs-12 ">
                            <div class="product-item ver2">
                                <div class="prod-item img">
                                    <a href="#"><img src="img/product-collection/product1.png" alt="images" class="img-responsive"></a>
                                </div>
                                <div class="prod-info-ver2">
                                    <h3><a href="#" title="">{{$item->title}}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
@endsection


