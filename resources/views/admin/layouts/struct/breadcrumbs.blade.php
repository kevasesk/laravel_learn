<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">@yield('title', 'Admin')</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @if(isset($breadcrumbs))
                            @foreach($breadcrumbs as $breadcrumb)
                                <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                                    @if(!$loop->last)
                                        <a href="{{ url($breadcrumb['url']) }}">{{$breadcrumb['title']}}</a>
                                    @else
                                        {{$breadcrumb['title']}}
                                    @endif
                                </li>
                            @endforeach
                        @else
                            <li class="breadcrumb-item active" aria-current="page">
                                Admin
                            </li>
                        @endif
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
