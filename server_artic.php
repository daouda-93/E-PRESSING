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
                                <h2 class="pageheader-title">ENREGISTREMENT D'ARTICLE</h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Tableau Bord Admin</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Ajouter Article</li>
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
                                            <img class="logo-img" src="assets/images/lpressing_experts.PNG" alt="logo"> 
                                            <!-- <h4 class="mb-0"><strong>MODIFICATION DES INFORMATIONS</strong></h4> -->
                                        </div>

                                        <div class="card-body">

                                           <?php
                                                try {

                                                    $db = new PDO('mysql:host=localhost;dbname=p_experts','root','');
                                                    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                                    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                                    $db->exec('SET NAMES utf8');

                                                } catch (PDOException $e) {
                                                die('Erreur:'.$e->getMessage());
                                                }

                                                /* 2Mo = 2097152     */
                                                if(isset($_POST["btn_reg"]))
                                                {
                                                if (!empty($_FILES)) {

                                                    $file_name = $_FILES['fichier']['name'];

                                                    $file_extension = strrchr($file_name, '.');

                                                    $file_tmp_name = $_FILES['fichier']['tmp_name'];

                                                    $file_dest = 'files/'.$file_name;

                                                    $nom_art = $_POST['nom_art'];

                                                    $prix_art = $_POST['prix_art'];

                                                    $catego = $_POST['catego'];

                                                    $file_extensions_autorisees = array('.jpg','.JPG', '.png','.PNG');

                                                    if (in_array($file_extension, $file_extensions_autorisees)) {

                                                        if (move_uploaded_file($file_tmp_name, $file_dest)) {

                                                            $req = $db->prepare('INSERT INTO article (name, file_url, nom_art, prix_art, catego)

                                                            VALUES (?,?,?,?,?)');

                                                            $req->execute(array($file_name, $file_dest, $nom_art, $prix_art, $catego));

                                                                    echo "
                                                                        </br>
                                                                        <div style='text-align: center'>
                                                                            <div class='alert alert-success' >
                                                                                L'article a été ajouté avec succès  !!
                                                                            </div>
                                                                        </div>";
                                                                }else{

                                                                    echo
                                                                        "
                                                                        </br>
                                                                        <div style='text-align: center'>
                                                                            <div class='alert alert-danger' >
                                                                                Imposible d'enregistré l'article (taille image autoriser est de 1Mo) !!
                                                                            </div>
                                                                        </div>";
                                                                }
                                                                }else{
                                                                    echo "
                                                                            </br>
                                                                            <div style='text-align: center'>
                                                                                    <div class='alert alert-danger' >
                                                                                            Echec, seul les images en format jpg, png sont autorisé !!
                                                                                    </div>
                                                                            </div>";
                                                                }
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