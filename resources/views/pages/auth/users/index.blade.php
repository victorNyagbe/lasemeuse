@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/users.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Administrateurs</h1>
    </div>

    <div class="page__content__container">
        <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addAdmin"><i class="fa fa-plus"></i> Ajouter un administrateur</a>

        @include('includes.auth.flash')

        <div class="users__container">
            @foreach ($users as $user)
                <div class="user__item">
                    <figure class="user__item__avatar">
                        <svg style="fill:#054a87;"  viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c1.8 0 3.5-.2 5.3-.5c-76.3-55.1-99.8-141-103.1-200.2c-16.1-4.8-33.1-7.3-50.7-7.3H178.3zm308.8-78.3l-120 48C358 277.4 352 286.2 352 296c0 63.3 25.9 168.8 134.8 214.2c5.9 2.5 12.6 2.5 18.5 0C614.1 464.8 640 359.3 640 296c0-9.8-6-18.6-15.1-22.3l-120-48c-5.7-2.3-12.1-2.3-17.8 0zM591.4 312c-3.9 50.7-27.2 116.7-95.4 149.7V273.8L591.4 312z"></path>
                        </svg>
                    </figure>
                    <div class="user__item__info">
                        <h2 class="user__item__name">{{ $user->name }}</h2>
                        <p class="user__item__mail">{{ $user->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal__container" id="addAdmin">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.users.register') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="name" class="form__label">Nom & Prénoms</label>
                            <input type="text" name="name" id="name" placeholder="Nom & Prénoms" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="email" class="form__label">Email</label>
                            <input type="email" name="email" id="email" placeholder="email" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="password" class="form__label">Mot de passe</label>
                            <input type="text" name="password" id="password" placeholder="Mot de passe" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="password_confirmation" class="form__label">Confirmation du mot de passe</label>
                            <input type="text" name="password_confirmation" id="password_confirmation" placeholder="mot de passe" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Image de l'utilisateur</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="avatar" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
                                <span class="file__name">Choisir une image</span>
                            </label>
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
