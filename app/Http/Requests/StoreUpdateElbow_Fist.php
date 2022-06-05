<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateElbow_Fist extends FormRequest
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
            'right_elbow_flexion' => ['required','numeric'],
            'left_elbow_flexion' => ['required','numeric'],
            'right_elbow_extension' => ['required','numeric'],
            'left_elbow_extension' => ['required','numeric'],
            'right_fist_flexion' => ['required','numeric'],
            'left_fist_flexion' => ['required','numeric'],
            'right_fist_extension' => ['required','numeric'],
            'left_fist_extension' => ['required','numeric'],
            'right_supination' => ['required','numeric'],
            'left_supination' => ['required','numeric'],
            'right_pronation' => ['required','numeric'],
            'left_pronation' => ['required','numeric'],
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
