<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function store($id) {

        $questionnaires = new Questionnaire;
        
        $questionnaires->avaliation_id = $id;
        
        $questionnaires->save();
        
        return redirect()
            ->route('avaliations.info', $id)
            ->with('msg', 'Questionário cadastrado com sucesso!');
    }
}
