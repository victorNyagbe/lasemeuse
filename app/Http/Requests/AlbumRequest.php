<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class AlbumRequest extends FormRequest
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
            "files" => "required|array|min:1",
            "files.*" => "file|image|mimes:png,jpg,jpeg,webp,svg"
        ];
    }

    public function messages(): array
    {
        return [
            "title.required" => "Le titre de l'album est requis",
            "title.string" => "Veuillez bien renseigner le titre de l'album",
            "files.required" => "Veuillez bien ajouter des images à l'album required",
            "files.array" => "Veuillez bien ajouter des images à l'album array",
            "files.min" => "Veuillez bien ajouter au moins une image à l'album",
            "files.*.file" => "Veuillez bien ajouter des images à l'album",
            "files.*.image" => "Veuillez bien ajouter des images à l'album",
            "files.*.mimes" => "Veuillez bien ajouter des images au format png jpg, jpeg, webp, svg"
        ];
    }
}
