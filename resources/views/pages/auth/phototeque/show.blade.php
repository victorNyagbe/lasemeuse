@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/phototeque.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Phototèque</h1>

        {{-- <ul class="page__header__breadcrumb">
            <li><a href="#"></a></li>
        </ul> --}}
    </div>
    <div class="page__content__container">

        @include('includes.auth.flash')

        <div class="page__content__header">
            <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addAlbum"><i class="fa fa-plus"></i> Ajouter des photos</a>
            <form action="{{ route('auth.phototeque.update', $album) }}" method="post">
                @csrf
                @method("PATCH")
                <input type="text" name="title" id="album_title" value="{{ $album->title }}" class="input__form">
                <button type="submit" class="button__green">Modifier le titre</button>
            </form>
        </div>

        <h3 class="album_title"><i class="fa fa-images"></i> {{ $album->title }}</h3>

        <div class="photos__container">

            @php
                $imageClasses = ['img-2x2', 'img-1x1', 'img-1x1', 'img-1x1'];
            @endphp

            @foreach ($files as $index => $file)
                @php
                    $class = $imageClasses[$index % count($imageClasses)];
                @endphp

                <figure class="{{ $class }}">
                    <img src="{{ asset('storage/' . $file->filepath) }}" alt="Image" loading="lazy">
                    <figcaption class="actions">
                        <button class="btn edit__button" onclick="modalOpener(this)" data-target="#editPhoto{{ $file->id }}"><i class="fas fa-edit"></i></button>
                        <button onclick="event.preventDefault(); document.getElementById('destroyImage{{ $file->id }}').submit()" class="btn delete__button"><i class="fas fa-trash-alt"></i></button>
                        <form action="{{ route('auth.phototeque.destroy', $file) }}" method="post" id="destroyImage{{ $file->id }}">
                            @csrf
                            @method("DELETE")
                        </form>
                    </figcaption>
                </figure>


                <div class="modal__container" id="editPhoto{{ $file->id }}">
                    <div class="modal">
                        <div class="modal__body">
                            <form action="{{ route('auth.phototeque.updateSingleImage', [$album, $file]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PATCH")
                                <div class="form__group">
                                    <label for="" class="label__file">
                                        <i class="fa fa-image"></i>
                                        <input type="file" name="file" id="file" class="input__file" onchange="uploadSingleFile(this)" accept="image/*" multiple>
                                        <span class="file__name">Choisir une image</span>
                                    </label>
                                </div>
                                <div class="form__button">
                                    <button type="submit" class="button__green">Modifier l'image</button>
                                    <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>

        <div class="modal__container" id="addAlbum">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.phototeque.updateImages', $album) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")
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

        const uploadSingleFile = (element) => {
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
