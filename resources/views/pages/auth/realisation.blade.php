@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/realisation.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Gestion des réalisations</h1>
    </div>
    <div class="page__content__container">

        <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addRealisation"><i class="fa fa-plus"></i> Ajouter une réalisation</a>

        @include('includes.auth.flash')

        <div class="realisation__card__container">
            @foreach ($realisations as $realisation)
                <div class="realisation__card">
                    <figure class="realisation__image">
                        <img src="{{ asset('storage/' . $realisation->image) }}" alt="Image de la réalisation">
                        <div class="realisation__description">{{ $realisation->title }}</div>
                    </figure>
                    <div class="realisation__content">
                        <a href="#!" class="edit__button" onclick="modalOpener(this)" data-target="#addRealisation1">Modifier</a>
                        <a href="#!" onclick="event.preventDefault(); confirm('Etes-vous sûr de vouloir supprimer cette réalisation ?') ? document.getElementById('deleteRealisation{{ $realisation->id }}').submit() : ''" class="delete__button">Supprimer</a>
                            <form action="{{ route('auth.realisations.destroy', $realisation) }}" method="POST" id="deleteRealisation{{ $realisation->id }}">
                                @csrf
                                @method("DELETE")
                            </form>
                    </div>

                    <div class="modal__container" id="addRealisation1">
                        <div class="modal">
                            <div class="modal__body">
                                <form action="{{ route('auth.realisations.update', $realisation) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method("PATCH")
                                    <div class="form__group">
                                        <label for="title" class="form__label">Titre</label>
                                        <textarea name="title" id="title" rows="3" placeholder="Titre de la réalisation" class="input__form">{!! $realisation->title !!}</textarea>
                                    </div>
                                    <div class="form__group">
                                        <label for="" class="form__label">Image de la réalisation</label>
                                        <label for="" class="input__file__container">
                                            <i class="fa fa-image"></i>
                                            <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                            <span class="file__name">Choisir une image</span>
                                        </label>
                                    </div>
                                    <div class="form__button">
                                        <button type="submit" class="button__green">Enregistrer la réalisation</button>
                                        <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal__container" id="addRealisation">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.realisations.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="title" class="form__label">Titre</label>
                            <textarea name="title" id="title" rows="3" placeholder="Titre de la réalisation" class="input__form"></textarea>
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Image de la réalisation</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="image" id="" class="input__file" onchange="uploadFile(this)">
                                <span class="file__name">Choisir une image</span>
                            </label>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Enregistrer la réalisation</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('extra-script')
    <script>
        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };

        const uploadFile = (element) => {
            const fileInput = element;

            const fileContainer = fileInput.parentNode;
            const fileSpan = fileContainer.querySelector('.file__name');


            if (fileInput.files.length >= 1) {
                const fileName = fileInput.files[0].name;
                let fileSize = fileInput.files[0].size;
                fileSize = (fileSize / 1024).toFixed(2) + " ko";

                fileContainer.style.borderColor = "#006ccb";
                fileContainer.style.backgroundColor = "#dfeeff";
                fileSpan.textContent = `${fileName}, ${fileSize}` ;
            } else {
                fileContainer.style.borderColor = "#000";
                fileContainer.style.backgroundColor = "#fff";
                fileSpan.textContent = "Choisir une image" ;
            }
        }
    </script>
@endsection
