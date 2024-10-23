<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\UserCreatedEvent;
use App\Http\Requests\UserRequest;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::orderBy('name')->get();
        $page = "users";
        return view('pages.auth.users.index', compact('users', 'page'));
    }

    public function register(UserRequest $request): RedirectResponse
    {
        $fields = $request->validated();

        if ($request->hasFile("avatar")) {
            $fields["avatar"] = $request->file("avatar")->store("avatars", "public");
        }

        $passwordHashed = Hash::make($request->password);

        $fields["password"] = $passwordHashed;

        $user = User::create($fields);

        $data = [
            "name" => $user->name,
            "email" => $user->email,
            "password" => $request->password,
        ];

        Event::dispatch(new UserCreatedEvent($data));

        return redirect()->back()->with('success', "L'utilisateur a été crée avec succès");
    }

    public function loginView(): View
    {
        $page = "users";
        return view('pages.auth.login', compact('page'));
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            "password" => "required"
        ], [
            'email.required' => "L'email est requis",
            'email.email' => "L'email n'est pas valide",
            'email.exists' => "L'email renseigné est incorrect",
            "password.required" => "Le mot de passe est requis"
        ]);

        $user = User::where('email', $request->email)->first();

        if (!Hash::check($request->password, $user->password)) {

            $request->session()->regenerateToken();

            return redirect()->back()->withErrors([
                "password" => "Le mot de passe est incorrect"
            ]);
        }

        $token = bin2hex(random_bytes(32));

        $user->update([
            "login_token" => $token,
        ]);

        $request->session()->put("authenticate_token", $token);
        $request->session()->put("name", $user->name);
        $request->session()->put("email", $user->email);

        $request->session()->regenerateToken();

        return redirect()->route("auth.dashboard");
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("auth.login");
    }
}
