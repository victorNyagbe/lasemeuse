<?php

namespace App\Http\Controllers\Auth;

use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Requests\TeamRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    public function index(): View
    {
        $teams = Team::all();
        $page = "teams";
        return view('pages.auth.teams.index', compact('teams', 'page'));
    }

    public function store(TeamRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        if (!$request->hasFile("profile")) {
            return redirect()->back()->withErrors([
                "profile" => "Veuillez importer l'image du membre"
            ]);
        }

        $fields["profile"] = request("profile")->store("teams", "public");

        $member = Team::create($fields);

        return redirect()->back()->with('success', 'Membre ajouté avec succès');
    }

    public function update(TeamRequest $request, Team $team): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("profile")) {
            $oldProfile = $team->profile;

            $fields["profile"] = request("profile")->store("teams", "public");

            if (Storage::disk("public")->exists($oldProfile)) {
                Storage::disk('public')->delete($oldProfile);
            }
        }

        $team->update($fields);

        return redirect()->back()->with('success', 'Membre modifié avec succès');
    }

    public function destroy(Team $team): RedirectResponse
    {
        $oldProfile = $team->profile;

        if (Storage::disk("public")->exists($oldProfile)) {
            Storage::delete('storage/' . $oldProfile);
        }

        $team->delete();

        return redirect()->back()->with('success', 'Membre supprimé avec succès');
    }
}
