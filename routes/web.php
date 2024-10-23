<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\BannerController;
use App\Http\Controllers\Guests\MainController;
use App\Http\Controllers\Auth\NewsletterController;
use App\Http\Controllers\Auth\PhototequeController;
use App\Http\Controllers\Auth\RealisationController;
use App\Http\Controllers\Auth\MainController as AuthMainController;
use App\Http\Controllers\Auth\TeamController;

Route::as("guests.")->group(function () {
    Route::get('/', [MainController::class, "home"])->name("home");

    Route::get('qui-sommes-nous', [MainController::class, "about"])->name("about");

    Route::get("services", [MainController::class, "services"])->name('services');

    Route::get('realisations', [MainController::class, "realisations"])->name('realisations');

    Route::get('equipe', [MainController::class, "team"])->name('team');

    Route::prefix('phototeque/')->as('album.')->group(function () {
        Route::get('', [MainController::class, "albumIndex"])->name('index');

        Route::get('{album}/details', [MainController::class, "albumShow"])->name('show');
    });

    Route::get('demande-devis', [MainController::class, "invoiceView"])->name('invoice-view');

    Route::post("demande-devis", [MainController::class, "invoice"])->name('invoice');

    Route::post("newsletter-mail", [MainController::class, "storeNewsletterMail"])->name('newsletter-mail');

    Route::get('contact', [MainController::class, "contact"])->name('contact');
});

// Auth
Route::middleware("check.auth.user")->prefix('auth/')->as("auth.")->group(function () {

    Route::get('tableau-de-bord', [AuthMainController::class, "dashboard"])->name('dashboard');

    Route::prefix('bannieres/')->as('banners.')->group(function () {
        Route::get('', [BannerController::class, "index"])->name("index");

        Route::post('/store', [BannerController::class, 'store'])->name('store');

        Route::patch('{banner}/update', [BannerController::class, "update"])->name('update');

        Route::delete("{banner}/destroy", [BannerController::class, "destroy"])->name('destroy');
    });

    Route::prefix('qui-sommes-nous/')->as("about.")->group(function () {
        Route::get('', [AuthMainController::class, "aboutIndex"])->name("index");

        Route::post('/store', [AuthMainController::class, "aboutStore"])->name("store");
    });

    Route::prefix('realisations/')->as('realisations.')->group(function () {
        Route::get('', [RealisationController::class, "index"])->name("index");

        Route::post('/store', [RealisationController::class, 'store'])->name('store');

        Route::patch('{realisation}/update', [RealisationController::class, "update"])->name('update');

        Route::delete("{realisation}/destroy", [RealisationController::class, "destroy"])->name('destroy');
    });

    Route::prefix('phototeque/')->as('phototeque.')->group(function () {
        Route::get('', [PhototequeController::class, "index"])->name("index");

        Route::post('album-store', [PhototequeController::class, "store"])->name("store");

        Route::get('album/{album}/details', [PhototequeController::class, "show"])->name("show");

        Route::patch("album/{album}/update-processing", [PhototequeController::class, "update"])->name("update");

        Route::patch("album/{album}/update", [PhototequeController::class, "updateImages"])->name("updateImages");

        Route::patch("album/{album}/{file}/update-single", [PhototequeController::class, "updateSingleImage"])->name("updateSingleImage");

        Route::delete("album{file}/delete", [PhototequeController::class, "destroy"])->name("destroy");
    });

    Route::prefix('newsletter/')->as('newsletter.')->group(function () {
        Route::get('', [NewsletterController::class, "index"])->name("index");

        Route::post('send-message', [NewsletterController::class, "store"])->name("store");
    });

    Route::prefix('administrateurs/')->as('users.')->group(function () {
        Route::get('', [UserController::class, "index"])->name("index");

        Route::post('register', [UserController::class, "register"])->name('register');

        Route::post('logout', [UserController::class, "logout"])->name('logout');
    });

    Route::prefix("notre-equipe/")->as('teams.')->group(function () {
        Route::get('', [TeamController::class, "index"])->name('index');

        Route::post('store', [TeamController::class, "store"])->name('store');

        Route::patch('{team}/update', [TeamController::class, "update"])->name('update');

        Route::delete('{team}/destroy', [TeamController::class, "destroy"])->name('destroy');
    });

    Route::withoutMiddleware("check.auth.user")->group(function () {
        Route::get('login', [UserController::class, "loginView"])->name("login.view");

        Route::post('login', [UserController::class, "login"])->name("login");

        Route::post('logout', [UserController::class, "logout"])->name("logout");
    });

    Route::get('demande-de-devis', [AuthMainController::class, "invoiceIndex"])->name('invoiceIndex');

    Route::post('demande-de-devis/{invoice}/details', [AuthMainController::class, "declareInvoice"])->name('declareInvoice');
});
