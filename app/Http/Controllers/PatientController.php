<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index() {

        $patients = Patient::all();
    
        return view('patients',['patients' => $patients]);

    }

    public function create() {

        return view('patients.create');
        
    }

    public function store(Request $request) {

        $patients = new Patient;
        
        $patients->name = $request->name;
        $patients->date_nasc = $request->date_nasc;
        $patients->sex = $request->sex;
        $patients->end = $request->end;
        $patients->state = $request->state;
        $patients->city = $request->city;
        $patients->profission = $request->profission;
        $patients->civil_status = $request->civil_status;
        $patients->sons = $request->sons;
        $patients->dominant_side = $request->dominant_side;
        $patients->email = $request->email;
        $patients->phone = $request->phone;

        $patients->save();

        return redirect('/patients')->with('msg', 'Paciente cadastrado com sucesso!');

    }   

    public function show($id) {

        
        $patient = Patient::findOrFail($id);

        return view('patients.show', ['patient' => $patient]);

    }

    public function edit($id) {

        $patient = Patient::findOrFail($id);
        

        return view('patients.edit', ['patient' => $patient]);

    }

    public function update(Request $request) {

        $data = $request->all();
        

        Patient::findOrFail($request->id)->update($data);

        return redirect('/patients')->with('msg', 'Paciente editado com sucesso!');
    }
}
