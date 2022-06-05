<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateSubjective;
use App\Models\Subjective;
use App\Models\Avaliation;
use App\Models\User;
use File;

class SubjectiveController extends Controller
{
    
    public function store(StoreUpdateSubjective $request, $id) {

        $subjectives = new Subjective;
        
         // Image Upload
         if($request->hasFile('subjective_img') && $request->file('subjective_img')->isValid()) {

            $requestImage = $request->subjective_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/subjective'), $imageName);
    
            $subjectives->subjective_img = $imageName;

        }

        $subjectives->subjective_scale = $request->subjective_scale;
        $subjectives->subjective_characteristic = $request->subjective_characteristic;
        $subjectives->subjective_spatial_location = $request->subjective_spatial_location;
        $subjectives->subjective_description = $request->subjective_description;

        $subjectives->avaliation_id = $id;
        $subjectives->save();
        
        return redirect()
        ->route('avaliations.info', $id)
        ->with('msg', 'Avaliação Subjetiva cadastrada com sucesso!');

    }

    public function show($id) {
        
        $subjective = Subjective::findOrFail($id);

        $data = $subjective['avaliation_id'];

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $data)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('subjectives.show', ['subjective' => $subjective,  'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function edit($id) {
        
        $subjective = Subjective::findOrFail($id);

       
        $avaliation = Avaliation::where('id', $subjective['avaliation_id'])->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('subjectives.edit', ['subjective' => $subjective, 'avaliation' => $avaliation, 'avaliationOwtner'=>$avaliationOwtner]);
  
    }

    public function update(StoreUpdateSubjective $request, $id){

        $data = $request->all();

        if (!$subjective = Subjective::find($id)) {
            return redirect()->back();
        }

        // Image Upload
        if($request->hasFile('subjective_img') && $request->file('subjective_img')->isValid()) {

            File::delete('img/subjective/'. $subjective->subjective_img);  
            
                           

            $requestImage = $request->subjective_img;
    
            $extension = $requestImage->extension();
    
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestImage->move(public_path('img/subjective'), $imageName);
    
            $data['subjective_img'] = $imageName;

        }

        $subjective->update($data);

        
        return redirect()
        ->route('subjective.show', $id)
        ->with('msg', 'Avaliação Subjetiva editada com sucesso!');
    }



    public function destroy(Request $request, $id) {
        
        //busca id do questionário pelo id bpcs_questionário
        $subjective = Subjective::where('id', $id)->first();

        if ( !$subjective = Subjective::find($id) )
            return redirect()->back();
        
      
        File::delete('img/subjective/'. $subjective->subjective_img); 

        $delete = Subjective::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('avaliations.info', $subjective['avaliation_id'])
                ->with('msg', 'Avaliação Subjetiva excluída com sucesso!');
        else    
            return redirect()
                ->route('avaliations.info', $questionnaire['questionnaire_id'])
                ->with('msg', 'Erro ao excluir ao excluir avaliação subjetiva');

    }
}
 