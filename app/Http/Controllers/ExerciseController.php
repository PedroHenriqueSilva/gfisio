<?php

namespace App\Http\Controllers;
use App\Models\Exercise;
use App\Http\Requests\StoreUpdateExercise;
use Illuminate\Http\Request;
use File;

class ExerciseController extends Controller
{
    public function index(){

        $exercises = Exercise::paginate(5);

        return view('exercises',  ['exercise'=>$exercises]);
    }


    public function create(){

        return view('exercises.create');
    }

    public function store(StoreUpdateExercise $request){

        $exercises = new Exercise;

        $exercises->exercise_name = $request->exercise_name;
        $exercises->exercise_description = $request->exercise_description;
        $exercises->exercise_specialty = $request->exercise_specialty;
        $exercises->exercise_body_area = $request->exercise_body_area;
        $exercises->exercise_objective = $request->exercise_objective;
        $exercises->exercise_equipment = $request->exercise_equipment;
        

        // Video Upload 
        if($request->hasFile('exercise_video') && $request->file('exercise_video')->isValid()) {

            $requestVideo = $request->exercise_video;
    
            $extension = $requestVideo->extension();
    
            $videoName = md5($requestVideo->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestVideo->move(public_path('videos/exercise_video'), $videoName);
    
            $exercises->exercise_video = $videoName;

        }

    
        $exercises->save();
        
        return redirect()
            ->route('exercises')
            ->with('msg', 'Exercício cadastrado com sucesso!');
    }

    public function edit($id){

        $exercises = Exercise::findOrFail($id);

       return view('exercises.edit',['exercise' => $exercises]) ;
    }

    public function update(StoreUpdateExercise $request, $id){

        $data = $request->all();

        if (!$exercise = Exercise::find($id)) {
            return redirect()->back();
        }

      
          // Video Upload 
        if($request->hasFile('exercise_video') && $request->file('exercise_video')->isValid()) {

            File::delete('videos/exercise_video/'. $exercise->exercise_video);  

            $requestVideo = $request->exercise_video;
    
            $extension = $requestVideo->extension();
    
            $videoName = md5($requestVideo->getClientOriginalName() . strtotime("now")) . "." . $extension;
    
            $requestVideo->move(public_path('videos/exercise_video'), $videoName);

            $data['exercise_video'] = $videoName;
    
            
        }
        $exercise->update($data);

        
        return redirect()
        ->route('exercises')
        ->with('msg', 'Exercício editado com sucesso!');

    }

    public function destroy(Request $request, $id) {
        
        $exercise = Exercise::where('id', $id)->first();
        
        $exer = Exercise::withCount('consults_exercises')->findOrFail($id);    

        if($exer->consults_exercises_count !=0)
          
            return redirect()
            ->route('exercises')
            ->with('msg', 'Exercício possui dependências, não pode ser excluído!');
        else    
            File::delete('videos/exercise_video/'. $exercise->exercise_video);

            $delete = Exercise::findOrFail($id)->delete();

            return redirect()
                ->route('exercises')
                ->with('msg', 'Exercício excluído com sucesso!');

    }   
     


}
