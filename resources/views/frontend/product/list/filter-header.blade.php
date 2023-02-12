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
                <span>{{__('Show')}}</span>
                <button class="dropdown-toggle" type="button" data-toggle="dropdown">3</button>
                <form action="">
                    <ul class="dropdown-menu">
                        <li><a href="#" onclick="$(this).closest('form').submit();">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                    </ul>
                </form>
                <span>{{__('per page')}}</span>
            </div>
            <div class="box sort pull-right">
                <span>{{__('Sort by:')}}</span>
                <button class="dropdown-toggle" type="button" data-toggle="dropdown" id="menu2">
                    <span class="dropdown-label">Featured</span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu2">
                    <li><a href="#" title="">{{__('Lower to high price')}}</a></li>
                    <li><a href="#" title="">{{__('High to lower price')}}</a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
