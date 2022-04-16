@extends('layouts.main')

@section('title')
Search Results
@endsection

@section('content')
    <div>
        @if($isAny)
            <div class="row">
                @foreach($results as $resultType => $items)
                    @if(count($items))
                        <div class="results-section">
                            <div class="header">
                                <h3>{{ucfirst($resultType)}}s:</h3>
                            </div>
                            @php $number = 1 @endphp
                            @foreach($items as $item)
                                @if($number == 4)
                                    @php $number = 1 @endphp
                                @endif
                                <div class="item{{$number}}">
                                    <div class="product-item ver2">
                                        <div class="prod-item img">
                                            <a href="{{url($item->url)}}"><img src="{{ Resizer::get($item->thumbnail, 370, 170) }}" alt="images" class="img-responsive"></a>
                                        </div>
                                        <div class="prod-info-ver2">
                                            <h6><a href="{{url($item->url)}}" title="">{{$item->title}}</a></h6>
                                        </div>
                                    </div>
                                </div>
                                @php $number++ @endphp
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <div class="row">
                No results
            </div>
        @endif
    </div>
@endsection
{{--TODO add pagination--}}


