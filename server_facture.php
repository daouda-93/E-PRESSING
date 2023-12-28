<?php
    require_once("security.php");
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

         <?php include('header_menu.php') ?>
        
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
                                <h2 class="pageheader-title">PAYEMENT FACTURE</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="gerent.php" class="breadcrumb-link">Tableau Bord Gerent</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Payement facture</li>
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
                                            <h5>Facture Payée</h5>
                                            <!-- <h4 class="mb-0"><strong>MODIFICATION DES INFORMATIONS</strong></h4> -->
                                        </div>

                                        <div class="card-body">
                                        <?php
                                        
                                            //var_dump( $_POST['facture']);
                                            $db = mysqli_connect('localhost', 'root', '', 'p_experts');

                                            if(isset($_POST['btn_paye']))
                                                {

                                                        $id_client = $_POST["numClient"];

                                                        $total_payer =$_POST["total_payer"];
                                                        $valeur_remise = $_POST["valeur_remise"];
                                                        $total_remise = $_POST["total_remise"];
                                                        $net_payer = $_POST["net_payer"];

                                                        
                                                        $query = "INSERT  INTO facture (id_client, total_payer, valeur_remise, total_remise, net_payer, date) 
                                                        
                                                        VALUES ( '$id_client', '$total_payer', '$valeur_remise', '$total_remise', '$net_payer', now() ) ";

                                                        mysqli_set_charset($db,"utf8");

                                                        $reponse = mysqli_query($db, $query);


                                                        if($reponse)
                                                        {

                                                            echo
                                                                "
                                                                </br>
                                                                <div style='text-align: center'>
                                                                    <span class='alert alert-success' >
                                                                        <strong>
                                                                            Votre facture a été effectué avec succes !! <a href='liste_facture.php'>voir la facture</a>
                                                                        </strong>
                                                                    </span>
                                                                </div>";
                                                            // header('location: admin.php') ;
                                                        }else
                                                        {
                                                            echo
                                                                "
                                                                </br>
                                                                <div style='text-align: center'>
                                                                    <div class='alert alert-danger'>
                                                                     L'enregistrement de la facture  client a échoué !!
                                                                    </div> 
                                                                </div>";
                                                        }
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