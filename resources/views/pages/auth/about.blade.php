@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/about.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Qui sommes-nous</h1>
    </div>

    <div class="page__content__container">

        @include('includes.auth.flash')

        <form action="{{ route('auth.about.store') }}" method="POST">
            @csrf
            <div class="form__group">
                <textarea name="about" id="about" rows="10" placeholder="Qui sommes-nous" class="input__form">{!! $content->body !!}</textarea>
            </div>
            <div class="form__button">
                <button type="submit" class="button__green">Enregistrer le texte</button>
            </div>
        </form>
    </div>
@endsection

@section('extra-script')
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('summernote/summernote-lite.js.map') }}"></script>
    <script src="{{ asset('summernote/lang/summernote-fr-FR.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#about').summernote({
                placeholder: "Qui sommes-nous...",
                lang: 'fr-FR',
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                ]
            });
        })
    </script>
@endsection
