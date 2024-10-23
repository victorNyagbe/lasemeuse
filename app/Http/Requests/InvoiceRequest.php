<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            "fullname" => "required|string",
            "email" => "required|email|string",
            "phone" => "required|string",
            "message" => "required|string"
        ];
    }

    public function messages(): array
    {
        return [
            "fullname.required" => "Le nom complet est requis",
            "fullname.string" => "Le nom renseigné est incorrect. Veuillez renseigner du texte",
            "email.required" => "L'email est requis",
            "email.email" => "L'email est incorrect. Veuillez renseigner un email valide",
            "email.string" => "L'email renseigné est incorrect. Veuillez renseigner du texte",
            "phone.required" => "Le numéro de téléphone est requis",
            "phone.string" => "Le numéro de téléphone renseigné est incorrect. Veuillez renseigner du texte",
            "message.required" => "Le message est requis",
            "message.string" => "Le message de votre demande renseigné est incorrect. Veuillez renseigner du texte"
        ];
    }
}
