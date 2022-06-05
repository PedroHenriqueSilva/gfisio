<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCSI_Questionnaire extends FormRequest
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
            'content' => ['nullable', 'min:5', 'max:10000'],
            'csi_score' => ['required', 'numeric','min:25','max:100'],
            'csi_img' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['csi_img'] = ['nullable', 'image'];
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
