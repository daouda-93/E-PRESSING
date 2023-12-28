<?php
    require_once("security_adm.php");
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
    <link rel="stylesheet" href="assets/libs/css/style1.css">
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
                                            <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">  -->
                                            <h4 class="mb-0"><strong>MODIFICATION DES INFORMATIONS</strong></h4>
                                        </div>

                                        <div class="card-body">

                                            <?php

                                                // session_start();

                                                $ojetPdo = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');


                                                $pdoStat = $ojetPdo->prepare('UPDATE user set nom_prenom=:nom_prenom,  

                                                adresse=:adresse, telephone=:telephone, type_compte=:type_compte WHERE id=:num LIMIT 1');

                                                $pdoStat->bindvalue(':num',$_POST['numContact'],PDO::PARAM_INT);
                                                
                                                $pdoStat->bindvalue(':nom_prenom',$_POST['nom_prenom'],PDO::PARAM_STR);
                                                
                                                $pdoStat->bindvalue(':adresse',$_POST['adresse'],PDO::PARAM_STR);

                                                $pdoStat->bindvalue(':telephone',$_POST['telephone'],PDO::PARAM_INT);

                                                $pdoStat->bindvalue(':type_compte',$_POST['type_compte'],PDO::PARAM_STR);

                                                $executeIsok = $pdoStat->execute();

                                                if($executeIsok)
                                                {
                                                    echo
                                                        "
                                                            </br>
                                                            <div style='text-align: center'>
                                                                <span class='alert alert-success' >
                                                                    <strong>
                                                                        Le compte a bien été modifier avec succès !!
                                                                    </strong>
                                                                </span>
                                                            </div>";

                                                }else
                                                {
                                                    echo
                                                        "
                                                        </br>
                                                        <div style='text-align: center'>
                                                            <span class='alert alert-danger' >
                                                                <strong>
                                                                    Echec de modification du compte utilisateur !!
                                                                </strong>
                                                            </span>
                                                        </div>";
                                                }
                                            ?>

                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
            </div>

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