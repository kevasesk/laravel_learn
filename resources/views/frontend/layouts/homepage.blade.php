<!DOCTYPE html>
<html lang="en">
    @include('frontend.layouts.struct.head')
    <body>
        @include('frontend.layouts.struct.modal')
        @include('frontend.layouts.struct.header')
        @yield('content', 'No content specified')
        @include('frontend.layouts.features')
        @include('frontend.layouts.struct.footer')
        @include('frontend.layouts.struct.js')
    </body>
</html>
