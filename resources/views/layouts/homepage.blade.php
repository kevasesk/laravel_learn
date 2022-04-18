<!DOCTYPE html>
<html lang="en">
    @include('layouts.struct.head')
    <body>
        @include('layouts.struct.modal')
        @include('layouts.struct.header')
        @yield('content', 'No content specified')
        @include('layouts.features')
        @include('layouts.struct.footer')
        @include('layouts.struct.js')
    </body>
</html>
