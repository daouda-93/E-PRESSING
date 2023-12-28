<?php
    require_once("security.php");
?>
<?php
//selction des articles dans combox
$connect = new PDO("mysql:host=localhost;dbname=p_experts", "root", "");
function fill_nom_art_select_box($connect)
{ 
 $output = ''; 
 $query = "SELECT * FROM article ORDER BY id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["nom_art"].'">'.$row["nom_art"].'</option>';
 }
 return $output;
}

?>

<?php
//selction des articles dans combox
$connect = new PDO("mysql:host=localhost;dbname=p_experts", "root", "");
function fill_prix_art_select_box($connect)
{ 
 $output = ''; 
 $query = "SELECT * FROM article ORDER BY id ASC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output .= '<option value="'.$row["prix_art"].'">'.$row["prix_art"].'</option>';
 }
 return $output;
}

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
    <script src="style.js"></script>
  
    <script src="min.js"></script>
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
                                <h5 class="pageheader-title">DEPOT DE LINGES DES CLIENTS</h5>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="gerant.php" class="breadcrumb-link">Tableau Bord Gerent</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dépot des linges </li>
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
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header" align="center">
                                            <img class="logo-img" src="assets/images/log-expert.PNG" alt="logo"> 
                                        </div>
                                            <div class="card-body">
                                                <form method="post" id="insert_form">
                                                    <div class="table-repsonsive">
                                                    <span id="error"></span>
                                                     <div class="row">

                                                        <div class="form-group">
                                                            <input  class="form-control" type="hidden" name="numClient"  value="<?= $contact['num_client']; ?>">
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="firstName" style="color: red"><strong>Client N° :</strong> <?= $contact['num_client']; ?></label></br>
                                                            <label for="firstName"><strong>Nom et Prénoms :</strong> <?= $contact['nom_prenom']; ?></label>
                                                        </div>

                                                    </div> 

                                                    <table class="table table-bordered" id="item_table">
                                                            <tr align="center">
                                                                <th>Désignation</th>
                                                                <th>Catégorie</th>
                                                                <th>Prix (FCFA)</th>
                                                                <th>Nombre </th>
                                                                <th>Date du Dépot</th>
                                                                <th>Date du Retrait</th>
                                                                <th><button type="button" name="add" class="btn btn-success btn-sm add" title="Ajouter des lignes"><i class="fas fa-sign-out-alt"></i></button></th>
                                                            </tr>
                                                    </table></br>
                                                    <div align="center">
                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">ENREGISTRER LE DEPOT DU CLIENT</button>
                                                        <!-- <input type="submit" name="submit" class="btn btn-info" value="Enregistrer" /> -->
                                                    </div>
                                                    </div>
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
    <script>

        $(document).ready(function(){
        
        $(document).on('click', '.add', function(){
            
        var html = '';

            html += '<tr>';
            html += '<td><select name="item_article[]" class="form-control item_article"><option value="">Choisir ...</option><?php echo fill_nom_art_select_box($connect); ?></select></td>';
            html += '<td><select name="item_categorie[]" class="form-control item_categorie"><option value="">Choisir ...</option><option>Adulte</option><option>Enfant</option></select></td>';
            html += '<td><select name="item_prix[]"  class="form-control item_prix"><option value="">Choisir ...</option><?php echo fill_prix_art_select_box($connect); ?></select></td>';
            html += '<td><input type="number" name="item_quantity[]" class="form-control item_quantity" /></td>';
            html += '<td><input type="date" name="item_date_depot[]" class="form-control item_date_depot" /></td>';
            html += '<td><input type="date" name="item_date_retrait[]" class="form-control item_date_retrait" /></td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove" title="Supprimer la ligne"><i class="fas fa-trash-alt"></i></button></td></tr>';
        $('#item_table').append(html);
        });
        
        $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
        });
        
        $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.item_prix').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
            error += "<p>Selectionner le prix de l'article  </p>";
            return false;
        }
        count = count + 1;
        });
        
        $('.item_quantity').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
            error += "<p>Entrer la Quantité de l'article  </p>";
            return false;
        }
        count = count + 1;
        });
        
        $('.item_article').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
            error += "<p>Selectionner un article pour le dépot  </p>";
            return false;
        }
        count = count + 1;
        });

        $('.item_date_depot').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
            error += "<p>Selectionner la date de dépode de l'article  </p>";
            return false;
        }
        count = count + 1;
        });

        $('.item_date_retrait').each(function(){
        var count = 1;
        if($(this).val() == '')
        {
            error += "<p>Selectionner la date de retrait de l'article </p>";
            return false;
        }
        count = count + 1;
        });

        var form_data = $(this).serialize();
        if(error == '')
        {
        // fichier d'insertion bdd
        $.ajax({
            url:"insert_depot.php",
            method:"POST",
            data:form_data,
            success:function(data)
            {
            if(data == 'ok')
            {
            $('#item_table').find("tr:gt(0)").remove();
            $('#error').html('<div class="alert alert-success">Votre dépot est enregisté avec succes !!</div>');
            }
            }
        });
        }
        else
        {
        $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }
        });
        
        });
    </script>
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
