<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAdministratifRequest extends FormRequest
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
            'id_personnel' => 'required|exists:personnels,id_personnel|unique:administratifs,id_personnel',
            'matricule' => 'required|unique:administratifs,matricule',
            'date_recrutement' => 'nullable|date',
            'grade' => 'nullable|string',
            'echelon' => 'nullable|integer',
            'fonction' => 'nullable|string'
        ];
    }
}
