<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateFABQ_Questionnaire;
use App\Models\FABQ_Questionnaire;
use App\Models\Questionnaire;
use App\Models\Avaliation;
use App\Models\User;
use File;


class FABQ_QuestionnaireController extends Controller
{
    public function index($id) {
        
        $fabq_questionnaire = FABQ_Questionnaire::where('questionnaire_id', $id)->first();

        if(is_null($fabq_questionnaire)){
            $fabq_questionnaire = "false";
        }
        else{
            $fabq_questionnaire = $fabq_questionnaire->toArray();
            
        }

        //verificar questionário a que pertence o fabq_questionário//
        $questionnaire = Questionnaire::where('id',$id)->first();

        //verificar a avaliação que o questionário pertence//
        $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first();
       
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        

        return view('fabq_questionnaires.show', ['avaliationOwtner'=>$avaliationOwtner,'avaliation'=>$avaliation, 'questionnaire'=>$questionnaire, 'fabq_questionnaire'=>$fabq_questionnaire]); 

    }

    public function store(StoreUpdateFABQ_Questionnaire $request, $id){

        $fabq_questionnaire = new FABQ_Questionnaire;

        // Image Upload
        if($request->hasFile('fabq_img') && $request->file('fabq_img')->isValid()) {

            $requestImage = $request->fabq_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/fabq_questionnaire'), $imageName);
    
            $fabq_questionnaire->fabq_img = $imageName;

        }

        $fabq_questionnaire->fabq_score = $request->fabq_score;
        $fabq_questionnaire->questionnaire_id = $id;

        $fabq_questionnaire->save();

        return redirect()
        ->route('fabq_questionnaire', $id)
        ->with('msg', 'Questionário FABQ cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $fabq_questionnaire = FABQ_Questionnaire::findOrFail($id);

        //função para buscar o questionnaire 
       $questionnaire = Questionnaire::where('id', $fabq_questionnaire['questionnaire_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('fabq_questionnaires.edit', ['fabq_questionnaire' => $fabq_questionnaire,'questionnaire'=>$questionnaire,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateFABQ_Questionnaire $request, $id){

        $data = $request->all();

        if (!$fabq_questionnaire = FABQ_Questionnaire::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('fabq_img') && $request->file('fabq_img')->isValid()) {

            File::delete('img/fabq_questionnaire/'. $fabq_questionnaire->fabq_img);  
            
                           

            $requestImage = $request->fabq_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/fabq_questionnaire'), $imageName);
    
            $data['fabq_img'] = $imageName;

        }

        $fabq_questionnaire->update($data);

        
        return redirect()
        ->route('fabq_questionnaire', $fabq_questionnaire['questionnaire_id'])
        ->with('msg', 'Questionário FABQ editado com sucesso!');
    }


    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id bpcs_questionário
        $questionnaire = FABQ_Questionnaire::where('id', $id)->first();

        if ( !$fabq_questionnaire = FABQ_Questionnaire::find($id) )
            return redirect()->back();
        
      
        File::delete('img/fabq_questionnaire/'. $fabq_questionnaire->fabq_img); 

        $delete = FABQ_Questionnaire::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('fabq_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Questionário FABQ excluído com sucesso!');
        else    
            return redirect()
                ->route('fabq_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir o questionário FABQ');

    }
}
