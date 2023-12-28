<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "p_experts");
$output = '';
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "SELECT * FROM facture WHERE id_client LIKE '%".$search."%'OR total_payer LIKE '%".$search."%' 
  OR valeur_remise LIKE '%".$search."%' OR total_remise LIKE '%".$search."%' OR net_payer LIKE '%".$search."%'  OR date LIKE '%".$search."%'";
}
else
{
  $query = "SELECT  * FROM facture ORDER BY id desc";
}
  $result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '<div class="table-responsive">
        <table class="table table bordered">
            <tr align="center">
                <th>Facture</th>
                <th>N° Client</th>
                <th style="color: green">Total TTC</th>
                <th style="color: red">Remise (%)</th>
                <th style="color: orange">Total Remise</th>
                <th>Net à Payer</th>
                <th style="color:blue">Date Enregistrement</th>
                <th>Action</th>
            </tr></br>';
            
 while($row = mysqli_fetch_array($result))
 {
  
  $output .= '
            <tr align="center">
                <td>N°: '.$row["id"].'</td>
                <td>N°: '.$row["id_client"].'</td>
                <td style="color: green">'.$row["total_payer"].' fcfa</td>
                <td style="color: red">'.$row["valeur_remise"].' %</td>
                <td style="color: orange">'.$row["total_remise"].' fcfa</td>
                <td>'.$row["net_payer"].' fcfa</td>
                <td style="color:blue">'.date("d-m-Y H:m:s", strtotime($row["date"])).'</td>
                <td>
                  <a href="paiement_facture.php?numFacture='.$row["id"].' "><button type="button" class="btn btn-primary btn-sm add"><i title="Encaissement de la somme du facture" class="fab fa-fw fa-wpforms"></i></button></a>
                </td>
            </tr>';
 }
 echo $output;
}
else
{
 echo 'Aucun resultat trouvé pour cette recherche';
}

?>