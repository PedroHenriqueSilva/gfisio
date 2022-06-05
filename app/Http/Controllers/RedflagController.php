<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Redflag;
use App\Models\Avaliation;
use App\Models\User;
use App\Http\Requests\StoreUpdateRedflag;

class RedflagController extends Controller
{
    public function store(StoreUpdateRedflag $request, $id) {
        
        $redflags = new Redflag;

        $redflags->fever = $request->fever;
        $redflags->fever_descr = $request->fever_descr;
        $redflags->fallen = $request->fallen;
        $redflags->fallen_descr = $request->fallen_descr;
        $redflags->dizziness = $request->dizziness;
        $redflags->dizziness_descr = $request->dizziness_descr;
        $redflags->dif_walking = $request->dif_walking;
        $redflags->dif_walking_descr = $request->dif_walking_descr;
        $redflags->notura_pain = $request->notura_pain;
        $redflags->notura_pain_descr = $request->notura_pain_descr;
        $redflags->stiffness = $request->stiffness;
        $redflags->stiffness_descr = $request->stiffness_descr;
        $redflags->weight_loss = $request->weight_loss;
        $redflags->weight_loss_descr = $request->weight_loss_descr;
        $redflags->faint = $request->faint;
        $redflags->faint_descr = $request->faint_descr;
        $redflags->formication = $request->formication;
        $redflags->formication_descr = $request->formication_descr;
        $redflags->tiredness = $request->tiredness;
        $redflags->tiredness_descr = $request->tiredness_descr;
        $redflags->endless_pain = $request->endless_pain;
        $redflags->endless_pain_descr = $request->endless_pain_descr;
        $redflags->urinary_dysfunction = $request->urinary_dysfunction;
        $redflags->urinary_dysfunction_descr = $request->urinary_dysfunction_descr;
        $redflags->intestinal_dysfunction = $request->intestinal_dysfunction;
        $redflags->intestinal_dysfunction_descr = $request->intestinal_dysfunction_descr;
        $redflags->sexual_dysfunction = $request->sexual_dysfunction;
        $redflags->sexual_dysfunction_descr = $request->sexual_dysfunction_descr;
        $redflags->avaliation_id = $id;
        
        $redflags->save();
        
        return redirect()
        ->route('avaliations.info', $id)
        ->with('msg', 'Redflags cadastrado com sucesso!');

    }

    public function show($id) {
        
        $redflag = Redflag::findOrFail($id);

        $data = $redflag['avaliation_id'];

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('redflags.show', ['redflag' => $redflag,  'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function edit($id) {

        $redflag = Redflag::findOrFail($id);


        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $redflag['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('redflags.edit', ['redflag' => $redflag, 'avaliation'=>$avaliation, 'avaliationOwtner'=>$avaliationOwtner]);

    }

    public function update(Request $request, $id) {

        $data = $request->all();
      
        Redflag::findOrFail($request->id)->update($data);


        return redirect()
            ->route('redflag.show', $request->id)
            ->with('msg', 'Redflags editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {
        
        //busca id da avaliação pelo id historic
        $avaliation = Redflag::where('id', $id)->first();

        $delete = Redflag::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('avaliations.info', $avaliation['avaliation_id'])
                ->with('msg', 'Redflags excluída com sucesso!');
        else    
            return redirect()
                ->route('avaliations', $avaliation['avaliation_id'])
                ->with('msg', 'Erro ao excluir o redflags');

    }

}
