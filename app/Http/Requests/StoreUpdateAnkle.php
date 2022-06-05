<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAnkle extends FormRequest
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
            'right_plantar_flexion' => ['required','numeric'],
            'left_plantar_flexion' => ['required','numeric'],
            'right_dorsiflexion' => ['required','numeric'],
            'left_dorsiflexion' => ['required','numeric'],
            'right_inversion' => ['required','numeric'],
            'left_inversion' => ['required','numeric'],
            'right_eversion' => ['required','numeric'],
            'left_eversion' => ['required','numeric'],
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'numeric' => 'Campo deve ser do tipo número', 
          ];
    }
}
