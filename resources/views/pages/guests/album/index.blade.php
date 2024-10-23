@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/album/index.css') }}">
@endsection

@section('content')
    <div class="photo-header-container">
        <div class="photo-header-cover">
            <h1 class="photo-header-title">Phototèque</h1>
            <p class="photo-header-subtitle">Vivez les moments forts et importants à travers nos albums</p>
        </div>
    </div>
    <section class="container">
        <div class="album-grid">
            @foreach ($albums as $album)
                <div class="album-card">
                    <figure class="album-card-media">
                        <img src="{{ asset('storage/' . $album->files[0]->filepath) }}" alt="" width="100%">
                        <div class="album-card-content">
                            <h5><strong>{{ $album->title }}</strong></h5>
                            <a href="{{ route('guests.album.show', $album) }}" class="see-album">
                                <span>&plus;</span>
                            </a>
                        </div>
                    </figure>
                </div>
            @endforeach
        </div>
    </section>
@endsection

@section('extra-scripts')

@endsection
