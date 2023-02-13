<div class="filter-block bd">
    <div class="row">
        <div class="col-md-5">
            <div class="box box-view">
                <span>{{__('Showing')}} {{$showingStart}}–{{$showingEnd}} {{__('of')}} {{$totalCount}} {{__('results')}}</span>
                <div class="button-view">
                    <span class="col"><i class="ion-ios-keypad fa-3a"></i></span>
                    <span class="list"><i class="icon-grid-4"></i></span>
                </div>
            </div>
        </div>
        <div class="col-md-7 margin-top3">
            <div class="box show pull-left">
                <span>{{__('Show per page')}}</span>
                <form action="{{ route('changeChunk') }}">
                    <input type="hidden" name="chunk" value="{{$chunkSize}}" id="chunk">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown">{{$chunkSize}}</button>
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="$('#chunk').val(5);$(this).closest('form').submit();">5</a></li>
                        <li><a href="#" onclick="$('#chunk').val(10);$(this).closest('form').submit();">10</a></li>
                        <li><a href="#" onclick="$('#chunk').val(15);$(this).closest('form').submit();">15</a></li>
                    </ul>
                </form>
            </div>
            <div class="box sort pull-right">
                <span>{{__('Sort by:')}}</span>
                <form action="{{ route('changeSort') }}">
                    <input type="hidden" name="sort" value="{{$sort}}" id="sort">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">
                        <span class="dropdown-label">{{$sortValue}}</span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                        <li><a href="#" title="" onclick="$('#sort').val(0);$(this).closest('form').submit();">{{__('Featured')}}</a></li>
                        <li><a href="#" title="" onclick="$('#sort').val(1);$(this).closest('form').submit();">{{__('Lower to high price')}}</a></li>
                        <li><a href="#" title="" onclick="$('#sort').val(2);$(this).closest('form').submit();">{{__('High to lower price')}}</a></li>
                    </ul>
                </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
