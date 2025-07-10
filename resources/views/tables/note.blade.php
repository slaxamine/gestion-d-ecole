<link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
@include('/partial/header')
<div class="row mb-2">
  <div class="col">
      <h4 class="card-title">Liste des notes</h4>
  </div>
  <div class="col-auto ">
    
      <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light pull-right" id="AddnewBtn" onclick="add()"><i class="bx bx-folder-plus  font-size-16 align-middle me-2"></i> Ajouter une Note</button>
      
  </div>
</div>  
<div class="modal fade" id="noteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="/editnote" method="post" id='edit_note'>
                @csrf
                <div id="exampleModal" class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-firstname-input">etudiant</label>
                            <select class='form-control' name="etumodif" id="etumodif">
                                <option>choisi l'étudiant</option>
                                    @foreach ($etudiants as $etu)
                                        <option value="{{$etu->id}}">{{$etu->nom}}</option>
                                    @endforeach
                            </select>
                            <input type="hidden" name="id" id="id">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-lastname-input">module</label>
                            <select class='form-control' name="modmodif" id="modmodif">
                                <option >choisi le module</option>
                                    @foreach ($module as $mod)
                                        <option value="{{$mod->id}}">{{$mod->nom}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-firstname-input">Professeur</label>
                            <select class='form-control' name="profmodif" id="profmodif">
                                <option>choisi le prof</option>
                                    @foreach ($prof as $pr)
                                        <option value="{{$pr->id}}">{{$pr->nom}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-firstname-input">controle n1</label>
                            <input type="number" class="form-control" id="c1modif"name="c1modif" >
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-lastname-input">controle n2</label>
                            <input type="number" class="form-control" id="c2modif" name="c2modif" >
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-lastname-input">controle n3</label>
                            <input type="number" class="form-control" id="c3modif" name="c3modif" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-lastname-input">Exam</label>
                            <input type="number" class="form-control" id="exammodif" name="exammodif">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="basicpill-lastname-input">Description</label>
                            <input type="text" class="form-control" id="descmodif" name="descmodif">
                        </div>
                    </div>
                </div>
                <div class="mt-4 ">
                      <center><button type="submit" style="width: 100px; display:inline;  " class="btn btn-primary waves-effect waves-light m-2 " >Valider</button>
                              <a style="width: 100px; display:inline; " class="btn btn-secondary waves-effect waves-light m-2 " onclick="cancel()">Annuler</a>
                      </center>
                      
                    </div>
                    
                      
                  </form> 
            </div>                 
        </div>
      </div>
  </div>
                <div>
                  <div class="modal fade" id="ajoutNote" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajoutModalLabel">Ajouter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  action="/addnote" method="post" id='add_note'>
                                @csrf
                                <div id="exampleModal" class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">etudiant</label>
                                            <select class='form-control' name="etuadd" id="etuadd">
                                                <option id="a" selected>choisi l'étudiant</option>
                                                    @foreach ($etudiants as $etu)
                                                        <option value="{{$etu->id}}">{{$etu->nom}}</option>
                                                    @endforeach
                                            </select>
                                            <input type="hidden" name="id" id="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">module</label>
                                            <select class='form-control' name="modadd" id="modadd">
                                                <option id="b" selected >choisi le module</option>
                                                    @foreach ($module as $mod)
                                                        <option value="{{$mod->id}}">{{$mod->nom}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">Professeur</label>
                                            <select class='form-control' name="profadd" id="profadd">
                                                <option id="c" selected>choisi le prof</option>
                                                    @foreach ($prof as $pr)
                                                        <option value="{{$pr->id}}">{{$pr->nom}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">controle n1</label>
                                            <input type="number" class="form-control" id="c1add"name="c1add" placeholder="entrez la note du 1ér controle">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">controle n2</label>
                                            <input type="number" class="form-control" id="c2add" name="c2add" placeholder="entrez la note du 2ème controle">
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">controle n3</label>
                                            <input type="number" class="form-control" id="c3add" name="c3add" placeholder="entrez la note du 1ème controle">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Exam</label>
                                            <input type="number" class="form-control" id="examadd" name="examadd" placeholder="entrez la note de l'exam">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Description</label>
                                            <input type="text" class="form-control" id="descadd" name="descadd" placeholder="...">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 ">
                                  <center><button type="submit" style="width: 100px; display:inline;  " class="btn btn-primary waves-effect waves-light m-2 " >Valider</button>
                                          <a style="width: 100px; display:inline; " class="btn btn-secondary waves-effect waves-light m-2 " onclick="cancel2()">Annuler</a>
                                  </center>
                                </div>
                                </form> 
                            </div>                 
                        </div>
                      </div>
                  </div>
                </div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              
                <div id="User_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table id="note_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">etudiant</th>
                            <th scope="col">module</th>
                            <th scope="col">c1</th>
                            <th scope="col">c2</th>
                            <th scope="col">c3</th>
                            <th scope="col">Exam</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
                  
            

            
@include('/partial/footer')
  