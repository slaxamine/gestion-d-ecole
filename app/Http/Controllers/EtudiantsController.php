<?php

namespace App\Http\Controllers;
use App\Models\Etudiants;

use Illuminate\Http\Request;

class EtudiantsController extends Controller
{
    public function getEtudiants(Request $request) {
        
        $query = Etudiants::get();
        $total = $query->count();
        $etudiants = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($etudiants as $etudiant) {
            $row = array();
            $row[]=$etudiant->id;
            $row[]=$etudiant->nom;
            $row[]=$etudiant->groupe;
            if ($etudiant->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($etudiant->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
    
            }elseif ($etudiant->niveau == '3'){
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
    
    public function getetudiant(Request $request){
        $id = $request->input('id');
        
        $data = Etudiants::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function editetu(Request $request){    
        $request->validate([
                'etumodif'=>'required',
                'groupemodif'=>'required',
            ]);
        $id = $request->input('id');
        $nom = $request->input('etumodif');
        $groupe = $request->input('groupemodif');
        
        Etudiants::where('id','=',$id)->update([
            'nom' => $nom,
            'groupe' => $groupe,
        ]);
     }


     public function addEtu(Request $request){    
        $request->validate([
                'etuadd'=>'required',
                'groupeadd'=>'required',
            ]);
        $id = $request->input('id');
        $nom = $request->input('etuadd');
        $groupe = $request->input('groupeadd');
        
        Etudiants::where('id','=',$id)->insert([
            'nom' => $nom,
            'groupe' => $groupe,
        ]);
     }

    
        public function index(){
            $data = Etudiants::select(['id', 'nom']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
    $etudiant = Etudiants::find($id);
    $etudiant->delete();
    return response()->json(['success' => true]);
}

}

