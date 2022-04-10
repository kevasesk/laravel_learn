<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                @foreach($adminMenu as $item)
                    <li class="sidebar-item">
                        <a
                            class="sidebar-link waves-effect waves-dark sidebar-link {{isset($item['children']) ? 'has-arrow' : ''}}"
                            href="{{ $item['url'] ?? '#' }}"
                            aria-expanded="false"
                        ><i class="mdi {{ isset($item['icon']) ? $item['icon'] : 'mdi-view-dashboard'}}"></i
                            ><span class="hide-menu">{{ $item['title'] }}</span></a
                        >
                        @isset($item['children'])
                            <ul aria-expanded="false" class="collapse first-level">
                                @foreach($item['children'] as $child)
                                    <li class="sidebar-item">
                                        <a href="{{$child['url']}}" class="sidebar-link">
                                            <i class="mdi {{ isset($child['icon']) ? $child['icon'] : 'mdi-note-outline'}}"></i>
                                            <span class="hide-menu">{{$child['title']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endisset
                    </li>
                @endforeach

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
