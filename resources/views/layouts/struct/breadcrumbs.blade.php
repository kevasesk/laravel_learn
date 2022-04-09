@if(isset($breadcrumbs))
    <ul class="other-link-sub pull-right">
        @foreach($breadcrumbs as $breadcrumb)
            <li class="{{ $loop->last ? 'active' : '' }}">
                @if(!$loop->last)
                    <a href="{{ url($breadcrumb['url']) }}">{{$breadcrumb['title']}}</a>
                @else
                    {{$breadcrumb['title']}}
                @endif
            </li>
        @endforeach
    </ul>
@endif
