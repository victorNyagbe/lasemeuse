<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user =  User::where('login_token', session()->get("authenticate_token"))->first();
        if ($user != null) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "fullname" => "required|string",
            "email" => "nullable|email|unique:teams,email",
            "phone" => "nullable|numeric",
            "poste" => "required|string",
            "profile" => "nullable|file|image|mimes:png,jpg,jpeg,svg,webp"
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required" => "Le nom complet du membre est requis",
            "fullname.string" => "Le nom du membre est invalide",
            "email.email" => "Votre adresse mail est invalide",
            "email.unique" => "Cette adresse mail est déjà utilisée",
            "phone.numeric" => "Le numéro de téléphone du membre est incorrect",
            "poste.required" => "Le poste du membre est requis",
            "poste.string" => "Le poste du membre est invalide",
            "profile.file" => "L'image du membre est incorrecte",
            "profile.image" => "L'image du membre est incorrecte",
            "profile.mimes" => "L'image du membre doit être dans un des formats suivants: jpg, png, jpeg, svg, webp"
        ];
    }
}
