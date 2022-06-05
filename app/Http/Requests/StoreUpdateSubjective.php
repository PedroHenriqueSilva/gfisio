<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSubjective extends FormRequest
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
        $rules = [
            
            'subjective_scale' => ['required', 'numeric'],
            'subjective_characteristic' => ['required'],
            'subjective_spatial_location' => ['required'],
            'subjective_description' => ['required'],
            'subjective_img' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['subjective_img'] = ['nullable', 'image'];
        }

        return $rules;
    }
    
    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'image' => 'O arquivo deve ser do tipo imagem',
        ];
    }    
}
