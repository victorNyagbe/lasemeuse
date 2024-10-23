<?php

namespace App\Http\Controllers\Guests;

use App\Models\Team;
use App\Models\Album;
use App\Models\Banner;
use App\Models\Content;
use App\Models\Invoice;
use App\Models\Realisation;
use Illuminate\Http\Request;
use App\Models\NewsletterContact;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\InvoiceRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use App\Events\NewsletterRegisteredEvent;

class MainController extends Controller
{
    public function home(): View
    {
        $banners = Banner::all();
        $content = Content::where('type', 'about')->first();
        $realisations = Realisation::latest()->take(4)->get();
        $teams = Team::take(4)->get();
        $page = "banners";
        return view('pages.guests.home', compact('page', 'banners', 'content', 'realisations', 'teams'));
    }

    public function about(): View
    {
        $content = Content::where('type', 'about')->first();
        $page = "about";
        return view('pages.guests.about', compact('content', 'page'));
    }

    public function services(): View
    {
        $page = "services";
        return view('pages.guests.services', compact('page'));
    }

    public function realisations(): View
    {
        $page = "realisations";
        $realisations = Realisation::latest()->get();
        return view('pages.guests.realisations', compact('page', 'realisations'));
    }

    public function team(): View
    {
        $page = "team";
        $teams = Team::all();
        return view('pages.guests.team', compact('page', 'teams'));
    }

    public function albumIndex(): View
    {
        $page = "album";
        $albums = Album::latest()->get();
        return view('pages.guests.album.index', compact('page', 'albums'));
    }

    public function albumShow(Album $album): View
    {
        $page = "album";
        $files = $album->files()->get();
        return view('pages.guests.album.show', compact('page', 'album', 'files'));
    }

    public function contact(): View
    {
        $page = "contact";
        return view('pages.guests.contact', compact('page'));
    }

    public function invoiceView(): View
    {
        $page = "invoice";
        return view('pages.guests.invoice', compact('page'));
    }

    public function invoice(InvoiceRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $invoice = Invoice::create($fields);

        return redirect()->back()->with("success", "La demande a bien été envoyée");
    }

    public function storeNewsletterMail(Request $request): RedirectResponse
    {
        $request->validate([
            "newsletter-email" => "required|email|unique:newsletter_contacts,email"
        ], [
            "newsletter-email.required" => "Votre adresse mail est requise",
            "newsletter-email.email" => "Votre adresse mail est invalide",
            "newsletter-email.unique" => "Cette adresse mail est déjà enregistrée"
        ]);

        $newsletter = NewsletterContact::create([
            "email" => $request->input("newsletter-email")
        ]);

        Event::dispatch(new NewsletterRegisteredEvent($newsletter->email));

        return redirect()->back()->with('newsletter-success', "success");
    }
}
