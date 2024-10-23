@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/album/show.css') }}">
@endsection

@section('content')
    <div class="photo-header-container">
        <div class="photo-header-cover">
            <h1 class="photo-header-title">Phototèque</h1>
            <ol class="page-header-breadcrumb">
                <li>
                    <a href="{{ route('guests.album.index') }}">/ Liste des albums</a>
                </li>
            </ol>
        </div>
    </div>
    <section class="container">
        <h1>{{ $album->title }}</h1>
        @php
            $imageClasses = ['img-2x2', 'img-1x1', 'img-1x1', 'img-1x1'];
        @endphp

        <div class="files-grid">
            @foreach ($files as $index => $file)
                @php
                    $class = $imageClasses[$index % count($imageClasses)];
                @endphp

                <figure class="{{ $class }}">
                    <img src="{{ asset('storage/' . $file->filepath) }}" alt="Image" loading="lazy">
                </figure>
            @endforeach
        </div>
    </section>
@endsection

@section('extra-scripts')

@endsection
