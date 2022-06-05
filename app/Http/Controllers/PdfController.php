<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliation;
use App\Models\User;
use App\Models\Historic;
use App\Models\Past;
use App\Models\General;
use App\Models\Redflag;
use App\Models\Shoulder;
use App\Models\Hip_Knee;
use App\Models\Elbow_Fist;
use App\Models\Ankle;
use App\Models\Subjective;
use App\Models\Dynamop;
use App\Models\Consult;
use App\Models\Prontuary;
use PDF;

class PdfController extends Controller
{

    public function gera_pdf_avaliation($id) {

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

         //busca as informações usuário
         $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

         //funcão busca avaliação geral pelo id da avaliação
        $general = General::where('avaliation_id', $id)->first();

        //funcão busca redflags pelo id da avaliação
        $redflag = Redflag::where('avaliation_id', $id)->first();

        //funcão busca histórico pelo id da avaliação
        $historic = Historic::where('avaliation_id', $id)->first();

        //função busca subjetiva pelo id da avaliação
        $subjective = Subjective::where('avaliation_id', $id)->first();
       

        $pdf = PDF::loadView('avaliations.pdf',compact('general','redflag','historic','avaliation','avaliationOwtner','subjective'));

        return $pdf->setPaper('a4')->stream('avaliation.pdf');

    }

    public function gera_pdf_historic($id) {

        $historic = Historic::findOrFail($id);

        $data = $historic['avaliation_id'];

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        $pdf = PDF::loadView('historics.pdf',compact('historic','avaliation','avaliationOwtner'));

        return $pdf->setPaper('a4')->stream('historico.pdf');

    }

    public function gera_pdf_general($id) {

        $general = General::findOrFail($id);

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $general['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        $pdf = PDF::loadView('generals.pdf',compact('general','avaliation','avaliationOwtner'));

        return $pdf->setPaper('a4')->stream('geral.pdf');

    }
        public function gera_pdf_past($id) {

            $past = Past::findOrFail($id);
    
            //funcao busca o usuario pelo id da avaliacao
            $avaliation = Avaliation::where('id', $past['avaliation_id'])->first()->toArray();
    
            //busca as informações usuário
            $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
    
            $pdf = PDF::loadView('pasts.pdf',compact('past','avaliation','avaliationOwtner'));
    
            return $pdf->setPaper('a4')->stream('past.pdf');
    
        }
    

    public function gera_pdf_redflags($id) {

        $redflag = Redflag::findOrFail($id);

        $data = $redflag['avaliation_id'];

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        $pdf = PDF::loadView('redflags.pdf',compact('redflag','avaliation','avaliationOwtner' ));

        return $pdf->setPaper('a4')->stream('redflag.pdf');

    }

    public function gera_pdf_shoulder($id) {

        $shoulder = Shoulder::findOrFail($id);

        $data = Shoulder::join('dynamops','dynamops.id','=','shoulders.dynamop_id')
                ->join('avaliations','avaliations.id','=','dynamops.avaliation_id')
                ->join('users','users.id','=','avaliations.user_id')
                ->where('shoulders.id', $id)
                ->get(); 


                $pdf = PDF::loadView('shoulders.pdf',compact('data' ));

                        
        return $pdf->setPaper('a4')->stream('shoulder.pdf');

    }

    public function gera_pdf_prontuary($id){

        $prontuary = Prontuary::findOrFail($id);

        //funcao busca a consulta pelo id do prontuário
        $consult = Consult::where('id', $prontuary['consult_id'])->first()->toArray();

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $consult['avaliation_id'])->first()->toArray();
    
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        $pdf = PDF::loadView('prontuaries.pdf',compact('prontuary','consult','avaliation','avaliationOwtner'));

        return $pdf->setPaper('a4')->stream('prontuary.pdf');
    }

    public function gera_pdf_dynamop($id){

        $dynamop = Dynamop::findOrFail($id);

        $shoulder = Shoulder::where('dynamop_id', $id)->first();
        $hip_Knee = Hip_Knee::where('dynamop_id', $id)->first();
        $elbow_fist = Elbow_Fist::where('dynamop_id', $id)->first();
        $ankle = Ankle::where('dynamop_id', $id)->first();

        if ($shoulder) {
            $shoulder = $shoulder->toArray();
        }

        if ($hip_Knee) {
            $hip_Knee = $hip_Knee->toArray();
        }
        if ($elbow_fist) {
            $elbow_fist = $elbow_fist->toArray();
        }
        if ($ankle) {
            $ankle = $ankle->toArray();
        }

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $dynamop['avaliation_id'])->first()->toArray();
    
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();


        $pdf = PDF::loadView('dynamop.pdf',compact('shoulder','hip_Knee','elbow_fist','ankle','avaliation','avaliationOwtner'));

        return $pdf->setPaper('a4')->stream('dynamop.pdf');
        
    }  
}
