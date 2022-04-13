<!DOCTYPE html>
<html lang="en">
    @include('layouts.struct.head')
    <body>
        @include('layouts.struct.modal')
        @include('layouts.struct.header')
        <section>
            <div class="container">
                <div class="heading-sub">
                    <h3 class="pull-left">@yield('title', 'Page')</h3>
                    @include('layouts.struct.breadcrumbs')
                    <div class="clearfix"></div>
                </div>
                <div style="margin-bottom: 40px; ">
                    @yield('content', 'No content specified')
                </div>
            </div>
        </section>
        @include('layouts.features')
        @include('layouts.struct.footer')
        @include('layouts.struct.js')
    </body>
</html>
