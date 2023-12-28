<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "p_experts");
$output = '';
if(isset($_POST["query"]))
{
  $search = mysqli_real_escape_string($connect, $_POST["query"]);
  $query = "SELECT * FROM client WHERE nom_prenom LIKE '%".$search."%'OR adresse LIKE '%".$search."%' OR num_client LIKE '%".$search."%' 
  OR telephone LIKE '%".$search."%' OR email LIKE '%".$search."%' OR genre LIKE '%".$search."%'  OR date LIKE '%".$search."%'";
}
else
{
  $query = "SELECT * FROM client ORDER BY num_client desc";
}
  $result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '<div class="table-responsive">
        <table class="table table bordered">
          <tr align="center">
            <th style="color:red">Client</th>
            <th>Identifiant</th>
            <th>Adresse</th>
            <th>E-mail</th>
            <th>Téléphone</th>
            <th>Genre</th>
            <th style="color:orange">Enregistré</th>
            <th style="color: green">Actions</th>
          </tr>';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
          <tr align="center">
              <td style="color:red">N°: '.$row["num_client"].'</td>
              <td>'.$row["nom_prenom"].'</td>
              <td>'.$row["adresse"].'</td>
              <td>'.$row["telephone"].'</td>
              <td>'.$row["email"].'</td>
              <td>'.$row["genre"].'</td>
              <td style="color:orange">'.$row["date"].'</td>
              <td>
                <a href="sup_client.php?numClient= '.$row["num_client"].' "><button type="button" class="btn btn-danger btn-sm add"><i title="suprimer le client" class="fas fa-trash-alt"></i></button></a>
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