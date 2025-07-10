<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Professeurs;
use App\Models\Module;
use App\Models\Filliere;

use Illuminate\Http\Request;

class ClassesController extends Controller
{   
    
    public function getfill(){
        $fillier = Filliere::all();
        $proff = Professeurs::all();
        $mod = Module::all();

        $data = ['Js' =>'Classe'];
        return view('/tables/classe',$data,compact('fillier','proff','mod'));
    }
    

    public function getClasses(Request $request) {
        
        $query = Classes::get();
        $total = $query->count();
        $classes = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($classes as $classe) {
            $fillier = Filliere::where('id','=',$classe->id_filliere)->first('name');
            $row = array();
            $row[]=$classe->id;
            $row[]=$classe->classe;
            $row[]=$fillier->name;
            if ($classe->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($classe->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
            }elseif ($classe->niveau == '3'){
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
    
    public function getclasse(Request $request){
        $id = $request->input('id');
        
        $data = Classes::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function editclasse(Request $request){    
        $request->validate([
                'classemodif'=>'required',
                'idfilmodif'=>'required',
                'idprofmodif'=>'required',
                'idmodmodif'=>'required',
                'nbetumodif'=>'required',
                'descmodif'=>'required',
            ]);
        $id = $request->input('id');
        $classe = $request->input('classemodif');
        $filliere =$request->input('idfilmodif');
        $prof = $request->input('idprofmodif');
        $module = $request->input('idmodmodif');
        $nbetudiant =$request->input('nbetumodif');
        $desc =$request->input('descmodif');
        
        Classes::where('id','=',$id)->update([
            'classe' => $classe,
            'desc'=>$desc,
            'id_filliere'=>$filliere,
            'id_prof' => $prof,
            'id_module' => $module,
            'nbetudiant'=>$nbetudiant,
            
        ]);
     }


     public function addclasse(Request $request){    
        $request->validate([
            'classeadd'=>'required',
            'idfiladd'=>'required',
            'idprofadd'=>'required',
            'idmodadd'=>'required',
            'nbetuadd'=>'required',
            'descadd'=>'required',
            ]);
        $id = $request->input('id');
        $classe = $request->input('classeadd');
        $filliere =$request->input('idfiladd');
        $prof = $request->input('idprofadd');
        $module = $request->input('idmodadd');
        $nbetudiant =$request->input('nbetuadd');
        $desc =$request->input('descadd');
        
        Classes::where('id','=',$id)->insert([
            'classe' => $classe,
            'desc'=>$desc,
            'id_filliere'=>$filliere,
            'id_prof' => $prof,
            'id_module' => $module,
            'nbetudiant'=>$nbetudiant,
        ]);
     }

    
        public function index(){
            $data = Classes::select(['id', 'nom']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
    $classe = Classes::find($id);
    $classe->delete();
    return response()->json(['success' => true]);
}
}
