<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonnelRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
              'nom' => 'required|string|max:255',
              'prenom' => 'required|string|max:255',
              'cin' => 'required|string|max:20|unique:personnels,cin',
              'date_naissance' => 'nullable|date',
              'telephone' => 'nullable|string|max:20',
              'id_etab' => 'required|exists:etablissements,id_etab'
        ];
    }
}
