<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{mix("css/app.css")}}" />
    <title>@yield('title', 'student administration')</title>
</head>
<body>
{{-- navigation --}}
@include('shared.navigation')
<main class="container">
    @yield('main', 'page still in build')
</main>
{{--  Footer  --}}
@include('shared.footer')


<script src="{{ mix('js/app.js') }}"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>--}}
</body>
</html>
