@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/phototeque.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Actualités</h1>
    </div>
    <div class="page__content__container">

        <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addActualite"><i class="fa fa-plus"></i> Ajouter une actualité</a>

        <div class="actualite__container">

        </div>

        <div class="modal__container" id="addActualite">
            <div class="modal">
                <div class="modal__body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="actualite_title" class="form__label">Titre</label>
                            <input type="text" name="actualite_title" id="actualite_title" placeholder="Titre de l'alctualité" class="input__form" />
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Texte de l'actualité</label>
                            <textarea name="about" id="about" rows="10" placeholder="Texte actualité" class="input__form"> </textarea>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
