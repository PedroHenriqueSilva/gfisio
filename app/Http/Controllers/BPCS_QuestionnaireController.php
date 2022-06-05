<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateBPCS_Questionnaire;
use App\Models\BPCS_Questionnaire;
use App\Models\Questionnaire;
use App\Models\Avaliation;
use App\Models\User;
use File;


class BPCS_QuestionnaireController extends Controller
{
    public function index($id) {
        
        $bpcs_questionnaire = BPCS_Questionnaire::where('questionnaire_id', $id)->first();

        if(is_null($bpcs_questionnaire)){
            $bpcs_questionnaire = "false";
        }
        else{
            $bpcs_questionnaire = $bpcs_questionnaire->toArray();
            
        }

        //verificar questionário a que pertence o csi_questionário//
        $questionnaire = Questionnaire::where('id',$id)->first();

        //verificar a avaliação que o questionário pertence//
        $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first();
       
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        

        return view('bpcs_questionnaires.show', ['avaliationOwtner'=>$avaliationOwtner,'avaliation'=>$avaliation, 'questionnaire'=>$questionnaire, 'bpcs_questionnaire'=>$bpcs_questionnaire]); 

    }

    public function store(StoreUpdateBPCS_Questionnaire $request, $id){

        $bpcs_questionnaire = new BPCS_Questionnaire;

        // Image Upload
        if($request->hasFile('bpcs_img') && $request->file('bpcs_img')->isValid()) {

            $requestImage = $request->bpcs_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/bpcs_questionnaire'), $imageName);
    
            $bpcs_questionnaire->bpcs_img = $imageName;

        }

        $bpcs_questionnaire->bpcs_score = $request->bpcs_score;
        $bpcs_questionnaire->questionnaire_id = $id;

        $bpcs_questionnaire->save();

        return redirect()
        ->route('bpcs_questionnaire', $id)
        ->with('msg', 'Questionário BPCS cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $bpcs_questionnaire = BPCS_Questionnaire::findOrFail($id);

        //função para buscar o questionnaire 
       $questionnaire = Questionnaire::where('id', $bpcs_questionnaire['questionnaire_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();


        return view('bpcs_questionnaires.edit', ['bpcs_questionnaire' => $bpcs_questionnaire,'questionnaire'=>$questionnaire,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateBPCS_Questionnaire $request, $id){

        $data = $request->all();

        if (!$bpcs_questionnaire = BPCS_Questionnaire::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('bpcs_img') && $request->file('bpcs_img')->isValid()) {

            File::delete('img/bpcs_questionnaire/'. $bpcs_questionnaire->bpcs_img);  
            
                           

            $requestImage = $request->bpcs_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/bpcs_questionnaire'), $imageName);
    
            $data['bpcs_img'] = $imageName;

        }

        $bpcs_questionnaire->update($data);

        
        return redirect()
        ->route('bpcs_questionnaire', $bpcs_questionnaire['questionnaire_id'])
        ->with('msg', 'Questionário BPCS editado com sucesso!');
    }


    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id bpcs_questionário
        $questionnaire = BPCS_Questionnaire::where('id', $id)->first();

        if ( !$bpcs_questionnaire = BPCS_Questionnaire::find($id) )
            return redirect()->back();
        
      
        File::delete('img/bpcs_questionnaire/'. $bpcs_questionnaire->bpcs_img); 

        $delete = BPCS_Questionnaire::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('bpcs_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Questionário BPCS excluído com sucesso!');
        else    
            return redirect()
                ->route('bpcs_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir o questionário BPCS');

    }
}
