<link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
@include('/partial/header')
<div class="row mb-2">
  <div class="col">
      <h4 class="card-title">Liste des professeurs</h4>
  </div>
  <div class="col-auto ">
    
      <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light pull-right" id="AddnewBtn" onclick="add()"><i class="bx bx-folder-plus  font-size-16 align-middle me-2"></i> Ajouter un prof</button>
      
  </div>
</div>  
<div class="modal fade" id="ProfModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="/editprof" method="post" id='edit_prof'>
                @csrf
                    <div id="exampleModal" class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-firstname-input">prof</label>
                                <input type="text" class="form-control" id="profmodif"name="profmodif">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">groupe</label>
                                <input type="text" class="form-control" id="groupemodif" name="groupemodif">
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
                  <div class="modal fade" id="ajoutProf" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajoutModalLabel">Ajouter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  action="/addprof" method="post" id='add_prof'>
                                @csrf
                                <div id="exampleModal" class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">prof</label>
                                            <input type="text" class="form-control" id="profadd"name="profadd">
                                            <input type="hidden" name="id" id="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">groupe</label>
                                            <input type="text" class="form-control" id="groupeadd" name="groupeadd">
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
                    <table id="Prof_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">prof</th>
                            <th scope="col">groupe</th>
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
  