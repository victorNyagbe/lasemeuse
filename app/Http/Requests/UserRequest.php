<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string|max:255",
            "email" => ["required", "string", "email", "max:255", Rule::unique('users', 'email')->ignore($this->route('user'))],
            "password" => "required|string|min:8|confirmed",
            "avatar" => "nullable|file|image|mimes:png,jpg,jpeg,svg,webp"
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Le nom complet est requis",
            "name.max" => "Le nom complet est trop long",
            "name.string" => "Le nom complet renseigné est invalide",
            "email.required" => "L'email est requis",
            "email.string" => "L'email renseigné est incorrect",
            "email.max" => "L'email est trop long",
            "email.email" => "L'email renseigné est invalide",
            "email.unique" => "L'email est déjà utilisé",
            "password.required" => "Le mot de passe est requis",
            "password.string" => "Le mot de passe renseigné est incorrect",
            "password.min" => "Le mot de passe doit faire au moins 8 caractères",
            "password.confirmed" => "Le mot de passe et la confirmation ne correspondent pas",
            "avatar.file" => "L'avatar doit être un fichier",
            "avatar.image" => "L'avatar doit être une image",
            "avatar.mimes" => "L'avatar doit être un fichier de type png, jpg, jpeg, svg, webp"
        ];
    }
}
