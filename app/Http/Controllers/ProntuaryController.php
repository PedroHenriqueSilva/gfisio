<?php

namespace App\Http\Controllers;
use App\Models\Consult;
use App\Models\Prontuary;
use App\Models\Avaliation;
use App\Models\User;
use App\Http\Requests\StoreUpdateProntuary;
use Illuminate\Http\Request;

class ProntuaryController extends Controller
{
    public function index($id) {

        //se existe prontuário pra essa consulta
        $prontuary = Prontuary::where('consult_id', $id)->first();

        //funcao busca a consulta pelo $id
        $consult = Consult::where('id',$id)->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $consult['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        
        if(is_null($prontuary)){
            $prontuary = "false";
        }
        else{
            $prontuary = $prontuary->toArray();
            
        }

        return view('prontuaries.show',['prontuary' => $prontuary, 'consult'=>$consult,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);
    
    }    

    public function create($id){

        //funcao busca a consulta pelo $id
        $consult = Consult::where('id',$id)->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $consult['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('prontuaries.create',['consult'=>$consult,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);

    }    

    public function store(StoreUpdateProntuary $request, $id) {

        $prontuaries = new Prontuary;

        $prontuaries->description_last_days = $request->description_last_days;
        $prontuaries->pain_level = $request->pain_level;
        $prontuaries->pain_quality = $request->pain_quality;
        $prontuaries->function_improvement = $request->function_improvement;
        $prontuaries->consult_id = $id;

        $prontuaries->save();
        
        return redirect()
            ->route('prontuaries', $id)
            ->with('msg', 'Prontuário cadastrado com sucesso!');

    }    

    public function edit($id){

        $prontuary = Prontuary::findOrFail($id);

        //funcao busca a consulta pelo $id
        $consult = Consult::where('id',$prontuary['consult_id'])->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $consult['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        

        return view('prontuaries.edit', ['prontuary' => $prontuary,'consult'=>$consult,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner ]);

    }

    public function update(StoreUpdateProntuary $request, $id) {

        $data = $request->all();
      
        Prontuary::findOrFail($request->id)->update($data);
        //buscar o id da consulta

        $prontuary = Prontuary::where('id', $id)->first();

        return redirect()
            ->route('prontuaries', $prontuary['consult_id'])
            ->with('msg', 'Prontuário editado com sucesso!');
    }   

    public function destroy(Request $request, $id) {
        
        //funcao busca a consulta pelo id do prontuário
        $prontuary = Prontuary::where('id', $id)->first()->toArray();
     
        $delete = Prontuary::findOrFail($id)->delete();

        if($delete)
            return redirect()
            ->route('prontuaries', $prontuary['consult_id'])
            ->with('msg', 'Prontuário excluído com sucesso!');
        else    
            return redirect()
                ->route('prontuaries', $prontuary['consult_id'])
                ->with('msg', 'Erro ao excluir prontuário');
    }
}
