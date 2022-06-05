<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateHip extends FormRequest
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
            'right_hip_extension' => ['required','numeric'],
            'left_hip_extension' => ['required','numeric'],
            'right_hip_flexion' => ['required','numeric'],
            'left_hip_flexion' => ['required','numeric'],
            'right_hip_abduction' => ['required','numeric'],
            'left_hip_abduction' => ['required','numeric'],
            'right_hip_adduction' => ['required','numeric'],
            'left_hip_adduction' => ['required','numeric'],
                   
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
