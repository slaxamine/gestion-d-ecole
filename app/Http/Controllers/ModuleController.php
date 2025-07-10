<?php

namespace App\Http\Controllers;
use App\Models\Module;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function getModules(Request $request) {
        
        $query = Module::get();
        $total = $query->count();
        $modules = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($modules as $module) {
            $row = array();
            $row[]=$module->id;
            $row[]=$module->nom;
            $row[]=$module->desc;
            $row[]=$module->coef;
            $row[]=$module->nbheure;
            if ($module->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($module->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
    
            }elseif ($module->niveau == '3'){
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
    
    public function getmodule(Request $request){
        $id = $request->input('id');
        
        $data = Module::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function editmodule(Request $request){    
        $request->validate([
                'modmodif'=>'required',
                'descmodif'=>'required',
                'coefmodif'=>'required',
                'nbmodif'=>'required',
            ]);
        $id = $request->input('id');
        $nom = $request->input('modmodif');
        $desc = $request->input('descmodif');
        $coef = $request->input('coefmodif');
        $nbheure = $request->input('nbmodif');
        Module::where('id','=',$id)->update([
            'nom' => $nom,
            'desc' => $desc,
            'coef' => $coef,
            'nbheure' => $nbheure,

        ]);
     }


     public function addModule(Request $request){    
        $request->validate([
                'modadd'=>'required',
                'descadd'=>'required',
                'coefadd'=>'required',
                'nbadd'=>'required',
            ]);
            $id = $request->input('id');
            $nom = $request->input('modadd');
            $desc = $request->input('descadd');
            $coef = $request->input('coefadd');
            $nbheure = $request->input('nbadd');
        
        Module::where('id','=',$id)->insert([
            'nom' => $nom,
            'desc' => $desc,
            'coef' => $coef,
            'nbheure' => $nbheure,
        ]);
     }

    
        public function index(){
            $data = Module::select(['id', 'nom']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
    $module = Module::find($id);
    $module->delete();
    return response()->json(['success' => true]);
}

}


