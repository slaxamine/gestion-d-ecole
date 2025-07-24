<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\FilliereController;
use App\Http\Controllers\EtudiantsController;
use App\Http\Controllers\ProfesseursController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DataTablesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Crypt;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-register', [AuthController::class, 'postRegistration'])->name('register.post');  

Route::post('/get_fillieres', [FilliereController::class, 'getFillieres']);
Route::post('/get_filliere', [FilliereController::class, 'getFilliere']);

Route::post('/get_users', [UsersController::class, 'getUsers']);
Route::post('/get_user', [UsersController::class, 'getuser']);

Route::post('/get_etudiants', [EtudiantsController::class, 'getEtudiants']);
Route::post('/get_etudiant', [EtudiantsController::class, 'getEtudiant']);

Route::post('/get_profs', [ProfesseursController::class, 'getProfs']);
Route::post('/get_prof', [ProfesseursController::class, 'getProf']);

Route::post('/get_modules', [ModuleController::class, 'getModules']);
Route::post('/get_module', [ModuleController::class, 'getModule']);

Route::post('/get_classes', [ClassesController::class, 'getClasses']);
Route::post('/get_classe', [ClassesController::class, 'getClasse']);

Route::post('/get_notes', [NotesController::class, 'getNotes']);
Route::post('/get_note', [NotesController::class, 'getNote']);

Route::delete('/users/{id}',[UsersController::class,'destroy']);
Route::delete('/fillieres/{id}',[FilliereController::class,'destroy']);
Route::delete('/etudiants/{id}',[EtudiantsController::class,'destroy']);
Route::delete('/profs/{id}',[ProfesseursController::class,'destroy']);
Route::delete('/modules/{id}',[ModuleController::class,'destroy']);
Route::delete('/classes/{id}',[ClassesController::class,'destroy']);
Route::delete('/notes/{id}',[NotesController::class,'destroy']);



Route::post('/edit',[UsersController::class,'edit']);
Route::post('/edita',[FilliereController::class,'edita']);
Route::post('/editetu',[EtudiantsController::class,'editetu']);
Route::post('/editprof',[ProfesseursController::class,'editprof']);
Route::post('/editmodule',[ModuleController::class,'editmodule']);
Route::post('/editclasse',[ClassesController::class,'editclasse']);
Route::post('/editnote',[NotesController::class,'editnote']);



Route::post('/addFill',[FilliereController::class,'addFill']);
Route::post('/addEtu',[EtudiantsController::class,'addEtu']);
Route::post('/addprof',[ProfesseursController::class,'addprof']);
Route::post('/addmodule',[ModuleController::class,'addmodule']);
Route::post('/addclasse',[ClassesController::class,'addclasse']);
Route::post('/addnote',[NotesController::class,'addnote']);

Route::get('/classe',[ClassesController::class,'getfill']);

Route::get('/note',[NotesController::class,'getk']);



Route::get('/contact',function(){
	return view('/tables/contact');
});

Route::get('/module',function(){
	$data = ['Js' =>'Module'];
	return view('tables.module',$data);
});

// Route::get('/note',function(){
// 	$data = ['Js' =>'Notes'];
// 	return view('tables.note',$data);
// });

// Route::get('/classe',function(){
// 	$data = ['Js' =>'Classe'];
// 	return view('tables.classe',$data);
// });



Route::get('/filliere',function(){
	$data = ['Js' =>'Filliere'];
	return view('tables.filliere',$data);
});
Route::get('/etudiant',function(){
	$data = ['Js' =>'Etudiants'];
	return view('tables.etudiant',$data);
});
Route::get('/prof',function(){
	$data = ['Js' =>'Prof'];
	return view('tables.prof',$data);
});
 Route::get('/register',function(){
	return view('register');
});
Route::get('/login',function(){
	return view('login');
});

Route::get('/users',function(){
	$data = ['Js' =>'Users'];
	return view('tables.users',$data);
});