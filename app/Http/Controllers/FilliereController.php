<?php

namespace App\Http\Controllers;
use App\Models\Filliere;
use Illuminate\Http\Request;

class FilliereController extends Controller
{
    
    public function getFillieres(Request $request) {
        
        $query = Filliere::get();
        $total = $query->count();
        $fillieres = $query->skip($request->input('start'))->take($request->input('length'));
        $data = array();
        foreach ($fillieres as $filliere) {
            $row = array();
            $row[]=$filliere->id;
            $row[]=$filliere->name;
            $row[]=$filliere->desc;
            if ($filliere->niveau == '1'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Admin" style="color: blue;">' ;
            }elseif ($filliere->niveau == '2'){
                $row[]= '<i class="mdi mdi-18px mdi-account" title="Prof" style="color: yellow;">' ;
    
            }elseif ($filliere->niveau == '3'){
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
    public function getfilliere(Request $request){
        $id = $request->input('id');
        
        $data = Filliere::where('id','=',$id)->get();
        return response()->json($data);
    }

    public function edita(Request $request){    
        $request->validate([
                'fillieremodif'=>'required',
                'descmodif'=>'required',
            ]);
        $id = $request->input('id');
        $name = $request->input('fillieremodif');
        $desc = $request->input('descmodif');
        
        Filliere::where('id','=',$id)->update([
            'name' => $name,
            'desc' => $desc,
        ]);
     }


     public function addFill(Request $request){    
        $request->validate([
                'filliereadd'=>'required',
                'descadd'=>'required',
            ]);
        $id = $request->input('id');
        $name = $request->input('filliereadd');
        $desc = $request->input('descadd');
        
        Filliere::where('id','=',$id)->insert([
            'name' => $name,
            'desc' => $desc,
        ]);
     }

    
        public function index(){
            $data = Filliere::select(['id', 'name']);
            return Datatables::of($data)->make(true);
        }

    public function destroy($id){
    $filliere = Filliere::find($id);
    $filliere->delete();
    return response()->json(['success' => true]);
}

}
