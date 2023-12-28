<?php 
    include('server_user.php')
?>
<?php
    $ojetPdo = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

    $pdoStat = $ojetPdo->prepare('SELECT * FROM facture WHERE id = :num');

    $pdoStat->bindvalue(':num',$_GET['numFacture'],PDO::PARAM_INT);

    $executeIsok = $pdoStat->execute();

    $contact = $pdoStat->fetch();

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
                                <h2 class="pageheader-title">PAIEMENT DE LA FACTURE</h2><hr>
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
                                            <h4 class="mb-0"><strong>Encaissement de la somme du facture</strong></h4>
                                        </div>

                                        <div class="card-body">

                                            <form method="post" action="server_paie_fact.php">
                                                <div class="row">

                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">N° Facture</label>
                                                        <input  class="form-control"  name="id_facture"  value="<?= $contact['id']; ?>">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">N° Client</label>
                                                        <input class="form-control"  name="id_client"  value="<?= $contact['id_client']; ?>" >
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Total TTC (FCFA)</label>
                                                        <input class="form-control"  name="total_payer"  value="<?= $contact['total_payer']; ?>" >
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="email">Remise (FCFA)</label>
                                                        <input class="form-control"  name="total_remise" value="<?= $contact['total_remise']; ?>"  >
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="firstName">Net à Payer (FCFA)</label>
                                                        <input class="form-control"  name="net_payer"  value="<?= $contact['net_payer']; ?>" >
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="country">Validation du Paiement</label>
                                                        <select class="custom-select d-block w-100"  name="statut_paie" >
                                                            <option>Choisir ...</option>
                                                            <option>Payée</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                </div>
                                                    <button class="btn btn-primary btn-lg btn-block" name="btn_paye" title="Validation d'encaissement de la somme du facture" type="submit">VALIDER</button>
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