<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LA SEMEUSE</title>
    <meta name="description" content="Entreprise d'art graphique, LA SEMEUSE a été créée en 1979 au Togo
    sous forme d'établissement. A ce jour, elle a déjà bouclé 45 années d'activités marquées par des mutations multiformes.">
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="LA SEMEUSE TOGO">
    <meta property="og:description" content="Entreprise d'art graphique, LA SEMEUSE a été créée en 1979 au Togo sous forme d'établissement...">
    <meta property="og:image" content="{{ asset('assets/images/logo.png') }}">
    <meta property="og:url" content="https://lasemeusetg.com">

    <meta name="twitter:card" content="LA SEMEUSE">
    <meta name="twitter:title" content="LA SEMEUSE TOGO">
    <meta name="twitter:description" content="Entreprise d'art graphique, LA SEMEUSE a été créée en 1979 au Togo sous forme d'établissement...">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.png') }}">


    <link rel="icon" href="{{ asset('assets/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    @yield('extra-styles')
</head>
<body>
    @include('includes.guests.navbar')
    <main>
        @yield('content')
    </main>
    @include('includes.guests.footer')

    <a href="https://wa.me/22890045756" class="whatsapp-fixed-icon">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="{{ asset('assets/scripts/navbar.js') }}"></script>
    <script src="{{ asset('assets/scripts/app.js') }}"></script>
    <script src="{{ asset('assets/scripts/aos.min.js') }}"></script>
    <script>
        AOS.init();
    </script>
    @yield('extra-scripts')
</body>
</html>
