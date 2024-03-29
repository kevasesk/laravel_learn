<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="/img/favicon.png">
    <title>@yield('title', 'Page') | {{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-slider.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('css/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link href="{{asset('css/fonts/OpenSans.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts/Ubuntu.css')}}" rel="stylesheet">
    <link href="{{asset('css/fonts/Ubuntu.css')}}" rel="stylesheet">
    <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.noty.packaged.min.js')}}"></script>

    <script>
      var notify = function (text, type = 'success'){
          noty({
              text: text,
              theme: 'relax',
              type: type, // success, error, warning, information, notification
              timeout: 3000,
          });
      }
    </script>
</head>
