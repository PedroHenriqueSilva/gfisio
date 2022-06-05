<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdatePast;
use App\Models\Past;
use App\Models\Avaliation;
use App\Models\User;

class PastController extends Controller
{
    public function store(StoreUpdatePast $request, $id) {
        
        $past = new Past;

        $past->drink = $request->drink;
        $past->drink_descr = $request->drink_descr;
        $past->smoke = $request->smoke;
        $past->smoke_descr = $request->smoke_descr;
        $past->diabetes = $request->diabetes;
        $past->diabetes_descr = $request->diabetes_descr;
        $past->has = $request->has;
        $past->has_descr = $request->has_descr;
        $past->cholesterol = $request->cholesterol;
        $past->cholesterol_descr = $request->cholesterol_descr;
        $past->heart = $request->heart;
        $past->heart_descr = $request->heart_descr;
        $past->pulmonary = $request->pulmonary;
        $past->pulmonary_descr = $request->pulmonary_descr;
        $past->renal = $request->renal;
        $past->renal_descr = $request->renal_descr;
        $past->gastrointestinal = $request->gastrointestinal;
        $past->gastrointestinal_descr = $request->gastrointestinal_descr;
        $past->neurological = $request->neurological;
        $past->neurological_descr = $request->neurological_descr;
        $past->psychological = $request->psychological;
        $past->psychological_descr = $request->psychological_descr;
        $past->rheumatological = $request->rheumatological;
        $past->rheumatological_descr = $request->rheumatological_descr;
        $past->vascular = $request->vascular;
        $past->vascular_descr = $request->vascular_descr;
        $past->mammary = $request->mammary;
        $past->mammary_descr = $request->mammary_descr;
        $past->uterus = $request->uterus;
        $past->uterus_descr = $request->uterus_descr;
        $past->scrotum = $request->scrotum;
        $past->scrotum_descr = $request->scrotum_descr;
        $past->thyroid = $request->thyroid;
        $past->thyroid_descr = $request->thyroid_descr;
        $past->covid19 = $request->covid19;
        $past->covid19_descr = $request->covid19_descr;
        $past->fracture = $request->fracture;
        $past->fracture_descr = $request->fracture_descr;
        $past->historical_ca = $request->historical_ca;
        $past->hist_ca_descr = $request->hist_ca_descr;
        $past->hist_family_ca = $request->hist_family_ca;
        $past->hist_family_ca_descr = $request->hist_family_ca_descr;
        $past->historical_surgeries = $request->historical_surgeries;
        $past->hist_surgeries_descr = $request->hist_surgeries_descr;
        $past->avaliation_id = $id;

        $past->save();
        
        return redirect()
        ->route('avaliations.info', $id)
        ->with('msg', 'Histórico Pregresso cadastrado com sucesso!');

    }    

    public function show($id) {
        
        $past = Past::findOrFail($id);

        $data = $past['avaliation_id'];

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('pasts.show', ['past' => $past, 'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function edit($id) {
        
        $past = Past::findOrFail($id);


        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();


        return view('pasts.edit', ['past' => $past,'avaliationOwtner' => $avaliationOwtner,'avaliation'=>$avaliation]);
  
    }

    public function update(StoreUpdatePast $request) {

        $data = $request->all();
      
        Past::findOrFail($request->id)->update($data);


        return redirect()
            ->route('past.show', $request->id)
            ->with('msg', 'Histórico Pregresso editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {
        
        //busca id da avaliação pelo id historic_pregresso
        $avaliation = Past::where('id', $id)->first();

        $delete = Past::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('avaliations.info', $avaliation['avaliation_id'])
                ->with('msg', 'Histórico Pregresso excluído com sucesso!');
        else    
            return redirect()
                ->route('avaliations', $avaliation['avaliation_id'])
                ->with('msg', 'Erro ao excluir o histórico Pregresso!');

    }
}
