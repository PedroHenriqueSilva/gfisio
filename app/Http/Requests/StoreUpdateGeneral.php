<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateGeneral extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'age' => ['required','min:1', 'max:3'],
            'weight' => ['required','min:1', 'max:5'],
            'height' => ['required','min:1', 'max:5'],
            'imc' => ['required','min:1', 'max:5'],
            'job_description' => ['required','min:2', 'max:255'],
            'repeated_movements' => ['required','min:2', 'max:255'],
            'demand_physical_psycho' => ['required','min:2', 'max:255'],
            'worse_clinical_work' => ['required','min:2', 'max:255'],
            'leisure' => ['required','min:2', 'max:255'],
            'physical_activity' => ['required','min:2', 'max:255'],
            'physical_activity_time' => ['required','min:2', 'max:255'],
            'discomfort_physical_activity' => ['required','min:2', 'max:255'],
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',

        ];
    }
}
