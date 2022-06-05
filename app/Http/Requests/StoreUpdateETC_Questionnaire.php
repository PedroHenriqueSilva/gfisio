<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateETC_Questionnaire extends FormRequest
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
            
            'etc_score' => ['required', 'numeric','min:17', 'max:68'],
            'etc_img' => ['required', 'image'],
        ];

        if ($this->method() == 'PUT') {
            $rules['etc_img'] = ['nullable', 'image'];
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
