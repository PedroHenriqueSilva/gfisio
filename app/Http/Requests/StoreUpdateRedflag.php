<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRedflag extends FormRequest
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
            'fever_descr' => ['required_if:fever,sim'],
            'fallen_descr' => ['required_if:fallen,sim'],
            'dizziness_descr' => ['required_if:dizziness,sim'],
            'dif_walking_descr' => ['required_if:dif_walking,sim'],
            'notura_pain_descr' => ['required_if:notura_pain,sim'],
            'stiffness_descr' => ['required_if:stiffness,sim'],
            'weight_loss_descr' => ['required_if:weight_loss,sim'],
            'faint_descr' => ['required_if:faint,sim'],
            'formication_descr' => ['required_if:formication,sim'],
            'tiredness_descr' => ['required_if:tiredness,sim'],
            'endless_pain_descr' => ['required_if:endless_pain,sim'],
            'urinary_dysfunction_descr' => ['required_if:urinary_dysfunction,sim'],
            'intestinal_dysfunction_descr' => ['required_if:intestinal_dysfunction,sim'],
            'sexual_dysfunction_descr' => ['required_if:sexual_dysfunction,sim'],
        ];
    }

    public function messages()
    {
        return[
            'required_if' => 'Este campo é obrigatório',
            'min' => 'Campo deve ter no mínimo :min caracteres',
            'max' => 'Campo deve ter no máximo :max caracteres',

        ];
    }
}
