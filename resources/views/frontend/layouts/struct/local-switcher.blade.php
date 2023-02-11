<div class="language dropdown">
    <a id="label2" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        <span class="icon"><i class="ion-ios-world-outline" aria-hidden="true"></i></span>
        <span>{{__('English locale')}}</span>
        <span class="ion-chevron-down"></span>
    </a>
    <ul class="dropdown-menu" aria-labelledby="label2">
        <li><a href="{{ route('locale', ['locale' =>'en']) }}">En</a></li>
        <li><a href="{{ route('locale', ['locale' =>'ru']) }}">Ru</a></li>
        <li><a href="{{ route('locale', ['locale' =>'uk']) }}">Uk</a></li>
    </ul>
</div>
