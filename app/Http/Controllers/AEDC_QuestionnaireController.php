<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateAEDC_Questionnaire;
use App\Models\AEDC_Questionnaire;
use App\Models\Questionnaire;
use App\Models\Avaliation;
use App\Models\User;
use File;


class AEDC_QuestionnaireController extends Controller
{
    public function index($id) {
        
        $aedc_questionnaire = AEDC_Questionnaire::where('questionnaire_id', $id)->first();

        if(is_null($aedc_questionnaire)){
            $aedc_questionnaire = "false";
        }
        else{
            $aedc_questionnaire = $aedc_questionnaire->toArray();
            
        }

        //verificar questionário a que pertence o csi_questionário//
        $questionnaire = Questionnaire::where('id',$id)->first();

        //verificar a avaliação que o questionário pertence//
        $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first();
       
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        

        return view('adecs_questionnaire.show', ['avaliationOwtner'=>$avaliationOwtner,'avaliation'=>$avaliation, 'questionnaire'=>$questionnaire, 'aedc_questionnaire'=>$aedc_questionnaire]); 
    }

    public function store(StoreUpdateAEDC_Questionnaire $request, $id){

        $aedc_questionnaire = new AEDC_Questionnaire;

        // Image Upload
        if($request->hasFile('aedc_img') && $request->file('aedc_img')->isValid()) {

            $requestImage = $request->aedc_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/aedc_questionnaire'), $imageName);
    
            $aedc_questionnaire->aedc_img = $imageName;

        }

        $aedc_questionnaire->aedc_score = $request->aedc_score;
        $aedc_questionnaire->questionnaire_id = $id;

        $aedc_questionnaire->save();

        return redirect()
        ->route('aedc_questionnaire', $id)
        ->with('msg', 'Questionário AEDC cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $aedc_questionnaire = AEDC_Questionnaire::findOrFail($id);

         //função para buscar o questionnaire 
       $questionnaire = Questionnaire::where('id', $aedc_questionnaire['questionnaire_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();


        return view('adecs_questionnaire.edit', ['aedc_questionnaire' => $aedc_questionnaire,'questionnaire'=>$questionnaire,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateAEDC_Questionnaire $request, $id){

        $data = $request->all();

        if (!$aedc_questionnaire = AEDC_Questionnaire::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('aedc_img') && $request->file('aedc_img')->isValid()) {

            File::delete('img/aedc_questionnaire/'. $aedc_questionnaire->aedc_img);  
       
            $requestImage = $request->aedc_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/aedc_questionnaire'), $imageName);
    
            $data['aedc_img'] = $imageName;

        }

        $aedc_questionnaire->update($data);

        
        return redirect()
        ->route('aedc_questionnaire', $aedc_questionnaire['questionnaire_id'])
        ->with('msg', 'Questionário AEDC editado com sucesso!');
    }

    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id aedc_questionário
        $questionnaire = AEDC_Questionnaire::where('id', $id)->first();

        if ( !$aedc_questionnaire = AEDC_Questionnaire::find($id) )
            return redirect()->back();
        
      
        File::delete('img/aedc_questionnaire/'. $aedc_questionnaire->aedc_img); 

        $delete = AEDC_Questionnaire::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('aedc_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Questionário AEDC excluído com sucesso!');
        else    
            return redirect()
                ->route('aedc_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir o questionário AEDC');

    }
}
