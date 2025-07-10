<link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
@include('/partial/header')
<div class="row mb-2">
  <div class="col">
      <h4 class="card-title">Liste des classes</h4>
  </div>
  <div class="col-auto ">
    
      <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light pull-right" id="AddnewBtn" onclick="add()"><i class="bx bx-folder-plus  font-size-16 align-middle me-2"></i> Ajouter Classe</button>
      
  </div>
</div>  
<div class="modal fade" id="classeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="/editclasse" method="post" id='edit_classe'>
                @csrf
                    <div id="exampleModal" class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-firstname-input">classe</label>
                                <input type="text" class="form-control" id="classemodif"name="classemodif">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">Filliere</label>
                                {{-- <input type="text" class="form-control" id="idfilmodif" name="idfilmodif"> --}}
                                <select class='form-control' name="idfilmodif" id="idfilmodif">
                                    <option>choisi la filliere</option>
                                    @foreach ($fillier as $fi)
                                        <option value="{{$fi->id}}">{{$fi->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-firstname-input">prof</label>
                                {{-- <input type="text" class="form-control" id="idprofmodif"name="idprofmodif"> --}}
                                <select class='form-control' name="idprofmodif" id="idprofmodif">
                                    <option >choisi le prof</option>
                                        @foreach ($proff as $pro)
                                            <option value="{{$pro->id}}">{{$pro->nom}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">module</label>
                                {{-- <input type="text" class="form-control" id="idmodmodif" name="idmodmodif"> --}}
                                <select class='form-control' name="idmodmodif" id="idmodmodif">
                                    <option id="c" selecte>choisi le module</option>
                                    @foreach ($mod as $mo)
                                        <option value="{{$mo->id}}">{{$mo->nom}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">nombre des étudiants</label>
                                <input type="number" class="form-control" id="nbetumodif" name="nbetumodif">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">desc</label>
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
                  <div class="modal fade" id="ajoutClasse" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajoutModalLabel">Ajouter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  action="/addclasse" method="post" id='add_classe'>
                                @csrf
                                <div id="exampleModal" class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">classe</label>
                                            <input type="text" class="form-control" id="classeadd"name="classeadd" placeholder="entrez le nom du classe">
                                            <input type="hidden" name="id" id="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">Filliere</label>
                                            {{-- <input type="text" class="form-control" id="idfiladd" name="idfiladd"> --}}
                                            <select class='form-control' name="idfiladd" id="idfiladd">
                                                <option id="a" selected>choisi la filliere</option>
                                                @foreach ($fillier as $fi)
                                                    <option value="{{$fi->id}}">{{$fi->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">prof</label>
                                            {{-- <input type="text" class="form-control" id="idprofadd"name="idprofadd"> --}}
                                            <select class='form-control' id="idprofadd"name="idprofadd">
                                                <option id="b" selected>choisi le prof</option>
                                                @foreach ($proff as $pro)
                                                    <option value="{{$pro->id}}">{{$pro->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">module</label>
                                            {{-- <input type="text" class="form-control" id="idmodadd" name="idmodadd"> --}}
                                            <select class='form-control' id="idmodadd" name="idmodadd">
                                                <option id="c" selected>choisi le module</option>
                                                @foreach ($mod as $mo)
                                                    <option value="{{$mo->id}}">{{$mo->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">nombre des étudiants</label>
                                            <input type="number" class="form-control" id="nbetuadd" name="nbetuadd" placeholder="entrez le nombre des étudiants">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">description</label>
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
                    <table id="classe_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">classe</th>
                            <th scope="col">Filliere</th>
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
  