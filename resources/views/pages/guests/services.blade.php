@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/services.css') }}">
@endsection

@section('content')
    <section class="container">
        <div class="services-title-container">
            <h1 class="services-title">Nos services</h1>
            <p class="services-subtitle">Nous proposons une gamme de services pour répondre à vos besoins.</p>
        </div>
    </section>
    <div class="prepresse-container">
        <div class="prepresse-content">
            <div class="prepresse-subcontent">
                <h2 class="prepresse-title">Pré-presse</h2>
                <ul>
                    <li>Impression offset</li>
                    <li>Impression en continu</li>
                    <li>Impression Edition</li>
                    <li>Les listings</li>
                    <li>Les relevés d'identités bancaires</li>
                    <li>Des paravents</li>
                    <li>Des tickets de bus</li>
                </ul>
            </div>
            <div class="prepresse-icon-container">
                <i class="fas fa-newspaper"></i>
            </div>
        </div>
    </div>
    <div class="securisation-container">
        <div class="securisation-content">
            <div class="securisation-icon-container">
                <i class="fas fa-lock"></i>
            </div>
            <div class="securisation-subcontent">
                <h2 class="securisation-title">Sécurisation</h2>
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
    </div>
    <div class="industry-container">
        <div class="industry-content">
            <div class="industry-subcontent">
                <h2 class="industry-title">Les emballages industriels</h2>
                <ul>
                    <li>Fabrication des sacs de ciments</li>
                    <li>Fabrication des emballages en paier biodégradables et autres</li>
                </ul>
            </div>
            <div class="industry-icon-container">
                <i class="fas fa-industry"></i>
            </div>
        </div>
    </div>
@endsection

@section('extra-scripts')

@endsection
