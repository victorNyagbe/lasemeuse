@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/teams.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Notre Equipe</h1>
    </div>

    <div class="page__content__container">
        <a href="#" class="primary__link__btn" onclick="modalOpener(this)" data-target="#addMember"><i class="fa fa-plus"></i> Ajouter un membre</a>

        @include('includes.auth.flash')

        <div class="teams__container">
            @foreach ($teams as $team)
                <div class="team-member" data-aos="fade-up" data-aos-duration="1000">
                    <figure class="team-member-image">
                        <img src="{{ asset('storage/' . $team->profile ) }}" alt="Image de membre">
                    </figure>
                    <div class="team-member-info">
                        <h5 class="team-member-name">{{ $team->fullname }}</h5>
                        <p class="team-member-poste">{{ $team->poste }}</p>
                    </div>
                    <div class="team-member-actions">
                        <a href="#!" onclick="modalOpener(this)" data-target="#editMember{{ $team->id }}">Modifier</a>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('destroyMember{{ $team->id }}').submit()">Supprimer</a>
                        <form action="{{ route('auth.teams.destroy', $team) }}" method="post" id="destroyMember{{ $team->id }}">
                            @csrf
                            @method("DELETE")
                        </form>
                    </div>
                </div>

                <div class="modal__container" id="editMember{{ $team->id }}">
                    <div class="modal">
                        <div class="modal__body">
                            <form action="{{ route('auth.teams.update', $team) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method("PATCH")
                                <div class="form__group">
                                    <label for="fullname" class="form__label">Nom & Prénoms</label>
                                    <input type="text" name="fullname" id="fullname" placeholder="Nom & Prénoms" class="input__form" value="{{ $team->fullname }}">
                                </div>
                                <div class="form__group">
                                    <label for="poste" class="form__label">Poste</label>
                                    <input type="text" name="poste" id="poste" placeholder="Poste du membre" class="input__form" value="{{ $team->poste }}">
                                </div>
                                <div class="form__group">
                                    <label for="" class="form__label">Image du membre</label>
                                    <label for="" class="input__file__container">
                                        <i class="fa fa-image"></i>
                                        <input type="file" name="profile" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
                                        <span class="file__name">Choisir une image</span>
                                    </label>
                                </div>
                                <div class="form__button">
                                    <button type="submit" class="button__green">Modifier</button>
                                    <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="modal__container" id="addMember">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.teams.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form__group">
                            <label for="fullname" class="form__label">Nom & Prénoms</label>
                            <input type="text" name="fullname" id="fullname" placeholder="Nom & Prénoms" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="poste" class="form__label">Poste</label>
                            <input type="text" name="poste" id="poste" placeholder="Poste du membre" class="input__form">
                        </div>
                        <div class="form__group">
                            <label for="" class="form__label">Image du membre</label>
                            <label for="" class="input__file__container">
                                <i class="fa fa-image"></i>
                                <input type="file" name="profile" id="" class="input__file" onchange="uploadFile(this)" accept="image/*">
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
