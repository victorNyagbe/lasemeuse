<?php

namespace App\Http\Controllers\Auth;

use App\Models\Realisation;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\RealisationRequest;

class RealisationController extends Controller
{
    public function index(): View
    {
        $realisations = Realisation::orderByDesc("id")->get();
        $page = "realisations";
        return view("pages.auth.realisation", compact('realisations', 'page'));
    }

    public function store(RealisationRequest $request): RedirectResponse
    {
        if (!$request->hasFile("image")) {
            return redirect()->back()->withErrors(['image' => "Veuillez saisir une image."]);
        }

        $fields = $request->validated();

        $filePath = $request->file('image')->store('realisations', 'public');

        $fields['image'] = $filePath;

        Realisation::create($fields);

        return redirect()->back()->with("success", "La réalisation a été ajoutée avec succès");
    }

    public function update(RealisationRequest $request, Realisation $realisation): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("image")) {

            $oldFile = $realisation->image;

            $filePath = $request->file('image')->store('realisations', 'public');

            $fields['image'] = $filePath;

            if (Storage::disk("public")->exists($oldFile)) {
                Storage::disk("public")->delete($oldFile);
            }
        }

        $realisation->update($fields);

        return redirect()->back()->with("success", "La réalisation a été ajoutée avec succès");
    }

    public function destroy(Realisation $realisation): RedirectResponse
    {
        if (Storage::disk("public")->exists($realisation->image)) {
            Storage::disk("public")->delete($realisation->image);
        }

        $realisation->delete();

        return redirect()->back()->with('success', 'La réalisation a bien été retirée');
    }
}
