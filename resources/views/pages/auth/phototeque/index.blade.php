@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/phototeque.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Phototèque</h1>
    </div>
    <div class="page__content__container">

        @include('includes.auth.flash')

        <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addAlbum"><i class="fa fa-plus"></i> Créer un album</a>

        <div class="album__container">
            @foreach ($albums as $album)
                <figure class="album__item">
                    <img src="{{ asset('storage/' . $album->files[0]->filepath) }}" alt="">
                    <figcaption>
                        <div class="album__info">
                            <h2>{{ $album->title }}</h2>
                            <p>{{ $album->files()->count() . " photos" }}</p>
                        </div>
                        <div class="album__actions">
                            <a href="{{ route('auth.phototeque.show', $album) }}" class="edit__button"><i class="fa fa-edit"></i></a>
                            <a href="#" class="delete__button"><i class="fa fa-trash"></i></a>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>

        <div class="modal__container" id="addAlbum">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.phototeque.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="album_title" class="form__label">Titre</label>
                            <input type="text" name="title" id="album_title" placeholder="Titre de l'album" class="input__form" autocomplete="off" />
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Images de l'album</label>
                            <label for="" class="label__file">
                                <i class="fa fa-image"></i>
                                <input type="file" name="files[]" id="file" class="input__file" onchange="uploadFile(this)" accept="image/*" multiple>
                                <span class="file__name">Choisir les images</span>
                            </label>
                        </div>
                        <div class="uploaded">
                            <h4 class="image__uplpaded__title">Images uploadées</h4>
                            <ul class="images__uploaded">
                            </ul>
                        </div>
                        <div class="form__button">
                            <button type="submit" class="button__green">Sauvegarder l'album</button>
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
            const files = fileInput.files;
            const fileSubtitle = document.querySelector('.file__name');
            const fileLabelContainer = fileInput.parentNode;

            const uploaded = document.querySelector('.uploaded');
            const uploadedList = document.querySelector('.images__uploaded');

            if (files.length > 0) {

                const uploaded = document.querySelector('.uploaded');

                uploaded.style.display = "block";

                const uploadedList = document.querySelector('.images__uploaded');
                [...files].forEach(file => {
                    let fileName = file.name;
                    let fileSize = file.size / 1024;
                    fileSize = fileSize.toFixed(2) + ' ko';
                    const fileExtension = fileName.split('.').pop();

                    if (fileName.length > 30) {
                        fileName = fileName.substring(0, 30) + '...' + fileExtension;
                    }


                    const uploadedItem = document.createElement('li');
                    uploadedItem.classList.add('uploaded__item');
                    uploadedItem.innerHTML = `
                    <span class="filename">${fileName} </span>
                    <span class="filesize">${fileSize}</span>
                    `
                    uploadedList.appendChild(uploadedItem);

                });


                fileLabelContainer.style.borderColor = "#006ccb";
                fileLabelContainer.style.backgroundColor = "#dfeeff";
                fileSubtitle.textContent = `${files.length} images ont été chargées`;
            } else {
                fileSubtitle.textContent = "Choisir les images";
                uploadedList.innerHTML = "";
                uploaded.style.display = "none";
                fileLabelContainer.style.borderColor = "#000";
                fileLabelContainer.style.backgroundColor = "#fff";
            }

        }
    </script>
@endsection
