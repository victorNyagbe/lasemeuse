<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    {{-- <script src="{{ asset('assets/scripts/tailwind.min.js') }}"></script> --}}
    @yield('extra-style')
    <title>ADMIN | LA SEMEUSE</title>
</head>
<body>
    @include('includes.auth.sidebar')

    <main>
        @yield('content')
    </main>

    {{-- <script src="{{ asset('assets/scripts/sidebar.js') }}"></script> --}}
    <script src="{{ asset('assets/scripts/base.js') }}"></script>
    @yield('extra-script')
</body>
</html>
