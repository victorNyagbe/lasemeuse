@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/realisations.css') }}">
@endsection

@section('content')
    <div class="realisaations-header-container">
        <div class="realisations-header-cover">
            <h1 class="realisations-header-title">Nos réalisations</h1>
            <p class="realisations-header-subtitle">Découvrez toutes nos réalisations</p>
        </div>
    </div>

    <section class="container">
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
    </section>
@endsection

@section('extra-scripts')

@endsection
