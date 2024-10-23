@extends('layouts.app')

@section('extra-styles')
    <link rel="stylesheet" href="{{ asset('assets/styles/guests/invoice.css') }}">
@endsection

@section('content')
    <div class="invoice-header-container">
        <div class="invoice-header-cover">
            <h1 class="invoice-header-title">Demande de devis</h1>
            {{-- <p class="invoice-header-subtitle">Découvrez toutes nos réalisations</p> --}}
        </div>
    </div>

    <section class="container">
        @include('includes.auth.flash')
        <div class="invoice-content">
            <form action="{{ route('guests.invoice') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label for="fullname">Nom & Prénom(s)</label>
                        <input type="text" name="fullname" id="fullname" placeholder="Votre nom complet...">
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse e-mail</label>
                        <input type="email" name="email" id="email" placeholder="Votre adresse e-mail...">
                    </div>
                    <div class="form-group">
                        <label for="phone">Téléphone</label>
                        <input type="tel" name="phone" id="phone" placeholder="Votre numéro de téléphone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="15" placeholder="Votre message..."></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Envoyer la demande</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('extra-scripts')
    <script>
        const closeAlert = (element) => {
            const alertContainer = element.parentNode;

            alertContainer.style.display = "none";
        }
    </script>
@endsection
