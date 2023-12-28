<?php 
    include('server_user.php')
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
    <title>Pressing-Experts</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar & left sidebar -->
        <!-- ============================================================== -->

        <?php include('header_menu_ad.php') ?>
        
        <!-- ============================================================== -->
        <!-- Fin navbar & left sidebar -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- corp de la page  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- page header  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header" align="center">
                                <h2 class="pageheader-title">INFORMATIONS SUR UTILISATEUR</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Tableau Bord Admin</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter utilisateur</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" align="center">
                                            <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo"> 
                                            <h4 class="mb-0"><strong>AJOUTER UN UTILISATEUR</strong></h4>
                                        </div>

                                        <?php include('errors.php'); ?> 

                                        <div class="card-body">
                                        <form method="POST" action="ajouter_user.php">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="firstName">Nom & Prénoms</label>
                                                    <input type="text" class="form-control" name="nom_prenom" required="">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="firstName">Adresse</label>
                                                    <input type="text" class="form-control" name="adresse"  required="">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="email">Téléphone</label>
                                                    <input type="number" class="form-control" name="telephone"  required="">
                                                </div>
                                                                        
                                                <div class="col-md-6 mb-3">
                                                    <label for="addresse">Mot de Passe</label>
                                                    <input type="text" class="form-control" name="password_1" required="">
                                                </div>

                                                <div class="col-md-6 mb-3">
                                                    <label for="email">Confirmer </label>
                                                    <input type="text" class="form-control" name="password_2" required="">
                                                </div>

                                                 <div class="col-md-6 mb-3">
                                                    <label for="country">Type de compte</label>
                                                    <select class="custom-select d-block w-100" name="type_compte" required="">
                                                        <option value="">Choisir type compte ....</option>
                                                        <option>gerant</option>
                                                        <option>admin</option>
                                                        <option>buandeur</option>
                                                    </select>
                                                </div>
                                                
                                                <div class="col-md-6 mb-5">
                                                    <label for="state">Date du jour</label>
                                                    <input type="date" class="form-control" name="date"  required="">
                                                    </div>
                                                </div>                                                
                                                    <button class="btn btn-primary btn-lg btn-block" name="btn_save" type="submit">ENREGISTRER UTILISATEUR</button>
                                         </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
            </div>

           <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->

                <?php include('footer.php') ?>

            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>