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
                            <div class="page-breadcrumb">
                                <h5 class="pageheader-title">FACTURE EDITE</h5>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="admin.php" class="breadcrumb-link">Tableau Bord Admin</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Editer Facture </li>
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
                                       </h6> Imprimé le : <?= date("d-m-Y "); ?> </h6></br>
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
                                            <h3 for="firstName"><strong>CLIENT N°:</strong> <?= $contact['num_client']; ?></h3>
                                            <div><strong>Identifiant :</strong> <?= $contact['nom_prenom']; ?></div>
                                            <div><strong>Email :</strong> <?= $contact['email']; ?></div>
                                            <div><strong>Adresse :</strong> <?= $contact['adresse']; ?></div>
                                            <div><strong>Téléphone :</strong> <?= $contact['telephone']; ?></div>
                                            <div><strong>Genre :</strong> <?= $contact['genre']; ?></div>
                                            <div><strong>Enregistré :</strong> <?= $contact['date']; ?></div> 
                                        </div>
                                    <div class="col-sm-6">
                                        <div align="left">
                                            <img class="logo-img" src="assets/images/log-expert.PNG" alt="logo">
                                            <h6>Pressing Experts</h6>
                                        </div>
                                    </div> 
                                    </div>
                                    <div class="table-responsive-sm">
                                        <h3 align="center"><strong>FACTURE CLIENT N° : <?= $contact['num_client']; ?></stong></h3>
                                        <table id="example4" class="table table-striped table-bordered" style="width:100%">                                           
                                        <?php
                                            $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                            $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                            $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                            $bdd->exec('SET NAMES utf8');
                                            $reponse = $bdd->query("select * from client clt, depot dpt where clt.num_client = dpt.num_client AND clt.num_client = '".$_GET['numClient']."' "); 
                                            
                                            // $idClient = $_POST['numClient'];

                                                echo"
                                                    <thead>
                                                        <tr align='center'>
                                                            <th>Description</th>
                                                            <th>Catégorie</th>
                                                            <th>Prix (cfa)</th>
                                                            <th>Qté</th>
                                                            <th>Total (cfa)</th>
                                                        </tr>
                                                    </thead> ";

                                                // corps du tableau

                                                while ($donnees = $reponse->fetch())
                                                    {
                                                        $article = $donnees['item_article'];
                                                        $categorie = $donnees['item_categorie'];
                                                        $prix = $donnees['item_prix'];
                                                        $quantite = $donnees['item_quantity'];
                                                        // calcule du montant sous total
                                                        $montant = $donnees['item_prix']*$donnees['item_quantity'];
                                                        
                                                        $totalpayer = array(2400, 3000, 3600);

                                                        

                                                    ?>
                                                    <?php 
                                                        echo"
                                                            <tbody>
                                                                <tr align='center'>
                                                                    <td>".$article."</td>
                                                                    <td>".$categorie."</td>
                                                                    <td>".$prix."</td>
                                                                    <td>".$quantite."</td>
                                                                    <td>".$montant."</td>
                                                                <tr>
                                                            </tbody>";
                                                    ?>
                                                    <?php
                                                    }
                                            ?> 
                                    <form method="POST" action="#.php">
                                            <tbody>
                                                <tr>
                                                    <input  class="form-control" type="hidden" name="numClient"  value="<?= $contact['num_client']; ?>">
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Total TTC (cfa)</strong></td>
                                                    <td class="right"><input  class="form-control"  name="total_payer" id="total_payer1" value="<?php  echo " ".array_sum($totalpayer)." "; ?>"></td>
                                                </tr>

                                                <tr>
                                                    <td class="left"><strong class="text-dark">Remise de (%)</strong></td>
                                                    <td class="right"><input class="form-control" type="number" name="valeur_remise" id="valeur_remise1" placeholder="-30%"> </td>
                                                </tr>
                                                   
                                                <tr>
                                                    <td class="left"><strong class="text-dark">Remise (cfa)</strong></td>
                                                    <td class="right"><input class="form-control" type="number" name="total_remise" id="total_remise1" placeholder="0000"></td>
                                                </tr>

                                                <tr>
                                                    <td class="left"><strong class="text-dark">Net à Payer (cfa)</strong></td>
                                                    <td class="right"><input class="form-control" type="number" name="net_payer" id="net_payer1" placeholder="0000"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <div >
                                        <button class="btn btn-primary btn-lg btn-block" name="btn_paye" type="submit">PAYEE</button>
                                    </div>
                                </form>
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

        <!-- Script de recuperation des donnée de facture -->
        <script>
            // fonction pour remise à payer
            function remise(){

                var totalpayer1=document.getElementById("totalpayer1").value;
                var valeur_remise1=document.getElementById("valeur_remise1").value;

                total_remise1.value =parseFloat(totalpayer1*valeur_remise1/100);
            }

            // fonction pour net à payer
            // function netpayer(){
            //     var totalpayer1=document.getElementById("totalpayer1").value;
            //     netpayer1.value = parseInt(totalpayer1)-parseInt(valeur_remise1);
            // }
            // recuperation la somme de sous total dans label avec id
            // var elements=getElementById("element");
            // for (var i=0;i<element.length;i++){
            //     var element[i]=document.getElementById("montant1"); 
            // }
            // recuperation des données dans les id labele
            var totalpayer1=document.getElementById("totalpayer1");
            var valeur_remise1=document.getElementById("valeur_remise1");
            var total_remise1=document.getElementById("total_remise1");
            var netpayer1=document.getElementById("netpayer1");

            valeur_remise1.addEventListener("change", remise, false);
            total_payer1.addEventListener("change", remise, false);

            // netpayer1.addEventListener("change", netpayer, false);
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