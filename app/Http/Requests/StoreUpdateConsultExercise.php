<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreUpdateConsultExercise extends FormRequest
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
        $rules =  [
            'serie' => ['required','numeric','min:0', 'max:50'],
            'repeat' => ['required','numeric','min:0', 'max:50'],
            'exercise_id' => ['required'],
        ];

        if ($this->method() == 'PUT') {
          
            $rules['execution'] = ['required', 'string'];
        }

        return $rules;
    }

    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'numeric' => 'Este campo permite somente números',
            'string' =>'Este campo deve ser do tipo string',
           
        ];
    }    
}
