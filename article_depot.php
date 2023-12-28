
<?php
//selction du client
    $ojetPdo = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

    $pdoStat = $ojetPdo->prepare('SELECT * FROM client WHERE num_client = :num');

    $pdoStat->bindvalue(':num',$_GET['numClient'],PDO::PARAM_INT);

    $executeIsok = $pdoStat->execute();

    $contact = $pdoStat->fetch();
?>
<html>
 <head>
    <meta charset="utf-8">
    <title>Pressing-Experts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/images/log-expert.PNG" />
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <!-- <style>
        body{
            background-image: url(baground.png);
            background-attachment:fixed;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 80px;
            padding-bottom: 40px;
        }
    </style> -->
 <body>
    <div class="container">
        <h3 align="center"><strong>DEPOT DE LINGES DES CLIENTS</strong></h3>
   
        <form method="post" id="insert_form">
        <div class="table-repsonsive">
            <span id="error"></span>
            <div class="row">
                <!-- identifiant de client -->
                <div class="form-group">
                        <input  class="form-control" type="hidden" name="numClient"  value="<?= $contact['num_client']; ?>">
                </div>

                <div class="col-md-6 mb-3">
                        <label for="firstName" style="color: red"><strong>Client N° :</strong> <?= $contact['num_client']; ?></label></br>
                        <label for="firstName"><strong>Nom et Prénoms :</strong> <?= $contact['nom_prenom']; ?></label>
                </div>

                <form method="post" id="insert_form">
                    <div class="table-repsonsive">
                        <span id="error"></span>
                            <table class="table table-bordered" id="item_table">
                                <tr>
                                    <th>Désignation</th>
                                    <th>Catégorie</th>
                                    <th>Prix (FCFA)</th>
                                    <th>Nombre </th>
                                    <th>Date du Dépot</th>
                                    <th>Date du Retrait</th>
                                    <th>
                                        <button type="button" name="add" class="btn btn-success btn-sm add" title="Ajouter des lignes">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </button>
                                    </th>
                                </tr>
                            </table></br>
                            <div align="center">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">ENREGISTRER LE DEPOT DU LINGES DE CLIENT</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  var html = '';
  html += '<tr>';
  html += '<td><input type="text" name="item_article[]" class="form-control item_article[]" /></td>';
  html += '<td><select name="item_categorie[]" class="form-control item_categorie"><option value="">Choisir ...</option><option>Adulte</option><option>Enfant</option></select></td>';
  html += '<td><input type="number" name="item_prix[]" class="form-control item_prix[]" /></td>';
  html += '<td><input type="number" name="item_quantity[]" class="form-control item_quantity" /></td>';
  html += '<td><input type="date" name="item_date_depot[]" class="form-control item_date_depot" /></td>';
  html += '<td><input type="date" name="item_date_retrait[]" class="form-control item_date_retrait" /></td>';
  html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus" title="supprimer la ligne"></span></button></td></tr>';
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
            $('#error').html('<div class="alert alert-success">Enregistrement du dépot de linge a été effectué avec succes !! <a href="editer_facture.php">Editer la Facture du client</a></div>');
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
