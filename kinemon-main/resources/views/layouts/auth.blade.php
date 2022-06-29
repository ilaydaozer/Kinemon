<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, viewport-fit=cover, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="theme-color" content="#100DD1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link rel="icon" href="/img/icons/icon-72x72.png">
        <link rel="apple-touch-icon" href="/img/icons/icon-96x96.png">
        <link rel="apple-touch-icon" sizes="152x152" href="/img/icons/icon-152x152.png">
        <link rel="apple-touch-icon" sizes="167x167" href="/img/icons/icon-167x167.png">
        <link rel="apple-touch-icon" sizes="180x180" href="/img/icons/icon-180x180.png">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/animate.css">
        <link rel="stylesheet" href="/css/owl.carousel.min.css">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/lineicons.min.css">
        <link rel="stylesheet" href="/css/magnific-popup.css">
        <link rel="stylesheet" href="/css/style.css">
        <link rel="manifest" href="/manifest.json">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    </head>

    <body class="font-sans antialiased">

        @if($errors->any())
            <div class="toast pwa-install-alert shadow bg-danger" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000" data-bs-autohide="true">
                <div class="toast-body">
                    <div class="content d-flex align-items-center mb-2">
                        <h6 class="mb-0 text-light">{!! implode('', $errors->all('<div>:message</div>')) !!}</h6>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @elseif(session()->has('message'))
            <div class="toast pwa-install-alert shadow bg-success" role="alert" aria-live="assertive" aria-atomic="true"
                 data-bs-delay="5000" data-bs-autohide="true">
                <div class="toast-body">
                    <div class="content d-flex align-items-center mb-2">
                        <h6 class="mb-0 text-light">{{ session()->get('message') }}</h6>
                        <button class="btn-close ms-auto" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <!-- Preloader-->
        <div class="preloader" id="preloader">
            <div class="spinner-grow text-secondary" role="status">
                <div class="sr-only">Loading...</div>
            </div>
        </div>

        @yield('content')

        <!-- All JavaScript Files-->
        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/jquery.min.js"></script>
        <script src="/js/waypoints.min.js"></script>
        <script src="/js/jquery.easing.min.js"></script>
        <script src="/js/jquery.magnific-popup.min.js"></script>
        <script src="/js/owl.carousel.min.js"></script>
        <script src="/js/jquery.counterup.min.js"></script>
        <script src="/js/jquery.countdown.min.js"></script>
        <script src="/js/jquery.passwordstrength.js"></script>
        <script src="/js/dark-mode-switch.js"></script>
        <script src="/js/active.js"></script>
        <script src="/js/pwa.js"></script>
    </body>
</html>
