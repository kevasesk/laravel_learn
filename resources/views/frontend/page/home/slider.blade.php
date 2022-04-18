<div class="row top-row">
    <div class="col-md-9 col-sm-12 col-xs-12">
        <div class="single-item js-banner">
            @foreach($homeSlider as $slide)
                <div class="slide-img">
                    <img src="{{Resizer::get($slide->thumbnail, 870, 490)}}" alt="image" class="img-reponsive">
                    <div class="slide-content">
                        <h3><span class="strong">{{$slide->title}}</span><br>for all</h3>
                        <p>{{$slide->desc}}</p>
                    </div>
                    @if($slide->url)
                        <a href="{{url($slide->url)}}" class="slide-button">shop now</a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
