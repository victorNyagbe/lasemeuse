@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/contact.css') }}">
@endsection

@section('content')
    <div class="contact-header-container">
        <div class="contact-header-cover">
            <h1 class="contact-header-title">Contactez-nous</h1>
            {{-- <p class="contact-header-subtitle">Découvrez toutes nos réalisations</p> --}}
        </div>
    </div>

    <section class="container">
        <div class="contact-container">
            <div class="contact-left">
                <h5>Notre chaleureuse équipe est prête à écouter vos suggestions, questions et autres</h5>
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom complet</label>
                        <input type="text" name="name" id="name" placeholder="Nom complet...">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse électronique</label>
                        <input type="email" name="email" id="email" placeholder="Adresse électronique...">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" rows="7" placeholder="Message..."></textarea>
                    </div>
                    <button type="submit" class="btn-send">Envoyer</button>
                </form>
            </div>
            <div class="contact-right">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3966.911904689256!2d1.2256219749897017!3d6.1425349938443885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMDgnMzMuMSJOIDHCsDEzJzQxLjUiRQ!5e0!3m2!1sfr!2stg!4v1727919860186!5m2!1sfr!2stg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="other-contact">
                    <h5>Autres moyens de contact</h5>
                    <ul>
                        <li>
                            <i class="fa fa-phone"></i>
                            <a href="tel:+22890045756">(+228) 90 04 57 56 / 90 04 89 96 / 90 26 77 85</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:contact@lasemeusetg.com">contact@lasemeusetg.com</a>
                        </li>
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <a href="https://www.google.com/maps/place/Togo+Consulting/@6.
                            1425349938443885,1.2256219749897017,15z
                            data=!4m5!3m4!1s0x0:0x0
                            !8m2!3d6.1425349938443885!4d1
                            .2256219749897017">8, rue Hahotoé, Doulassamé (Amoutiévé)</a>
                        </li>
                        <li>
                            <i class="fab fa-whatsapp"></i>
                            <a href="https://wa.me/22890045756">(+228) 90 04 57 56 (Nous écrire sur whatsapp)</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')

@endsection
