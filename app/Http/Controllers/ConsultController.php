<?php

namespace App\Http\Controllers;
use App\Models\Consult;
use App\Models\Avaliation;
use App\Models\User;
use Carbon\Carbon;


use Illuminate\Http\Request;

class ConsultController extends Controller
{
    public function index($id) {

        $consults = Consult::where('avaliation_id', $id)->get();

        //buscar avaliação e paciente pelo id da avaliação
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
              
        return view('consults', ['consults'=>$consults, 'avaliation'=>$avaliation, 'avaliationOwner' => $avaliationOwtner]); 

    }     

    
    public function create($id){

        $consults = new Consult;

        //Data atual
        $mytime = Carbon::now()->format('Y-m-d');

        $consults->date_consult = $mytime;
        $consults->avaliation_id = $id;

        $consults->save();
        
        return redirect()
            ->route('consults', $id)
            ->with('msg', 'Consulta cadastrada com sucesso!');

    }

    public function update(Request $request) {

        $data = $request->all();
       
        
        Consult::findOrFail($request->id)->update($data);

        //busca o id da avaliação pela consulta
        $consult = Consult::where('id', $request->id)->first();

        return redirect()
        ->route('consults', $consult['avaliation_id'])
        ->with('msg', 'Consulta editada com sucesso!');
    } 
    
    public function destroy(Request $request, $id) {
        
        //funcao busca a avaliação pelo id da consulta
        $consult = Consult::where('id', $id)->first()->toArray();
        
        $consult = Consult::withCount('prontuary')->findOrFail($id);

        if($consult->prontuary_count != 0)
            return redirect()
            ->route('consults', $consult['avaliation_id'])
            ->with('msg', 'Consulta possui prontuário cadastrado, não pode ser excluída!');

        else
            $consult->delete();  
            return redirect()
            ->route('consults', $consult['avaliation_id'])
            ->with('msg', 'Consulta excluída com sucesso!');  

        $delete = Consult::findOrFail($id)->delete();

        }
}
