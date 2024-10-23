@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/swiper.min.css') }}">
@endsection

@section('content')
    <section class="banner-container">
        <!-- Slider main container -->
        <div class="swiper" id="banner-swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <figure class="swiper-image">
                            <img src="{{ asset('storage/' . $banner->image) }}" alt="">
                        </figure>
                        <div class="swiper-content">
                            <div class="swiper-content-text" data-aos="fade-up" data-aos-duration="1500">{{ $banner->title }}</div>
                            <div class="invoice-link-container" data-aos="zoom-in" data-aos-duration="1800">
                                <a href="{{ route('guests.invoice-view') }}">Faire une demande de devis <i class="fas fa-file-invoice"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="container">
        <div class="about-us-container">
            {{-- <h1 class="section-title">Qui sommes-nous ?</h1> --}}
            <div class="about-us-content" style="overflow: hidden;">
                <div class="about-us-description">
                    <h1 class="about-title">Certifiée ISO 9001:2008</h1>
                    <div class="about-us-text" data-aos="fade-up" data-aos-duration="1000">
                        {!! $content->body !!}
                    </div>
                    <a href="{{ route('guests.about') }}" class="about-read">En savoir plus sur nous <i class="fas fa-arrow-right"></i></a>
                </div>
                <figure class="about-us-image" data-aos="zoom-in-right" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/security.svg') }}" alt="">
                </figure>
            </div>
        </div>
    </section>

    <div class="services-container">
        <div class="services-title-container">
            <h1 class="section-title">Nos services</h1>
        </div>
        <div class="services-content">
            <div class="service-item" data-aos="fade-down" data-aos-duration="300">
                <div class="service-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h5 class="service-title">Pre-presse</h5>
                <div class="service-text">
                    <p>Nous proposons des services de pré-pression à savoir</p>
                    <ul>
                        <li>Offset</li>
                        <li>En Continu</li>
                        <li>Edition</li>
                        <li>Listings</li>
                        <li>Relevés d'identités bancaires</li>
                        <li>Des paravents</li>
                        <li>Des tickets de bus</li>
                    </ul>
                </div>
            </div>
            <div class="service-item" data-aos="fade-down" data-aos-duration="300">
                <div class="service-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h5 class="service-title">Sécurisation</h5>
                <div class="service-text">
                    <p>Nous développons différents systèmes de sécurisation qui offrent des garanties de haute protection aux</p>
                    <ul>
                        <li>Vignettes chèques</li>
                        <li>Hologrammes</li>
                        <li>Bobinettes en papier thermique</li>
                        <li>Tickets de marché / tickets de bus</li>
                        <li>Badges</li>
                        <li>Documents de douanes et d'impôts</li>
                        <li>Diplômes</li>
                    </ul>
                </div>
            </div>
            <div class="service-item" data-aos="fade-down" data-aos-duration="300">
                <div class="service-icon">
                    <i class="fas fa-industry"></i>
                </div>
                <h5 class="service-title">Les emballages industriels</h5>
                <div class="service-text">
                    <p>Votre partenaire idéal dans la</p>
                    <ul>
                        <li>Fabrication des sacs de ciments</li>
                        <li>Fabrication des emballages en paier biodégradables et autres</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="realisations-container">
            <h1 class="section-title">Nos réalisations</h1>
            <div class="realisations-content">
                @foreach ($realisations as $realisation)
                    <div class="realisation-item" data-aos="flip-down" data-aos-duration="800">
                        <figure class="realisation-image">
                            <img src="{{ asset('storage/' . $realisation->image) }}" alt="Image de realisation">
                            <div class="realisation-info">
                                <h5 class="realisation-title">{{ $realisation->title }}</h5>
                            </div>
                        </figure>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="testimonies-container">
            <h1 class="section-title">Ils parlent de nous</h1>
            <div class="testimonies-content">
                <div class="swiper" id="testimony-swiper">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper" id="testimonies-wrapper">
                      <!-- Slides -->
                        <div class="swiper-slide testimony-description">
                            <div class="testimony-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Nihil recusandae quae consequatur? Inventore iusto ducimus
                            </div>
                            <h5 class="testimony-author">par Eric AUTEUR</h5>
                        </div>
                        <div class="swiper-slide testimony-description">
                            <div class="testimony-text">
                                Incidunt cumque quasi molestias fugiat earum maiores tempora non voluptatem.
                            </div>
                            <h5 class="testimony-author">par Eric AUTEUR</h5>
                        </div>
                        <div class="swiper-slide testimony-description">
                            <div class="testimony-text">
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                Cumque quos culpa nihil possimus nesciunt ipsam mollitia
                                eos facilis. Placeat, eius saepe officia corporis autem
                                odio quod sunt alias nesciunt molestiae.
                            </div>
                            <h5 class="testimony-author">par Eric AUTEUR</h5>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    {{-- <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div> -}}
                  </div>
            </div>
        </div> --}}
    </section>

    <div class="team-container">
        <h1 class="section-title">Notre équipe</h1>
        <div class="team-content">
            @foreach ($teams as $team)
                <div class="team-member" data-aos="zoom-out-up" data-aos-duration="2000">
                    <figure class="team-member-image">
                        <img src="{{ asset('storage/' . $team->profile) }}" alt="Image de membre">
                    </figure>
                    <div class="team-member-info">
                        <h5 class="team-member-name">{{ $team->fullname }}</h5>
                        <p class="team-member-poste">{{ $team->poste }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <p class="display-seemore">
            <a href="{{ route('guests.team') }}" class="seemore-member">Voir tous les membres</a>
        </p>
    </div>

    <section class="container">
        <div class="newsletter-container">
            <h1 class="section-title">NEWSLETTER</h1>
            <div class="newsletter-content">
                <p class="newsletter-text">Restez informé de nos dernières actualités et offres
                    <br>enregistrez-vous à notre newsletter
                </p>
                <form method="POST" action="{{ route('guests.newsletter-mail') }}" class="newsletter-form">
                    @csrf
                    <input type="email" name="newsletter-email" class="newsletter-input" placeholder="Votre adresse email">
                    <button class="newsletter-button">S'abonner</button>
                </form>
            </div>
        </div>
    </section>

    @if ($message = Session::get('newsletter-success'))
        @include('includes.guests.mail_success')
    @endif
@endsection

@section('extra-scripts')
    <script src="{{ asset('assets/scripts/swiper.min.js') }}"></script>
    <script>
        const swiper = new Swiper('#banner-swiper', {
            // Optional parameters
            direction: 'horizontal',
            effect: "fade",
            fedeEffect: {
                crossFade: true
            },
            loop: true,
            autoplay: {
                delay: 7000,
                disableOnInteraction: false,
            },
        });
        const swiperTestimony = new Swiper('#testimony-swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            slidesPerView: 1,
            spaceBetween: 10,
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 320px
                770: {
                slidesPerView: 2,
                spaceBetween: 20
                },
                // when window width is >= 480px
                993: {
                slidesPerView: 3,
                spaceBetween: 30
                }
            },

            // If we need pagination
            pagination: {
            el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
            el: '.swiper-scrollbar',
            },
        });
    </script>
@endsection
