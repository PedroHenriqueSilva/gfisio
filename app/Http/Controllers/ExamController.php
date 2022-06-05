<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateExam;
use App\Models\Avaliation;
use App\Models\User;
use App\Models\Exam;
use File;

class ExamController extends Controller
{
    public function index($id) {
        
        $exam = Exam::where('avaliation_id', $id)->paginate(5);
                  
        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();
 
        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('exams.show', ['exams'=>$exam, 'avaliation'=>$avaliation, 'avaliationOwtner'=> $avaliationOwtner]); 
    }

    public function store(StoreUpdateExam $request, $id) {

        $exam = new Exam;

        $exam->name = $request->name;
        $exam->description = $request->description;
        

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

        $requestImage = $request->image;

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('img/patients'), $imageName);

        $exam->image = $imageName;

    }

        $exam->avaliation_id = $id;

        $exam->save();

        return redirect()
        ->route('avaliations.info', $id)
        ->with('msg', 'Exame cadastrado com sucesso!');

    }

    public function edit($id) {

        $exam = Exam::findOrFail($id);

        //funcao busca o usuario pelo id da avaliacao
        $avaliation = Avaliation::where('id', $id)->first()->toArray();

        //busca as informações usuário
        $avaliationOwtner = User::where('id', $avaliation['user_id'])->first()->toArray();

        return view('exams.edit', ['exam'=>$exam, 'avaliation'=>$avaliation, 'avaliationOwtner'=> $avaliationOwtner]); 

    }

    public function update(StoreUpdateExam $request, $id) {

        $data = $request->all();

        if (!$exam = Exam::find($id)) {
            return redirect()->back();
        }


        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            File::delete('img/patients/'. $exam->image);  

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/patients'), $imageName);

            $data['image'] = $imageName;

        }

        Exam::findOrFail($request->id)->update($data);
 
        //verificar o id da avaliação que esse exame pertence
        $data = Exam::where('id', $request->id)->first()->toArray();

        $id = $data['avaliation_id'];

        return redirect()
            ->route('exams', $id)
            ->with('msg', 'Exame editado com sucesso!');
    }


    public function destroy(Request $request, $id) {
        
        //busca id da avaliação pelo id avaliação geral
        $avaliation = Exam::where('id', $id)->first();


        if (!$exam = Exam::find($id)) {
            return redirect()->back();
        }

        File::delete('img/patients/'. $exam->image);  

        $delete = Exam::findOrFail($id)->delete();

       
        if($delete)
            return redirect()
                ->route('exams', $avaliation['avaliation_id'])
                ->with('msg', 'Exame excluído com sucesso!');
        else    
            return redirect()
                ->route('exams', $aval['user_id'])
                ->with('msg', 'Erro ao excluir exame');

    }

}
