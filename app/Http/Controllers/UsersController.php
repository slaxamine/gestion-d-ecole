<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function getUsers(Request $request) {
        
        $query = User::get();
        $total = $query->count();
        $users = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($users as $user) {
            $row = array();
            $row[]=$user->id;
            $row[]=$user->name;
            $row[]=$user->datedebut;
            $row[]=$user->email;
            if ($user->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($user->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
    
            }elseif ($user->niveau == '3'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="etudient" style="color: red;">' ;
            }
            $data[]=$row;
        }
        $response = array(
            'data' => $data,
            'recordsFiltered' => $total,
        );
        return response()->json($response);
    }
    public function getuser(Request $request){
        $id = $request->input('id');
        
        $data = User::where('id','=',$id)->get();
        return response()->json($data);
    }
    public function edit(Request $request){
        $request->validate([
                'nommodif'=>'required',
                'emailmodif'=>'required|email',
                'prenommodif'=>'required',
                'telmodif'=>'required',
                'datenmodif'=>'required|date',
                'datedmodif'=>'required|date',
                'fonctionmodif'=>'required',
                'genremodif'=>'required',
            ]);
        $id = $request->input('id');
        $lastname = $request->input('nommodif');
        $name = $request->input('prenommodif');
        $tel = $request->input('telmodif');
        $datN = $request->input('datenmodif');
        $datedebut = $request->input('datedmodif');
        $fonction = $request->input('fonctionmodif');
        $genre = $request->input('genremodif');
        $email = $request->input('emailmodif');

        User::where('id','=',$id)->update([
            'lastname' => $lastname,
            'email' => $email,
            'name' => $name,
            'tel' => $tel,
            'datN' => $datN,
            'datedebut' => $datedebut,
            'fonction' => $fonction,
            'genre' => $genre,
        ]);
    }

    
        public function index(){
            $data = User::select(['id', 'name']);
            return Datatables::of($data)->make(true);
        }

public function destroy($id){
    User::where('id','=',$id)->delete();

    return response()->json(['success' => true]);
}

}
