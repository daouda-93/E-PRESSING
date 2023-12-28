<?php
$search =null;
$dateFormatted = null;

//fetch_fact_payee.php
$connect = mysqli_connect("localhost", "root", "", "p_experts");
$output = '';
if(isset($_POST["query"]))
{
  $dateFormatted = date("Y-m-d", strtotime($_POST["query"]));
  $search = mysqli_real_escape_string($connect, $dateFormatted);
  $query = "SELECT * FROM regle_facture WHERE id_client LIKE '%".$search."%'OR total_payer LIKE '%".$search."%' 
  OR id_facture LIKE '%".$search."%' OR id_facture LIKE '%".$search."%' OR net_payer LIKE '%".$search."%'  OR createdAt LIKE '%".$search."%'";

  // $resul = "SELECT SUM(net_payer) as netPaie FROM regle_facture WHERE createAt='26-09-2020'  ";

  // while ($donnees = mysqli_fetch_array($resul))
  // {
  //     $montantTotal = $donnees['netPaie'];

      
      
  // }
  
}
else
{
  $query = "SELECT  * FROM regle_facture ORDER BY id desc";
  // $query = "SELECT  sum(net_payer) FROM regle_facture ";
}

$bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
$bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
$bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
$bdd->exec('SET NAMES utf8');
// $reponse = $bdd->query("select * from client clt, depot dpt where clt.num_client = dpt.num_client AND clt.num_client = '".$_GET['numClient']."' ");

$resul = $bdd->query("select SUM(net_payer) as total from regle_facture where createdAt LIKE '%".$dateFormatted."%' ");

while ($donnees = $resul->fetch())
{
  $montantTotal = $donnees['total'];
  
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
                <th style="color: red">Total Remise</th>
                <th style="color: orange">Net à Payée</th>
                <th style="color:blue">Date du Paiement</th>
                <th style="color:red">Supprimer</th>

            </tr></br>';
            
 while($row = mysqli_fetch_array($result))
 {
    // $totalpayer = array($net_payer);
    // $total = array_sum($totalpayer);
    //  $total = sum()

  $output .= '
            
            <tr align="center">
                <td>N°: '.$row["id_facture"].'</td>
                <td>N°: '.$row["id_client"].'</td>
                <td style="color: green">'.$row["total_payer"].' fcfa</td>
                <td style="color: red">'.$row["total_remise"].' fcfa</td>
                <td style="color: orange">'.$row["net_payer"].' fcfa</td>
                <td style="color:blue">'.date("d-m-Y H:m:s", strtotime($row["createdAt"])).'</td>
                <td style="color:red"> <a href="supprimer_fact_payee.php?numFacture= '.$row["id"].' ">supprimer </a> </td>  

            </tr>';
 }
 echo "<h3 style='color: orange'<strong<>Recette totale : $montantTotal CFA</strong></h3>";
 echo $output;
}
else
{
 echo 'Aucun resultat trouvé pour cette recherche';
}

?>