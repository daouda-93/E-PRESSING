<!-- <?php
    require_once("security_buan.php");
?> -->
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

        <?php include('header_menu_bui.php') ?>
        
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
                                <h2 class="pageheader-title">LISTE DES NOTIFICATIONS ENVOYEES</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="buandeur.php" class="breadcrumb-link">Tableau Bord Buianderie</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Liste des notification reçu</li>
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
                    <!-- fixed header  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div id="div1">
                        <div class="card">
                            <div class="card-header" align="center">
                                <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo"></br> -->
                                </h5>liste des notifications reçus et lu</h5> 
                            </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                        </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <?php
                                    $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                    $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                    $bdd->exec('SET NAMES utf8');

                                    $req = $bdd->prepare('SELECT * FROM message WHERE lu=1 ');
                                    $req->execute();

                                    while ($data = $req->fetch(PDO::FETCH_OBJ)):?>

                                        <?php echo "<img src='assets/images/user.jpg' width='55' height='55' alt=''/>";?></br>

                                        <?php echo $data->nom_prenom;?> </br>

                                        <small style="color: blue">Envoyé le : <?php echo $data->date;?></small>

                                        <p  class="<?php echo ($data->lu) ? 'alert alert-success' : 'alert alert-danger';?>">

                                            <?php echo  $data->message;?>

                                            <?php if(!$data->lu):?>

                                            <?php endif;?>
                                        </p>

                                <?php endwhile;?>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end fixed header  -->
                    <!-- ============================================================== -->
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
        <!-- fonction imprimer  -->
        
        <script type="text/javascript">
            function printContent(el)
            {
                var restorepage= document.body.innerHTML;
                var printContent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = restorepage;

            }
        </script>
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
                                    