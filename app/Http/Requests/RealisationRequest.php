<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class RealisationRequest extends FormRequest
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
            "title" => "required|string",
            "image" => "nullable|file|image|mimes:png,jpg,jpeg,svp,webp"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre est requis",
            "title.string" => "Le titre est incorrect. Veuillez renseigner du texte",
            "image.file" => "L'image doit être un fichier",
            "image.image" => "L'image doit être une image",
            "image.mimes" => "L'image doit être un fichier png, jpg, jpeg, svg, webp"
        ];
    }
}
