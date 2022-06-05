<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUpdateETC_Questionnaire;
use App\Models\ETC_Questionnaire;
use App\Models\Questionnaire;
use App\Models\Avaliation;
use App\Models\User;
use File;


class ETC_QuestionnaireController extends Controller
{
    public function index($id) {
        
        $etc_questionnaire = ETC_Questionnaire::where('questionnaire_id', $id)->first();

        if(is_null($etc_questionnaire)){
            $etc_questionnaire = "false";
        }
        else{
            $etc_questionnaire = $etc_questionnaire->toArray();
            
        }

        //verificar questionário a que pertence o fabq_questionário//
        $questionnaire = Questionnaire::where('id',$id)->first();

        //verificar a avaliação que o questionário pertence//
        $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first();
       
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();
        

        return view('etc_questionnaires.show', ['avaliationOwtner'=>$avaliationOwtner,'avaliation'=>$avaliation, 'questionnaire'=>$questionnaire, 'etc_questionnaire'=>$etc_questionnaire]); 

    }

    public function store(StoreUpdateETC_Questionnaire $request, $id){

        $etc_questionnaire = new ETC_Questionnaire;

        // Image Upload
        if($request->hasFile('etc_img') && $request->file('etc_img')->isValid()) {

            $requestImage = $request->etc_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/etc_questionnaire'), $imageName);
    
            $etc_questionnaire->etc_img = $imageName;

        }

        $etc_questionnaire->etc_score = $request->etc_score;
        $etc_questionnaire->questionnaire_id = $id;

        $etc_questionnaire->save();

        return redirect()
        ->route('etc_questionnaire', $id)
        ->with('msg', 'Questionário ETC cadastrado com sucesso!');
    }

    public function edit($id) {
        
        $etc_questionnaire = ETC_Questionnaire::findOrFail($id);

        //função para buscar o questionnaire 
       $questionnaire = Questionnaire::where('id', $etc_questionnaire['questionnaire_id'])->first()->toArray();

       //funcao busca o usuario pelo id da avaliacao
       $avaliation = Avaliation::where('id', $questionnaire['avaliation_id'])->first()->toArray();

       //busca as informações usuário
       $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('etc_questionnaires.edit', ['etc_questionnaire' => $etc_questionnaire,'questionnaire'=>$questionnaire,'avaliation'=>$avaliation,'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateETC_Questionnaire $request, $id){

        $data = $request->all();

        if (!$etc_questionnaire = ETC_Questionnaire::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('etc_img') && $request->file('etc_img')->isValid()) {

            File::delete('img/etc_questionnaire/'. $etc_questionnaire->etc_img);  
            
                           

            $requestImage = $request->etc_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/etc_questionnaire'), $imageName);
    
            $data['etc_img'] = $imageName;

        }

        $etc_questionnaire->update($data);

        
        return redirect()
        ->route('etc_questionnaire', $etc_questionnaire['questionnaire_id'])
        ->with('msg', 'Questionário ETC editado com sucesso!');
    }


    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id bpcs_questionário
        $questionnaire = ETC_Questionnaire::where('id', $id)->first();

        if ( !$etc_questionnaire = ETC_Questionnaire::find($id) )
            return redirect()->back();
        
      
        File::delete('img/etc_questionnaire/'. $etc_questionnaire->etc_img); 

        $delete = ETC_Questionnaire::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('etc_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Questionário ETC excluído com sucesso!');
        else    
            return redirect()
                ->route('etc_questionnaire', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir o questionário ETC');

    }
}
