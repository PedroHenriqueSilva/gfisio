<?php

namespace App\Http\Requests;
use App\Rules\TextName;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StoreUpdateUser extends FormRequest
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
        $id = $this->segment(3);
        return [
            'name' => ['required','string','min:2', 'max:255'],
            'date_nasc' => ['required', 'date'],
            'sex' => ['required'],
            'end' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:45'],
            'state' => ['required', 'string', 'max:45'],
            'profission' => ['required', 'string', 'max:45'],
            'son' => ['required', 'numeric','min:0'],
            'civil_status' => ['required', 'string', 'max:45'],
            'dominant_side' => ['required', 'string', 'max:45'],
            'email' => ['required', Rule::unique('users')->ignore($id),'email', 'max:255'],
            'phone' => ['required'],
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',
            'numeric' => 'Este campo permite somente números',
            'unique' => 'Este ":attribute" não se encontra disponivel no momento!',
            'string' => 'Este campo permite somente texto'
        ];
    }    
}
