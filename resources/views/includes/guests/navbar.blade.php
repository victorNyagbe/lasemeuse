<nav class="navbar">
    <div class="navbar-left-content">
        <div class="navbar-icon-container">
            <i class="fa fa-bars navbar-icon"></i>
        </div>
        <figure class="navbar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
        </figure>
    </div>
    <div class="navbar-right-content">
        <ul class="navbar-menu">
            <li class="{{ $page == 'banners' ? 'active' : '' }}"><a href="{{ route('guests.home') }}">Accueil</a></li>
            <li class="{{ $page == 'about' ? 'active' : '' }}"><a href="{{ route('guests.about') }}">Qui sommes-nous</a></li>
            <li class="{{ $page == 'services' ? 'active' : '' }}"><a href="{{ route('guests.services') }}">Nos services</a></li>
            <li class="{{ $page == 'realisations' ? 'active' : '' }}"><a href="{{ route('guests.realisations') }}">Nos réalisations</a></li>
            <li class="{{ $page == 'team' ? 'active' : '' }}"><a href="{{ route('guests.team') }}">Notre équipe</a></li>
            <li class="{{ $page == 'album' ? 'active' : '' }}"><a href="{{ route('guests.album.index') }}">Phototèque</a></li>
            <li><a href="{{ route('guests.contact') }}">Contact</a></li>
        </ul>
        <div class="navbar-mobile-social-icons">
            {{-- <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-x-twitter"></i></a> --}}
            <a href="{{ route('guests.invoice-view') }}" class="invoice_header">Devis</a>
        </div>
    </div>
</nav>
