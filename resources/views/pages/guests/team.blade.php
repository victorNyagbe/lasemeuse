@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/team.css') }}">
@endsection

@section('content')
    <div class="team-header-container">
        <div class="team-header-cover">
            <h1 class="team-header-title">Notre équipe</h1>
            <p class="team-header-subtitle">Découvrez toute l'équipe</p>
        </div>
    </div>

    <section class="container">
        <div class="team-content">
            @foreach ($teams as $team)
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000">
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
    </section>

@endsection

@section('extra-scripts')

@endsection
