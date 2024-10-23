@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/about.css') }}">
@endsection

@section('content')
    <section class="container">
        <div class="about-title-container">
            <h1>En Continu LA SEMEUSE <br>Roule Pour Vous</h1>
        </div>
    </section>
    <div class="about-image-container">
        <figure class="about-image">
            <img src="{{ asset('assets/images/about1.jpg') }}" alt="Image Qui somme-nous">
        </figure>
    </div>
    <section class="container">
        <h2 class="first-paragraph-title">
            Plus de 45 années d'expériences
        </h2>

        <div class="first-paragraph-container">
            <div class="about-text-container">
                {!! $content->body !!}
                {{-- <p>
                    Entreprise d'art graphique, <span class="brand-name">LA SEMEUSE</span> a été créée en 1979 au Togo
                    sous forme d'établissement. A ce jour, elle a déjà bouclé 45 années d'activités marquées par des mutations multiformes.
                </p>
                <p>
                    Tout le processus de modernisation de <span class="brand-name">LA SEMEUSE</span> a été marquée par l'attribution d'importantes
                    distinctions internationales:
                    <ul>
                        <li>Prix de la Qualité (Genève)</li>
                        <li>Prix du Mérite (Montréal)</li>
                        <li>Prix Togolais des Affaires (Secteur Industrie)</li>
                        <li>Prix Togolais de la Qualité (Lomé)</li>
                        <li>Prix Spécial de l'Engagement Africain (CISA)</li>
                        <li>Participation à diverses foires</li>
                        <li>Certification: ISO 9001 V. 2008</li>
                    </ul>
                </p> --}}
            </div>
            <figure class="first-paragraph-image">
                <img src="{{ asset('assets/images/about2.jpg') }}" alt="Image 2">
            </figure>
        </div>
    </section>

    <div class="products-container">
        <div class="products-title-container">
            <h2>Nos Produits</h2>
            <p>Nous disposons d'une large gamme de produits, voici quelques uns:</p>
        </div>
        <div class="products-content">
            {{-- <div class="products-image-container">
                <figure class="products-image">
                    <img src="{{ asset('assets/images/products.svg') }}" alt="Image Produits">
                </figure>
            </div> --}}
            <div class="products-text-container">
                <ul>
                    <li><i class="fas fa-bolt"></i> Les avis bancaires</li>
                    <li><i class="fas fa-bolt"></i> Les calendriers</li>
                    <li><i class="fas fa-bolt"></i> Les vignettes-chèques</li>
                    <li><i class="fas fa-bolt"></i> Affiches publicitaires</li>
                    <li><i class="fas fa-bolt"></i> Ouvrages et brochures</li>
                    <li><i class="fas fa-bolt"></i> Les Factures personnalisées</li>
                    <li><i class="fas fa-bolt"></i> Les timbres</li>
                    <li><i class="fas fa-bolt"></i> Les imprimés informatiques</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="advantage-container">
            <h2 class="advantage-title">Pourquoi nous choisir ?</h2>
            <div class="advantage-content">
                <div class="advantage-item">
                    <h3 class="advantage-item-title">Nos atouts</h3>
                    <ul class="advantages">
                        <li><i class="fas fa-check-circle"></i> Production sur des sites sécurisés certifiés <span class="brand-security">ISO 9001 : 2008</span></li>
                        <li><i class="fas fa-check-circle"></i> Traçabilité de chaque document fabriqué à chaque étape du cycle de production</li>
                        <li><i class="fas fa-check-circle"></i> Respect des délais de livraison</li>
                        <li><i class="fas fa-check-circle"></i> Stock tampon des matières premières toujours disponible</li>
                    </ul>
                </div>
                <div class="advantage-item">
                    <h3 class="advantage-item-title">Notre Offre</h3>
                    <ul class="advantages">
                        <li><i class="fas fa-check-circle"></i> Conception et impression sécurisée des imprimés bancaires (vignette-chèques, lettres-chèques, remise de chèque, bordereaux et fiches)</li>
                        <li><i class="fas fa-check-circle"></i> Conception et impression des tickets d'accès (marchés, bus, stade, concert,...)</li>
                        <li><i class="fas fa-check-circle"></i> Système de sécurisation CMC7 - OCR - QR Code - MICR</li>
                        <li><i class="fas fa-check-circle"></i> Code barre - Hologramme standard et personnalisé</li>
                        <li><i class="fas fa-check-circle"></i> Bobinettes thermiques pour TVP, TPME, DAB-GAB, Caisses enregistreuses</li>
                    </ul>
                </div>
                <div class="advantage-item">
                    <h3 class="advantage-item-title">Benefice clients</h3>
                    <ul class="advantages">
                        <li><i class="fas fa-check-circle"></i> Authentification des imprimés originaux</li>
                        <li><i class="fas fa-check-circle"></i> Protection contre les faussaires</li>
                        <li><i class="fas fa-check-circle"></i> Crédibilité de l'entreprise, de ses activités et de ses produits vis-à-vis de ses clients</li>
                        <li><i class="fas fa-check-circle"></i> Protection et sauvegarde du patrimoine de l'entreprise</li>
                        <li><i class="fas fa-check-circle"></i> Anticipation sur les éventuels dommages économiques</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extra-scripts')

@endsection
