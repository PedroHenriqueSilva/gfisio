<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateGeneral;
use App\Models\General;
use App\Models\Avaliation;
use App\Models\User;

class GeneralController extends Controller
{
    public function store(StoreUpdateGeneral $request, $id) {

        $generals = new General;
        
        $generals->age = $request->age;
        $generals->weight = $request->weight;
        $generals->height = $request->height;
        $generals->imc = $request->imc;
        $generals->job_description = $request->job_description;
        $generals->repeated_movements = $request->repeated_movements;
        $generals->demand_physical_psycho = $request->demand_physical_psycho;
        $generals->worse_clinical_work = $request->worse_clinical_work;
        $generals->leisure = $request->leisure;
        $generals->physical_activity = $request->physical_activity;
        $generals->physical_activity_time = $request->physical_activity_time;
        $generals->discomfort_physical_activity = $request->discomfort_physical_activity;

        $generals->avaliation_id = $id;
        
        $generals->save();
        
        return redirect()
            ->route('avaliations.info', $id)
            ->with('msg', 'Avaliação Geral cadastrada com sucesso!');

    }

    public function show($id) {
        
        $general = General::findOrFail($id);

        $data = $general['avaliation_id'];
         
        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('generals.show', ['general' => $general, 'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function edit($id) {

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();


        $general = General::findOrFail($id);
        return view('generals.edit', ['general' => $general,'avaliationOwtner' => $avaliationOwtner,'avaliation'=>$avaliation]);

    }

    public function update(StoreUpdateGeneral $request) {

        $data = $request->all();

        General::findOrFail($request->id)->update($data);

        return redirect()
            ->route('general.show', $request->id)
            ->with('msg', 'Avaliação Geral editada com sucesso!');
    }

    public function destroy(Request $request, $id) {
        
        //funcao busca o usuario pelo id da avaliacao
        
        //busca id da avaliação pelo id avaliação geral
        $avaliation = General::where('id', $id)->first();

        $delete = General::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('avaliations.info', $avaliation['avaliation_id'])
                ->with('msg', 'Avaliação geral excluída com sucesso!');
        else    
            return redirect()
                ->route('avaliations', $aval['user_id'])
                ->with('msg', 'Erro ao excluir a avaliação geral');

    }
}
