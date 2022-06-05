<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateBPCS_Questionnaire extends FormRequest
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
            
            'bpcs_score' => ['required', 'numeric','min:0','max:5'],
            'bpcs_img' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['bpcs_img'] = ['nullable', 'image'];
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
