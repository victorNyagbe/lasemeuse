<?php

namespace App\Http\Controllers\Auth;

use App\Models\File;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\AlbumRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class PhototequeController extends Controller
{
    public function index(): View
    {
        $albums = Album::all();
        $page = "phototeque";
        return view("pages.auth.phototeque.index", compact("albums", "page"));
    }

    public function store(AlbumRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        $album = Album::create([
            "title" => $fields["title"]
        ]);

        $files = $fields["files"];

        foreach ($files as $file) {
            $album->files()->create([
                "filepath" => $file->store('albums', 'public'),
                "filetype" => $file->getMimeType()
            ]);
        }

        return redirect()->back()->with('success', 'Album enregistré avec succès');
    }

    public function show(Album $album): View
    {
        $files = $album->files()->get();
        $page = "phototeque";
        return view('pages.auth.phototeque.show', compact("album", "files", "page"));
    }

    public function update(Album $album, Request $request): RedirectResponse
    {
        $request->validate([
            "title" => "required|string",
        ], [
            "title.required" => "Le titre de l'album est requis",
            "title.string" => "Veuillez bien renseigner le titre de l'album"
        ]);

        $album->update([
            "title" => $request->input("title")
        ]);

        return redirect()->route("auth.phototeque.show", $album)->with("success", "Album modifié avec succès");
    }

    public function updateImages(Album $album, Request $request): RedirectResponse
    {
        $fields = $request->validate([
            "files" => "required|array|min:1",
            "files.*" => "file|image|mimes:png,jpg,jpeg,webp,svg"
        ], [
            "files.required" => "Veuillez bien ajouter des images à l'album required",
            "files.array" => "Veuillez bien ajouter des images à l'album array",
            "files.min" => "Veuillez bien ajouter au moins une image à l'album",
            "files.*.file" => "Veuillez bien ajouter des images à l'album",
            "files.*.image" => "Veuillez bien ajouter des images à l'album",
            "files.*.mimes" => "Veuillez bien ajouter des images au format png jpg, jpeg, webp, svg"
        ]);

        $files = $fields["files"];

        foreach ($files as $file) {
            $album->files()->create([
                "filepath" => $file->store('albums', 'public'),
                "filetype" => $file->getMimeType()
            ]);
        }

        return redirect()->back()->with("success", "Album modifié avec succès");
    }

    public function updateSingleImage(Album $album, File $file, Request $request): RedirectResponse
    {
        $request->validate([
            "file" => "required|file|image|mimes:png,jpg,jpeg,svg,webp"
        ], [
            "file.required" => "Vous devez sélectionner une image",
            "file.file" => "Vous devez sélectionner un fichier",
            "file.image" => "Vous devez sélectionner une image",
            "file.mimes" => "Vous devez sélectionner une image avec l'une des extensions suivantes: jpg, jpeg, png, svg, webp"
        ]);

        $oldFile = $file->filepath;

        $file->update([
            "filepath" => request("file")->store('albums', 'public'),
            "filetype" => $request->file("file")->getMimeType()
        ]);

        if (Storage::disk("public")->exists($oldFile)) {
            Storage::disk("public")->delete($oldFile);
        }

        return redirect()->back()->with("success", "Image modifiée avec succès");
    }

    public function destroy(File $file): RedirectResponse
    {
        if (Storage::disk("public")->delete($file->filepath)) {
            Storage::disk("public")->delete($file->filepath);
        }

        $file->delete();

        return redirect()->back()->with("success", "Image supprimée avec succès");
    }
}
