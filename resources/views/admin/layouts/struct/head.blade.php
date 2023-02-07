<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
        name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
        name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>@yield('title', 'Admin') | Admin {{env('APP_NAME')}}</title>
    <!-- Favicon icon -->
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{asset('img/favicon.png')}}"
    />
    <!-- Custom CSS -->
    <link href="/backend/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/backend/dist/css/style.min.css" rel="stylesheet" />
    <link href="/backend/dist/css/custom.css" rel="stylesheet" />

    <script src="/backend/assets/libs/quill/dist/quill.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/backend/assets/libs/quill/dist/quill.snow.css" />

    <script src="/backend/assets/libs/jquery/dist/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/backend/assets/libs/select2/dist/css/select2.min.css" />
    <script src="/backend/assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="/backend/assets/libs/select2/dist/js/select2.min.js"></script>

    <script src="/backend/assets/libs/tinymce_6.0.2/tinymce/js/tinymce/tinymce.min.js"></script>

    <script type="text/javascript" src="/js/jquery.noty.packaged.min.js"></script>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="/backend/dist/js/html5shiv.js"></script>
    <script src="/backend/dist/js/respond.min.js"></script>
    <![endif]-->
</head>
