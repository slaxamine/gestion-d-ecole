<?php

namespace App\Http\Controllers;
use App\Models\Professeurs;

use Illuminate\Http\Request;

class ProfesseursController extends Controller
{
    public function getProfs(Request $request) {
        
        $query = Professeurs::get();
        $total = $query->count();
        $professeurs = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($professeurs as $professeur) {
            $row = array();
            $row[]=$professeur->id;
            $row[]=$professeur->nom;
            $row[]=$professeur->groupe;
            if ($professeur->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($professeur->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
    
            }elseif ($professeur->niveau == '3'){
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
    
    public function getprof(Request $request){
        $id = $request->input('id');
        
        $data = Professeurs::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function editprof(Request $request){    
        $request->validate([
                'profmodif'=>'required',
                'groupemodif'=>'required',
            ]);
        $id = $request->input('id');
        $nom = $request->input('profmodif');
        $groupe = $request->input('groupemodif');
        
        Professeurs::where('id','=',$id)->update([
            'nom' => $nom,
            'groupe' => $groupe,
        ]);
     }


     public function addprof(Request $request){    
        $request->validate([
                'profadd'=>'required',
                'groupeadd'=>'required',
            ]);
        $id = $request->input('id');
        $nom = $request->input('profadd');
        $groupe = $request->input('groupeadd');
        
        Professeurs::where('id','=',$id)->insert([
            'nom' => $nom,
            'groupe' => $groupe,
        ]);
     }

    
        public function index(){
            $data = Professeurs::select(['id', 'nom']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
        $professeur = Professeurs::find($id);
        $professeur->delete();
        return response()->json(['success' => true]);
}}

