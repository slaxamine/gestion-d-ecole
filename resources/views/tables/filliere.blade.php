<link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
@include('/partial/header')
<div class="row mb-2">
  <div class="col">
      <h4 class="card-title">Liste fillieres</h4>
  </div>
  <div class="col-auto ">
    
      <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light pull-right" id="AddnewBtn" onclick="add()"><i class="bx bx-folder-plus  font-size-16 align-middle me-2"></i> Ajouter une filliere</button>
      
  </div>
</div>  
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form  action="/edita" method="post" id='edit_filliere'>
                @csrf
                    <div id="exampleModal" class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-firstname-input">filliere</label>
                                <input type="text" class="form-control" id="fillieremodif"name="fillieremodif">
                                <input type="hidden" name="id" id="id">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="basicpill-lastname-input">description</label>
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
                  <div class="modal fade" id="ajoutFilliere" tabindex="-1" aria-labelledby="ajoutModalLabel" aria-hidden="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ajoutModalLabel">Ajouter</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form  action="/addFill" method="post" id='add_filliere'>
                                @csrf
                                <div id="exampleModal" class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-firstname-input">filliere</label>
                                            <input type="text" class="form-control" id="filliereadd"name="filliereadd">
                                            <input type="hidden" name="id" id="id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input">description</label>
                                            <input type="text" class="form-control" id="descadd" name="descadd">
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
                </div>
<div class="row">
  <div class="col-12">
      <div class="card">
          <div class="card-body">
              
                <div id="User_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <table id="Filliere_table" class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">filliere</th>
                            <th scope="col">description</th>
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
  