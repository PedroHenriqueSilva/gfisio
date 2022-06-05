<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Models\Avaliation;
use App\Models\User;
use App\Models\General;
use App\Models\Past;
use App\Models\Historic;
use App\Models\Redflag;
use App\Models\Subjective;
use App\Models\Questionnaire;
use App\Models\Exam;
use App\Models\Dynamop; 
use Carbon\Carbon;
use Redirect;

class AvaliationController extends Controller
{
    public function index($id) { 
        
        //$avaliationOwtner = User::where('id', $id)->first()->toArray();
        $avaliationOwtner = Avaliation::avaliationOwtner($id);
        $avaliation = Avaliation::where('user_id', $id)->paginate(5);

        
        return view('avaliation', ['avaliation'=>$avaliation, 'avaliationOwner' => $avaliationOwtner]); 
    }

    public function create($id) {

        //Data atual
        $mytime = Carbon::now()->format('Y-m-d');
       
        $avaliations = new Avaliation;
        
        $avaliations->date_aval = $mytime;
        $avaliations->user_id = $id;
        
        $avaliations->save();
        
        return redirect()
            ->route('avaliations', $id) 
            ->with('msg', 'Avaliação cadastrada com sucesso!');
    }

    public function update(Request $request) {

        $data = $request->all();
      
        Avaliation::findOrFail($request->id)->update($data);

        //verificar proprietário da avaliação
        $avaliation = Avaliation::where('id', $request->id)->first();
        $id_aval = $avaliation['user_id'];
        
        return redirect()
            ->route('avaliations', $id_aval)
            ->with('msg', 'Avaliação editada com sucesso!');
    }        

    public function info($id) {

        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        //verificar se existe avaliação geral cadastrada
        $avaliationGeneral = General::where('avaliation_id', $id)->first();

        if(is_null($avaliationGeneral)){
            $avaliationGeneral = "false";
        }
        else{
            $avaliationGeneral = $avaliationGeneral->toArray();
            
        }
        //verificar se existe histórico pregresso cadastrado
        $past = Past::where('avaliation_id', $id)->first();

        if(is_null($past)){
            $past = "false";
        }
        else{
            $past = $past->toArray();
            
        }

        //verificar se existe historico cadastrada
        $historic = Historic::where('avaliation_id', $id)->first();

        if(is_null($historic)){
            $historic = "false";
        }
        else{
            $historic = $historic->toArray();
            
        }
        
        //verificar se existe subjective cadastrado

        $subjective = Subjective::where('avaliation_id', $id)->first();
        if(is_null($subjective)){
            $subjective = "false";
        }
        else{
            $subjective = $subjective->toArray();
            
        }

        //verificar se existe questionário pai cadastrado

        $questionnaire = Questionnaire::where('avaliation_id', $id)->first();

        if(is_null($questionnaire)){
            $questionnaire = "false";
        }
        else{
            $questionnaire = $questionnaire->toArray();
            
        }
        
        //Verificar se existem exames cadastradados
        $exams = Exam::where('avaliation_id', $id)->get();
       
        if(is_null($exams)){
            $exams = "false";
        }
        else{
            $exams = $exams->toArray();
            
        }
       

        //Verificar se existem redflags cadastradados
        $redflags = Redflag::where('avaliation_id', $id)->first();

        if(is_null($redflags)){
            $redflags = "false";
        }
        else{
            $redflags = $redflags->toArray();
            
        }

        //verificar se existe dynamop cadastrado
        $dynamop = Dynamop::where('avaliation_id', $id)->first();
      

        if(is_null($dynamop)){
            $dynamop = "false";
        }
        else{
            $dynamop = $dynamop->toArray();
            
        }

        return view('avaliations.info',['avaliationGeneral' => $avaliationGeneral,'avaliation' => $avaliation, 
            'past'=>$past, 'avaliationOwtner' => $avaliationOwtner,'historic' => $historic, 'subjective'=>$subjective, 'exams' =>$exams, 'redflag'=>$redflags, 'questionnaire'=> $questionnaire,'dynamop'=>$dynamop]);

    }    

    public function destroy(Request $request, $id) {
        
        //funcao busca o usuario pelo id da avaliacao
        $aval = Avaliation::where('id', $id)->first()->toArray();
        
        $id = $request['aval_id'];    

        $avaliation = Avaliation::withCount('general','historic','redflag','past','subjective','questionnaire','exams','consults','dynamop')->findOrFail($id);    
        
        if($avaliation->general_count !=0 or $avaliation->historic_count !=0 or $avaliation->redflag_count !=0 or $avaliation->past_count !=0  or $avaliation->subjective_count !=0 or $avaliation->questionnaire_count !=0 or $avaliation->consults_count !=0  or $avaliation->exams_count !=0 or $avaliation->dynamop_count !=0)
          
            return redirect()
            ->route('avaliations', $aval['user_id'])
            ->with('msg', 'Avaliação possui dependências, não pode ser excluída!');
        else    
            $avaliation->delete();
            return redirect()
                ->route('avaliations', $aval['user_id'])
                ->with('msg', 'Avaliação Excluída com Sucesso!');

    }

}
