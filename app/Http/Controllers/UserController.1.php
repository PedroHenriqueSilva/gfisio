<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreUpdateUser;
use App\Models\User;


class UserController extends Controller
{

    public function index() {

        $users = User::orderBy('name','asc')->paginate(5);
    
        return view('users',['users' => $users]);

    }

    public function create(){

        return view('users.create');
    }

    public function store(StoreUpdateUser $request) {

        $users = new User;

        
        
        $users->name = $request->name;
        $users->date_nasc = $request->date_nasc;
        $users->sex = $request->sex;
        $users->end = $request->end;
        $users->city = $request->city;
        $users->state = $request->state;
        $users->profission = $request->profission;
        $users->son = $request->son;
        $users->civil_status = $request->civil_status;
        $users->dominant_side = $request->dominant_side;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->password = $request->password;
        $users->role = $request->role;

        $users->save();
        
        return redirect('/users')->with('msg', 'Usuário cadastrado com sucesso!');

    }

    public function show($id) {

        
        $user = User::findOrFail($id);

        return view('users.show', ['user' => $user]);

        
    }


    public function edit($id) {

        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user]);

    }

    public function update(StoreUpdateUser $request) {

        $data = $request->all();
      

        User::findOrFail($request->id)->update($data);

        return redirect('/users')->with('msg', 'Usuário editado com sucesso!');
    }

    public function patients() {

        $users = User::where('role', 'paciente')->orderBy('name','asc')->get();
    
        return view('patients',['users' => $users]);

    }

    public function destroy(Request $request, $id) {

        $id = $request['user_id'];
        $delete = User::findOrFail($id)->delete();

        if($delete)
            return redirect()
            ->route('users')
            ->with('msg', 'Usuário excluído com sucesso!');
        else    
            return redirect()
                ->route('users')
                ->with('msg', 'Erro ao excluir o usuário');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $users = User::where('name', 'LIKE', "%{$request->search}%")
                        ->paginate();

        return view('users', compact('users', 'filters'));
    }

}


