
<?php 
     require_once('security_adm.php');
?>
<?php
    $ojetPdo = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

    $pdoStat = $ojetPdo->prepare('SELECT * FROM user WHERE id = :num');

    $pdoStat->bindvalue(':num',$_GET['numUser'],PDO::PARAM_INT);

    $executeIsok = $pdoStat->execute();

    $contact = $pdoStat->fetch();

?>
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
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title>E-Pressing</title>
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
                            <div class="page-header">
                                <h3 class="mb-2">Modifier Profile </h3>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Tableau de Bord Admin</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Modifier profile utilisateur</li>
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
                        <!-- ============================================================== -->
                        <!-- profile -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- card profile -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="user-avatar text-center d-block">
                                        <img src="assets/images/user.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                    </div>
                                    <div class="text-center">
                                        <h3 class="font-24 mb-0"><?= $contact['nom_prenom']; ?> <span class="badge-dot badge-success mr-1"></span></h3>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3 class="font-16" align="center">Informations</h3>
                                    <div class="">
                                        <ul class="list-unstyled mb-0">
                                        <li class="mb-0">Compte : <?= $contact['type_compte']; ?></li>
                                        <li class="mb-0">Téléphone : (+226) <?= $contact['telephone']; ?></li>
                                        <li class="mb-0">Quartier : </i><?= $contact['adresse']; ?></li>
                                        <li class="mb-2">Enrégistré : <?= $contact['date']; ?></li>
                                    </ul>
                                    </div>
                                </div>
                               
                                <div class="card-body border-top">
                                    <h3 class="font-16" align="center">Pressing Experts</h3>
                                    <div>
                                        <!-- <a href="#" class="badge badge-light mr-1">Fitness</a><a href="#" class="badge badge-light mr-1">Life Style</a><a href="#" class="badge badge-light mr-1">Gym</a> -->
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== --> 
                            <!-- end card profile -->
                            <!-- ============================================================== -->
                            </div>
                            <!-- ============================================================== -->
                            <!-- campaign data -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- campaign tab one -->
                            <!-- ============================================================== -->
                            <h3 class="card-header" align="center"><strong>MODIFICATION DU PROFILE UTILISATEUR</strong></h3>
                                     <form method="post" action="mod_count.php">
                                        <div class="row">
                                        <div class="offset-xl-3 col-xl-6 offset-lg-3 col-lg-3 col-md-12 col-sm-12 col-12 p-4">

                                            <div class="form-group">
                                                <input  class="form-control" type="hidden" name="numContact"  value="<?= $contact['id']; ?>">
                                            </div>

                                            <div class="form-group">
                                                <label for="name">Nom & Prénoms</label>
                                                <input class="form-control" type="text" name="nom_prenom"  value="<?= $contact['nom_prenom']; ?>" required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="firstName">Adresse</label>
                                                <input class="form-control" type="text" name="adresse"  value="<?= $contact['adresse']; ?>"  required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Téléphone</label>
                                                <input class="form-control" type="number" name="telephone" value="<?= $contact['telephone']; ?>"   required="">
                                            </div>

                                            <div class="form-group">
                                                <label for="country">Type de compte</label>
                                                    <select class="custom-select d-block w-100" type="text" name="type_compte" required="">
                                                            <option>Choisir ...</option>
                                                            <option>gerant</option>
                                                            <option>admin</option>
                                                            <option>buandeur</option>
                                                    </select>
                                            </div>
                                            
                                                <button class="btn btn-primary btn-lg btn-block" name="btn_mod" type="submit">MODIFIER</button>
                                            </div>
                                        </div>
                                    </form> 
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