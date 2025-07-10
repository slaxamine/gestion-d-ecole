<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Content de te revoir !</h5>
                                        <p>Connectez-vous</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                       
                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('login.post') }}" method="post">
                               

                                    <div class="mb-3">
                                        <label  class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Entrez votre adresse email" name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Mot de passe</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Entrez votre mote de passe"
                                                aria-label="Password" aria-describedby="password-addon" name="password">
                                       
                                        </div>
                                    </div>
                                    @if($errors->any())
                                        <div class="bg-danger p-2 m-2" style="border-radius:10px;">
                                            <center><h5>{{$errors->first()}}</h5></center>
                                        </div>
                                    @endif
                                    @if (!empty($success))
                                        <h1 class="bg-success p-2 m-2" style="border-radius:10px;">{{$success}}</h1>
                                    @endif
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                         Se souvenir de moi
                                        </label>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Connexion</button>
                                    </div>

                                     
                                        <div class="mt-3 d-grid text-center">
                                            <a href="/register" class="text-muted">
                                                Pas encore membre
                                            </a>
                                        </div>
                                    

                                    <div class="mt-4 text-center">
                                        <a href="auth-recoverpw.html" class="text-muted"><i
                                            class="mdi mdi-lock me-1"></i>Mot de passe oublié?
                                        </a>
                                    </div>
                                        
                                </form>
                               
                                    
                                
                            </div>

                        </div>
                    </div>
              

                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="libs/jquery/jquery.min.js"></script>
    <script src="libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="ibs/metismenu/metisMenu.min.js"></script>
    <script src="libs/simplebar/simplebar.min.js"></script>
    <script src="libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="js/app.js"></script>
</body>

</html>