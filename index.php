<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | E-Pressing</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/images/log-expert.PNG" />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/libs/css/style1.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 80px;
        padding-bottom: 40px;
    }
    body{
        background-image: url(assets/images/pressing-experts.JPG);
        background-attachment:fixed;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="#">
                    <img class="logo-img" src="assets/images/e-pressing.PNG" width="100" alt="logo">
                </a>
                
            </div>

            <div class="card-body">
            <form method="POST" action="server_login.php">
                <div class="mb-3" align="center">
                     <h3><strong>AUTHENTIFICATION</strong></h3>
                </div>

                <div class="mb-3">
                    <label for="username">Identifiant</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><em class="fas fa-f fa-user"></em></span>
                        </div>
                        <input class="form-control form-control-lg" name="nom_prenom" type="text" required="" >
                    </div>
                </div>

                <div class="mb-3">
                    <label for="username">Mot de Passe</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><em class="fas fa-f fa-key"></em></span>
                        </div>
                        <input class="form-control form-control-lg" name="password" type="password" required="" >
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" name="btn_log">CONNEXION</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Vesrsion 1.1</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" title="Consulter le site web du devéloppeur" target="_blank" class="footer-link" >DAOUDA Ulrich</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({ tags: true });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300

            });
        });
    </script>
</body>
 
</html>