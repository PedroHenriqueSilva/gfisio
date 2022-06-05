<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePast extends FormRequest
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
            'drink_descr' => ['required_if:drink,sim'],
            'smoke_descr' => ['required_if:smoke,sim'],
            'diabetes_descr' => ['required_if:diabetes,sim'],
            'has_descr' => ['required_if:has,sim'],
            'cholesterol_descr' => ['required_if:cholesterol,sim'],
            'heart_descr' => ['required_if:heart,sim'],
            'pulmonary_descr' => ['required_if:pulmonary,sim'],
            'renal_descr' => ['required_if:renal,sim'],
            'gastrointestinal_descr' => ['required_if:gastrointestinal,sim'],
            'neurological_descr' => ['required_if:neurological,sim'],
            'psychological_descr' => ['required_if:psychological,sim'],
            'rheumatological_descr' => ['required_if:rheumatological,sim'],
            'vascular_descr' => ['required_if:vascular,sim'],
            'mammary_descr' => ['required_if:mammary,sim'],
            'uterus_descr' => ['required_if:uterus,sim'],
            'scrotum_descr' => ['required_if:scrotum,sim'],
            'thyroid_descr' => ['required_if:thyroid,sim'],
            'covid19_descr' => ['required_if:covid19,sim'],
            'fracture_descr' => ['required_if:fracture,sim'],
            'hist_ca_descr' => ['required_if:historical_ca,sim'],
            'hist_family_ca_descr' => ['required_if:hist_family_ca,sim'],
            'hist_surgeries_descr' => ['required_if:historical_surgeries,sim'],
            
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Este campo é obrigatório',
            'required_if'=> 'Este campo deve ser preenchido',
      
        ];
    }
}
