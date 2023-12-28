<?php
    require_once("security.php");
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/images/pressing_experts.png" />
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
                                <div class="page-breadcrumb">
                                <h2 class="pageheader-title">EDITION DES FACTURES CLIENTS</h2>
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="gerant.php" class="breadcrumb-link">Tableau Bord Gerent</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Grille tarifaire</li>
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
                                <img class="logo-img" src="assets/images/pressing_experts.png" alt="logo"> 
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <h5>Liste des linges déposés<h5>
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <?php
                                        $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                        $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                        $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                        $bdd->exec('SET NAMES utf8');
                                        $reponse = $bdd->query('SELECT * FROM client order by num_client desc ');

                                            echo"
                                                <thead>
                                                    <tr align='center' >
                                                        <th style='color:red'>Client</th>
                                                        <th>Identifiant </th>
                                                        <th>Adresse</th>
                                                        <th>E-mail</th>
                                                        <th>Téléphone</th>
                                                        <th>Genre</th>
                                                        <th style='color:green'>Enregistré</th>
                                                        <th style='color: orange'>Actions sur Client</th>
                                                    </tr>
                                                </thead>";

                                                            // corps du tableau

                                            while ($donnees = $reponse->fetch())
                                                {
                                                    echo"
                                                        <tbody>
                                                            <tr align='center'>
                                                                <td style='color:red'>N°: ".$donnees['num_client']."</td>
                                                                <td>".$donnees['nom_prenom']."</td>
                                                                <td>".$donnees['adresse']."</td>
                                                                <td>".$donnees['email']."</td>
                                                                <td>".$donnees['telephone']."</td>
                                                                <td>".$donnees['genre']."</td>
                                                                <td style='color:green'>".$donnees['date']."</td>
                                                                <td>
                                                                    <a href='detaille_depot.php?numClient=".$donnees['num_client']."'><button type='button' class='btn btn-warning btn-sm add'><i title='Voir le dépot du client' class='fas fas fa-eye'></i></button></a>
                                                                    <a href='facture.php?numClient=".$donnees['num_client']."'><button type='button' class='btn btn-primary btn-sm add'><i title='Enregistrer la facture du client' class='fab fa-fw fa-wpforms'></i></button></a>
                                                                    <a href='imprim_facture.php?numClient=".$donnees['num_client']."'><button type='button' class='btn btn-success btn-sm add'><i title='Imprimer la facture du client' class='fas fa-print'></i></button></a>
                                                                </td>
                                                            <tr>
                                                        </tbody>";
                                                }
                                        ?> 
                                    </table>
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
                                    