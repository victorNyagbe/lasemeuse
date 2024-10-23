@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('summernote/summernote-lite.css.map') }}">
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/newsletter.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Newsletter</h1>
    </div>

    <div class="page__content__container">

        @include('includes.auth.flash')

        <div class="page__content__header">
            <a href="#" class="btn sned__message" onclick="modalOpener(this)" data-target="#sendMessage"><i class="fas fa-envelope"></i> Envoyer un message</a>
            <a href="#" class="btn users" onclick="modalOpener(this)" data-target="#users"><i class="fas fa-th-list"></i> Liste des abonnés</a>
        </div>

        <div class="message__container">
            @foreach ($newsletters as $newsletter)
                <div class="message__item">
                    <h5 class="message__date"><i class="fas fa-calendar-day"></i> {{ \Carbon\Carbon::parse($newsletter->created_at)->locale('fr')->isoFormat('dddd, LL') }}</h5>
                    <h5 class="message__title">{{ $newsletter->object }}</h5>
                    <div class="message__content">
                        {!! $newsletter->message !!}
                    </div>
                </div>
            @endforeach
        </div>


        <div class="modal__container" id="sendMessage">
            <div class="modal">
                <div class="modal__body">
                    <form action="{{ route('auth.newsletter.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form__group">
                            <label for="object" class="form__label">Objet:</label>
                            <input type="text" name="object" id="object" placeholder="Objet du message..." class="input__form" autocomplete="off">
                        </div>

                        <div class="form__group">
                            <textarea name="message" id="message" rows="10" placeholder="Le message..." class="input__form"></textarea>
                        </div>

                        <div class="form__button">
                            <button type="submit" class="button__green">Envoyer le message</button>
                            <button type="button" class="close__button closeModal" onclick="closeModal(this)">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal__container fullHeightRight" id="users">
            <div class="modal">
                <div class="modal__body">

                    <a href="#!" onclick="closeModal(this)" class="closeFullHeightRight"> Fermer</a>

                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Adresses mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($recipients as $recipient)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $recipient->email }}</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
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
            $('#newsletter_message').summernote({
                placeholder: "Le message...",
                lang: 'fr-FR',
                height: 400,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                ]
            });
        });

        const modalOpener = (element) => {
            const targetSelector = element.dataset.target;
            const modal = document.querySelector(targetSelector);
            modal.style.display = "flex";
        };
    </script>
@endsection
