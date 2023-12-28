<?php
    require_once("security.php");
?>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="assets/images/e-pressing.PNG" rel="icon">
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
                                <h2 class="pageheader-title">GRILLE TARIFAIRE</h2>
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
                            <h5>Liste de grille tarifaire des linges</h5>
                                <div class="table-responsive">
                                    <table id="example4" class="table table-striped table-bordered" style="width:100%">
                                    <?php
                                        $Host ="localhost";
                                        $uname = "root";
                                        $pwd = '';
                                        $db_name = "p_experts";

                                        // mysql_set_charset('utf-8');
                                        
                                        $file_path = 'files/'; /* chemin du dossier de fichier */
                                        $result = mysqli_connect($Host,$uname,$pwd) or die("Could not connect to database." .mysqli_error());
                                        mysqli_select_db($result,$db_name) or die("Could not select the databse." .mysqli_error());
                                        $image_query = mysqli_query($result,"select id, name, file_url, nom_art, prix_art, catego  from  article");
                                        
                                        echo"
                                        <thead>
                                            <tr align='center'>
                                                <th>Photo Article</th>
                                                <th>Désignation</th>
                                                <th>Tarif</th>
                                                <th>Catégorie</th>
                                            </tr>
                                        </thead>";

                                        while($rows = mysqli_fetch_array($image_query))
                                        {
                                            $id_src = $rows['id'];/* chemin du fichier dans bd */
                                            $img_src = $rows['file_url'];/* chemin du fichier dans bd */
                                            $nom_art_img = $rows['nom_art']; /* nom article */
                                            $prix_art_img = $rows['prix_art'];/* prix article*/
                                            $catego_img = $rows['catego']; /* catégorie */
                                        ?>
                                        <?php 
                                            echo"
                                                <tbody>
                                                <tr align='center'>
                                        
                                            <!-- Thumb Image and Description -->
                                                <td><img src='$img_src'  alt=''  width='90' higth='50'></td>

                                                <td>$nom_art_img</td>

                                                <td> $prix_art_img FCFA</td>

                                                <td>$catego_img</td>
                                            <tr>
                                            </tbody>";
                                            ?>
                                        <?php
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
                                    