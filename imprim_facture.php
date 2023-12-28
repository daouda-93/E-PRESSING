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
                                <h5 class="pageheader-title">FACTURE EDITE</h5>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="gerant.php" class="breadcrumb-link">Tableau Bord Gerent</a></li>
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
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h2 for="firstName"><strong>CLIENT N° :</strong> <?= $contact['num_client']; ?></h2>
                                            <div><h3><strong>Nom :</strong> <?= $contact['nom_prenom']; ?><h3></div>
                                            <div><h3><strong>Email :</strong> <?= $contact['email']; ?></div>
                                            <div><h3><strong>Adresse :</strong> <?= $contact['adresse']; ?><h3></div>
                                            <div><h3><strong>Téléphone :</strong> <?= $contact['telephone']; ?><h3></div>
                                            <div><h3><strong>Genre :</strong> <?= $contact['genre']; ?><h3></div>
                                            <!-- <div><h3><strong>Enregistré :</strong> <?= $contact['date']; ?><h3></div> -->
                                        </div>
                                    <div class="col-sm-6">
                                        <div align="left">
                                            <img class="logo-img" src="assets/images/pressing_experts.png" alt="logo">
                                            <h4>Télé : (+226) 25393666 / 70650420 </br>Koulouba</h4>
                                            <p>Reçu par : 
                                                    <?php
                                                        $connect = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

                                                        if (isset($_SESSION['nom_prenom'])){

                                                            echo $_SESSION['nom_prenom'];
                                                        }
                                                        
                                                    ?> le : <?= date("d-m-Y", strtotime($contact["date"])); ?> à <b name="d" id="d"></b>
                                            </p>
                                            <p>
                                                Révener dans 3 jours pour le retrait du linge !!
                                            </p>
                                        </div>
                                    </div> 
                                    </div>
                                    <div class="table-responsive-sm">
                                        <h2 align="center"><strong>FACTURE N° : <?= $contact['num_client']; ?></stong></h2>
                                        <table id="example4" class="table table-striped table-bordered" style="width:100%">                                           
                                        <?php
                                            $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                            $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                            $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                            $bdd->exec('SET NAMES utf8');
                                            
                                            $reponse = $bdd->query("select * from client clt, depot dpt where clt.num_client = dpt.num_client AND clt.num_client = '".$_GET['numClient']."' ");
                                            
                                            $resul = $bdd->query("select SUM(item_prix*item_quantity) as total from client clt, depot dpt where clt.num_client = dpt.num_client AND clt.num_client = '".$_GET['numClient']."' ");


                                            $montantTotal=0;
                                            
                                            while ($donnees = $resul->fetch())
                                            {
                                                $montantTotal = $donnees['total'];
                                                
                                            }
                                            
                                            

                                                echo"
                                                    <thead>
                                                        <tr align='center'>
                                                        <th><h3>Description</h3></th>
                                                        <th><h3>Catégorie</h3></th>
                                                        <th><h3>Prix</h3></th>
                                                        <th><h3>Qté</h3></th>
                                                        <th><h3>Montant</h3></th>
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
                                                        
                                                        $totalpayer = array($montant);
                                                        $total = array_sum($totalpayer);
                                                    
                                                        // for($i=0; $i<100;$i++){
                                                        //     array_sum($montant);
                                                        //     $totalpayer = $montant+$montant;
                                                        // }

                                                        echo"
                                                            <tbody>
                                                                <tr align='center'>
                                                                    <td><h3>".$article."</h3></td>
                                                                    <td><h3>".$categorie."</h3></td>
                                                                    <td><h3>".$prix."f</h3></td>
                                                                    <td><h3>".$quantite."</h3></td>
                                                                    <td><h3>".$montant."f</h3></td>
                                                                <tr>
                                                            </tbody>";

                                                        } 

                                                    ?>
                                                    
                                                   
                                            <tbody>
                                                <tr>
                                                    <input  class="form-control" type="hidden" name="numClient"  value="<?= $contact['num_client']; ?>">
                                                </tr>
                                                <tr>
                                                    <td class="left"><h2><strong class="text-dark">Total TTC</strong></h2></td>
                                                    <td class="right"><label><h2><?php  echo "$montantTotal"; ?> F</h2></label></td>
                                                </tr>
                                                
                                                <!-- Affichage de la valeur remise et net à payer dans la BD -->

                                                <?php
                                                    $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                                    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                                    $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                                    $bdd->exec('SET NAMES utf8');

                                                    $req = $bdd->prepare("select * from client clt, facture fct where clt.num_client = fct.id_client AND clt.num_client = '".$_GET['numClient']."' ");
                                                    $req->execute();
                                                    while ($data = $req->fetch(PDO::FETCH_OBJ)):?>

                                                <tr>
                                                    <td class="left"><h2><strong class="text-dark" >Remise (<?php echo $data->valeur_remise;?> %)</strong></h2></td>
                                                    <td class="right"><label><h2><?php echo $data->total_remise;?> F</h2></lable></td>
                                                </tr>
                                                   
                                                <tr>
                                                    <td style="color: red" ><h2><strong class="text-dark">Net à payer</strong></h2></td>
                                                    <td style="color: red"><label><h2> <?php echo $data->net_payer;?> F</h2></lable></td>
                                                </tr>

                                                <?php endwhile;?>

                                            </tbody>

                                        </table></br>

                                        <div align="center">
                                             <h3>Merci pour votre confiance !!</h3>
                                        </div>
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
        <script type="text/javascript">
            // fonction pour remise à payer en %
            function remise(){
                var total_payer1=document.getElementById("total_payer1").value;
                var valeur_remise1=document.getElementById("valeur_remise1").value;
                var total_remise1=document.getElementById("total_remise1");
                var montantAvecRemise=document.getElementById("montantAvecRemise");

                var remise=parseInt(total_payer1*valeur_remise1/100);

                // var montantAvecRemise = 
                
                if(!isNaN(remise)) total_remise1.value=remise;
                if(!isNaN(remise)) montantAvecRemise.value=total_payer1 - remise;
                
            }
            
            valeur_remise1.addEventListener("change", remise, false);
    
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