<link href="/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
@include('/partial/header')

<div class="row mb-2">
  <div class="col">
      <h2>Liste Users</h2>
  </div>
  <div class="col-auto ">
    
      {{-- <button type="button" class="btn btn-outline-info btn-sm waves-effect waves-light pull-right" id="AddnewBtn" onclick="add()"><i class="bx bx-folder-plus  font-size-16 align-middle me-2"></i> Ajouter un d'utilisateurs</button> --}}
      
  </div>
</div>  
               
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <table id="User_table" class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">name</th>
                            <th scope="col">date debut</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>  
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

                    
                      
                            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModal">Modification</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form  action="edit" method="POST" id='edit_user'>
                          @csrf        
                          <div class="row">                    
                                  
                                    <div class="col col-lg-6">
                                        <div class="mb-3">
                                            <label for="basicpill-lastname-input" style="font-size: 18px">nom</label>
                                            <input type="text" class="form-control" id="nommodif"  name="nommodif">
                                        </div>
                                    </div>
                                    <div class=" col col-lg-6">
                                      <div class="mb-3">
                                          <label for="basicpill-firstname-input" style="font-size: 18px">prenom</label>
                                          <input type="text" class="form-control" id="prenommodif"  name="prenommodif">
                                          <input type="hidden" name="id" id="id">
                                      </div>
                                  </div>
                                   
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input" style="font-size: 18px">telephone</label>
                                        <input type="number" class="form-control" id="telmodif"  name="telmodif">
                                    </div>
                                </div>  
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input" style="font-size: 18px">email</label>
                                        <input type="email" class="form-control" id="emailmodif"  name="emailmodif">
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input" style="font-size: 18px">date naissance</label>
                                        <input type="date" class="form-control" id="datenmodif"  name="datenmodif">
                                    </div>
                                </div>  
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <p style="font-size: 18px">genre</p>
                                        <input type="radio" class="form-check-input m-2" id="malemodif"  name="genremodif">
                                        <label for="malemodif" style="font-size: 18px">male</label>
                                        <input type="radio" class="form-check-input m-2" id="femalemodif"  name="genremodif">
                                        <label for="femalemodif" style="font-size: 18px">female</label>
                                    </div>
                                </div>  
                            </div>
                            <div class="row">
                                  <div class="col-12 col-lg-6">
                                      <div class="mb-3">
                                          <label for="basicpill-lastname-input" style="font-size: 18px">fonction</label> <br>
                                          <select name="fonctionmodif" id="fonctionmodif" class="form-select" >
                                            <option value="" selected disabled hidden >Choisir ici</option>
                                            <option id="administrateur" value="administrateur">administrateur</option>
                                            <option id="secretaire" value="secretaire">secretaire</option>
                                            <option id="prof" value="prof">professeur</option>
                                            <option id="etudiant" value="etudiant">etudiant</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="basicpill-lastname-input" style="font-size: 18px">date debut</label>
                                        <input type="date" class="form-control" id="datedmodif"  name="datedmodif">
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

@include('/partial/footer')
  