<footer>
    <div class="footer-first-content">
        <figure class="footer-logo">
            <img src="{{ asset('assets/images/logo roule semeuse.png') }}" alt="Logo">
            <figcaption>En continu, LA SEMEUSE roule pour vous ...!</figcaption>
        </figure>

        <ul class="footer-menu">
            <li><a href="{{ route('guests.home') }}">Accueil</a></li>
            <li><a href="{{ route('guests.about') }}">Qui sommes-nous</a></li>
            <li><a href="{{ route('guests.services') }}">Nos services</a></li>
            <li><a href="{{ route('guests.team') }}">Notre équipe</a></li>
            <li><a href="{{ route('guests.realisations') }}">Nos réalisations</a></li>
            {{-- <li><a href="">Actualités</a></li> --}}
            <li><a href="{{ route('guests.contact') }}">Contact</a></li>
        </ul>

        <div class="footer-contact">
            <p>Adresse : 8, rue Hahotoé, Doulassamé (Amoutiévé)</p>
            <p>01 BP: 3913 Lomé - TOGO</p>
            <p><i class="fa fa-phone"></i> : (+228) 90 04 57 56 / 90 04 89 96</p>
            <p><i class="fa fa-envelope"></i> : <a href="mailto:contact@lasemeusetg.com">contact@lasemeusetg.com</a></p>
            <ul class="social-icons-links">
                <li><a href=""><i class="fab fa-facebook"></i></a></li>
                <li><a href=""><i class="fab fa-x-twitter"></i></a></li>
                <li><a href=""><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="footer-second-content">
        <p>Copyright &copy; 2024 Semeuse. Tous droits réservés.</p>
        <p>Site réalisé par <a href="https://wa.me/22897374862">Mr Mensa See</a>
    </div>
</footer>
