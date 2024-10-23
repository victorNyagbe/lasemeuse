<?php

namespace App\Http\Controllers\Auth;

use App\Models\Content;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class MainController extends Controller
{
    public function dashboard()
    {
        $page = "dashboard";
        return view('pages.auth.dashboard', compact('page'));
    }

    public function aboutIndex()
    {
        $content = Content::where('type', 'about')->first();
        $page = "about";
        return view('pages.auth.about', compact('content', 'page'));
    }

    public function aboutStore(Request $request): RedirectResponse
    {
        $request->validate([
            "about" => "required|string"
        ], [
            "about.required" => "Veuillez renseigner le texte.",
            "about.string" => "Texte renseigné incorrect"
        ]);

        Content::updateOrCreate(
            ["type" => "about"],
            ["body" => $request->input("about")]
        );

        return redirect()->back()->with("success", "Opération effectuée avec succès");
    }

    public function invoiceIndex()
    {
        $invoices = Invoice::latest()->get();
        $page = "invoice";
        return view('pages.auth.invoice', compact('invoices', 'page'));
    }

    public function declareInvoice(Invoice $invoice, Request $request): RedirectResponse
    {
        $invoice->is_viewed = true;

        $invoice->save();

        return redirect()->back()->with('success', "Le devis a bien été déclaré vu et lu");
    }
}
