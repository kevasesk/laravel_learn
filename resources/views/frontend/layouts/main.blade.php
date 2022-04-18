<!DOCTYPE html>
<html lang="en">
    @include('frontend.layouts.struct.head')
    <body>
        @include('frontend.layouts.struct.modal')
        @include('frontend.layouts.struct.header')
        <section>
            <div class="container">
                <div class="heading-sub">
                    <h3 class="pull-left">@yield('title', 'Page')</h3>
                    @include('frontend.layouts.struct.breadcrumbs')
                    <div class="clearfix"></div>
                </div>
                <div style="margin-bottom: 40px; ">
                    @yield('content', 'No content specified')
                </div>
            </div>
        </section>
        @include('frontend.layouts.features')
        @include('frontend.layouts.struct.footer')
        @include('frontend.layouts.struct.js')
    </body>
</html>
