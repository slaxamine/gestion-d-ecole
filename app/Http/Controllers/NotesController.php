<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Professeurs;
use App\Models\Module;
use App\Models\Etudiants;
use App\Models\Notes;


use Illuminate\Http\Request;

class NotesController extends Controller
{   
    
    public function getk(){
        $prof = Professeurs::all();
        $module = Module::all();
        $etudiants = Etudiants::all();
        $data = ['Js' =>'Notes'];
        return view('/tables/note',$data,compact('prof','module','etudiants'));
    }
    

    public function getNotes(Request $request) {
        
        $query = Notes::get();
        $total = $query->count();
        $notes = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($notes as $note) {
            //$prof = Professeurs::where('id','=',$note->id_filliere)->first('nom');
            $module = Module::where('id','=',$note->id_module)->first('nom');
            $etudiants = Etudiants::where('id','=',$note->id_etudiant)->first('nom');

            $row = array();
            $row[]=$note->id;
            $row[]=$etudiants->nom;
            $row[]=$module->nom;
            $row[]=$note->note1;
            $row[]=$note->note2;
            $row[]=$note->note3;
            $row[]=$note->exam;
            $row[]=$note->desc;
            if ($note->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($note->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
            }elseif ($note->niveau == '3'){
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
    
    public function getnote(Request $request){
        $id = $request->input('id');
        
        $data = Notes::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function editnote(Request $request){    
        $request->validate([
            'etumodif'=>'required',
            'modmodif'=>'required',
            'profmodif'=>'required',
            'c1modif'=>'required',
            'c2modif'=>'required',
            'c3modif'=>'required',
            'exammodif'=>'required',
            'descmodif'=>'required',
            ]);
        $id = $request->input('id');
        $etu = $request->input('etumodif');
        $module =$request->input('modmodif');
        $prof = $request->input('profmodif');
        $c1 = $request->input('c1modif');
        $c2 =$request->input('c2modif');
        $c3 =$request->input('c3modif');
        $exam =$request->input('exammodif');
        $desc =$request->input('descmodif');
        
        Notes::where('id','=',$id)->update([
            'id_etudiant' => $etu,
            'id_module'=>$module,
            'id_prof'=>$prof,
            'note1' => $c1,
            'note2' => $c2,
            'note3'=>$c3,
            'exam'=>$exam,
            'desc'=>$desc,
            
        ]);
     }


     public function addnote(Request $request){    
        $request->validate([
            'etuadd'=>'required',
            'modadd'=>'required',
            'profadd'=>'required',
            'c1add'=>'required',
            'c2add'=>'required',
            'c3add'=>'required',
            'examadd'=>'required',
            'descadd'=>'required',

            ]);
        $id = $request->input('id');
        $etu = $request->input('etuadd');
        $module =$request->input('modadd');
        $prof = $request->input('profadd');
        $c1 = $request->input('c1add');
        $c2 =$request->input('c2add');
        $c3 =$request->input('c3add');
        $exam =$request->input('examadd');
        $desc =$request->input('descadd');

        
        Notes::where('id','=',$id)->insert([
            'id_etudiant' => $etu,
            'id_module'=>$module,
            'id_prof'=>$prof,
            'note1' => $c1,
            'note2' => $c2,
            'note3'=>$c3,
            'exam'=>$exam,
            'desc'=>$desc,


        ]);
     }

    
        public function index(){
            $data = Notes::select(['id', 'nom']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
    $note = Notes::find($id);
    $note->delete();
    return response()->json(['success' => true]);
}
}
