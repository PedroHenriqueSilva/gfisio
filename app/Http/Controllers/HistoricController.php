<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateHistoric;
use App\Models\Historic;
use App\Models\Avaliation;
use App\Models\User;

class HistoricController extends Controller
{
    public function store(StoreUpdateHistoric $request, $id) {

        $historics = new Historic;
        
        $historics->medical_diagnostic = $request->medical_diagnostic;
        $historics->medication = $request->medication;
        $historics->complaint = $request->complaint;
        $historics->story = $request->story;

        $historics->avaliation_id = $id;
        $historics->save();
        
        return redirect()
        ->route('avaliations.info', $id)
        ->with('msg', 'Histórico cadastrado com sucesso!');

    }

    public function show($id) {
        
        $historic = Historic::findOrFail($id);

        $data = $historic['avaliation_id'];
        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('historics.show', ['historic' => $historic, 'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function edit($id) {
        
        $historic = Historic::findOrFail($id);

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('historics.edit', ['historic' => $historic, 'avaliationOwtner' => $avaliationOwtner,'avaliation'=>$avaliation]);
  
    }

    public function update(StoreUpdateHistoric $request) {

        $data = $request->all();
      
        Historic::findOrFail($request->id)->update($data);


        return redirect()
            ->route('historic.show', $request->id)
            ->with('msg', 'Histórico editado com sucesso!');
    }   
    
    public function destroy(Request $request, $id) {
        
        //busca id da avaliação pelo id historic
        $avaliation = Historic::where('id', $id)->first();

        $delete = Historic::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('avaliations.info', $avaliation['avaliation_id'])
                ->with('msg', 'Histórico excluído com sucesso!');
        else    
            return redirect()
                ->route('avaliations', $avaliation['avaliation_id'])
                ->with('msg', 'Erro ao excluir o histórico');

    }

}
