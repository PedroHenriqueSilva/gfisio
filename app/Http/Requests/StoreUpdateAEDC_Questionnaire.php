<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateAEDC_Questionnaire extends FormRequest
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
            
            'aedc_score' => ['required', 'numeric','min:30','max:300'],
            'aedc_img' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['aedc_img'] = ['nullable', 'image'];
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
