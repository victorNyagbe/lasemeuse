<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class NewsletterRequest extends FormRequest
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
            "object" => "required|string",
            "message" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "object.required" => "Veuillez renseigner l'objet du message",
            "object.string" => "L'objet renseigné est incorrect, veuillez renseigner du texte",
            "message.required" => "Veuillez renseigner le message",
            "message.string" => "Le message renseigné est incorrect, veuillez renseigner du texte"
        ];
    }
}
