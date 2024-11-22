<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>news</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('news/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('news/css/modern-business.css') }}" rel="stylesheet">

</head>

<body>
    {{-- navigation --}}
    @include('components.news.nav')
    {{-- header --}}



    <!-- Page Content -->
    @yield('content')
    <!-- Footer -->

    @include('components.news.footer')

    <!-- scripts -->
    <script src="{{ asset('news/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('news/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
