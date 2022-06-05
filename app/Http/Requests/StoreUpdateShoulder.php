<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateShoulder extends FormRequest
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
            'right_flexion' => ['required','numeric'],
            'left_flexion' => ['required','numeric'],
            'right_extension' => ['required','numeric'],
            'left_extension' => ['required','numeric'],
            'right_external_rotation' => ['required','numeric'],
            'left_external_rotation' => ['required','numeric'],
            'right_internal_rotation' => ['required','numeric'],
            'left_internal_rotation' => ['required','numeric'],
            'right_abduction' => ['required','numeric'],
            'left_abduction' => ['required','numeric'],
            'push_right_horizontal_arm' => ['required','numeric'],
            'push_left_horizontal_arm' => ['required','numeric'],
            'push_right_vertical_arm' => ['required','numeric'],
            'push_left_vertical_arm' => ['required','numeric'],
            'right_pull' => ['required','numeric'],
            'left_pull' => ['required','numeric'],
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
