@extends('layouts.auth')

@section('extra-style')
    <link rel="stylesheet" href="{{ asset('assets/styles/auth/invoice.css') }}">
@endsection

@section('content')
    <div class="page__header__container">
        <h1 class="page__header__title">Demande de devis</h1>
    </div>
    <div class="page__content__container">
        <div class="invoice__container">
            @foreach ($invoices as $invoice)
                <div class="invoice__item">
                    <div class="invoice__header">
                        <div class="invoice__left">
                            <span class="invoice__date"><i class="fas fa-calendar"></i> {{ Carbon\Carbon::parse($invoice->created_at)->format("d/m/Y") }}</span>
                            <span class="invoice__id">#{{ $invoice->invoice_id }}</span>
                            <span class="invoice__name">{{ $invoice->fullname }}</span>
                            <span class="invoice__phone">{{ $invoice->phone }}</span>
                        </div>
                        <div class="invoice__right">
                            @if ($invoice->is_viewed)
                                <span class="declared">Déclaré</span>
                            @else
                                <a href="#!" onclick="event.preventDefault(); document.getElementById('declareInvoice{{ $invoice->id }}').submit()" class="primary__link__btn">Déclarer</a>

                            @endif
                        </div>
                        <form action="{{ route('auth.declareInvoice', $invoice) }}" method="post" id="declareInvoice{{ $invoice->id }}" hidden>
                            @csrf
                        </form>
                    </div>
                    <div class="invoice__body">
                        {!! $invoice->message !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('extra-script')

@endsection
