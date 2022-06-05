<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateExercise extends FormRequest
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
            
            
            'exercise_name' => ['required','min:2', 'max:255'],
            'exercise_description' => ['required','min:2', 'max:255'],

        ];

        
        return $rules;
    }


    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',  
             ];    
            }    
}
