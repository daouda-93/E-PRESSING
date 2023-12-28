<?php
    require_once("security.php");
?>
<?php
//selction du client
    $ojetPdo = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

    $pdoStat = $ojetPdo->prepare('SELECT * FROM client WHERE num_client = :num');

    $pdoStat->bindvalue(':num',$_GET['numClient'],PDO::PARAM_INT);

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
    <link rel="icon" href="assets/images/log-expert.png" />
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
    <title>E-pressing</title>
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
                                <h5 class="pageheader-title">DETAILLE SUR LE DEPOT D'ARTICLE CLIENT</h5>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="gerant.php" class="breadcrumb-link">Tableau Bord Gerent</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Détaile du dépot </li>
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
                        <div id="div1">
                            <div class="card">
                                <div class="card-header p-4">
                                    <div class="float-right">
                                        </h6> Date : <?= date("d-m-Y "); ?> </h6></br>
                                        <!-- Affichage de heure -->
                                        <SCRIPT language=JavaScript>
                                            function date()
                                            {

                                            var today=new Date();
                                            var date_heure="";
                                            h = today.getHours();
                                            m = today.getMinutes();
                                            s = today.getSeconds();

                                            if(h<10)
                                            { h = '0'+h; }
                                            if(m<10)
                                            { m = '0'+m; }
                                            if(s<10)
                                            { s = '0'+s; }
                                            date_heure = ''+h+'h : '+m+'m : '+s+'s';

                                            document.getElementById('d').innerHTML = date_heure;
                                            }
                                            setInterval("date()",1000);
                                        </SCRIPT>
                                         <h6>Heure : <b name="d" id="d"></h6></b>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h3 for="firstName"><strong>CLIENT N° :</strong> <?= $contact['num_client']; ?></h3>
                                            <div><strong>Nom et Prénoms :</strong> <?= $contact['nom_prenom']; ?></div>
                                            <div><strong>Email :</strong> <?= $contact['email']; ?></div>
                                            <div><strong>Adresse :</strong> <?= $contact['adresse']; ?></div>
                                            <div><strong>Téléphone :</strong> <?= $contact['telephone']; ?></div>
                                            <div><strong>Genre :</strong> <?= $contact['genre']; ?></div>
                                            <div><strong>Enregistré :</strong> <?= $contact['date']; ?></div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div align="left">
                                                <img class="logo-img" src="assets/images/pressing_experts.png" wi heigth="120" alt="logo">
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="table-responsive-sm">
                                        <h4 align="center"><strong>TABLEAU RECAPITULATIF DE DEPOT LINGE CLIENT N° <?= $contact['num_client']; ?></strong></h4>
                                        <table id="example4" class="table table-striped table-bordered" style="width:100%">                                          
                                        <?php
                                            $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                            $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                            $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                            $bdd->exec('SET NAMES utf8');
                                            $reponse = $bdd->query("select * from client clt, depot dpt where clt.num_client = dpt.num_client AND clt.num_client = '".$_GET['numClient']."' " ); 



                                                echo"
                                                    <thead>
                                                        <tr align='center'>
                                                            <th>N° Dépot</th>
                                                            <th>Designation</th>
                                                            <th>Catégorie</th>
                                                            <th>Prix (cfa)</th>
                                                            <th>Qté</th>
                                                            <th>Total (cfa)</th>
                                                        </tr>
                                                    </thead>";

                                                                // corps du tableau

                                                while ($donnees = $reponse->fetch())
                                                    {
                                                         // calcule du montant sous total
                                                         $montant = $donnees['item_prix']*$donnees['item_quantity'];

                                                        echo"
                                                            <tbody>
                                                                <tr align='center'>
                                                                    <td>".$donnees['order_id']."</td>
                                                                    <td>".$donnees['item_article']."</td>
                                                                    <td>".$donnees['item_categorie']."</td>
                                                                    <td>".$donnees['item_prix']."</td>
                                                                    <td>".$donnees['item_quantity']."</td>
                                                                    <td>".$montant."</td>
                                                                <tr>
                                                            </tbody>";
                                                    }
                                            ?> 
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white" align="center">
                                    <p class="mb-0">Pressing Experts</p>
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