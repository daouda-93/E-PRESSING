<?php
//insert.php;

if(isset($_POST["item_article"])) 
{
 $connect = new PDO("mysql:host=localhost;dbname=p_experts", "root", "");
 $order_id = uniqid();
 $id = $_POST["numClient"];
 for($count = 0; $count < count($_POST["item_article"]); $count++)
 {  
  $query = "INSERT INTO depot (num_client, item_article, item_categorie, item_prix, item_quantity ) VALUES

  (:num_client, :item_article, :item_categorie, :item_prix, :item_quantity )"; //, :item_date_depot, :item_date_retrait

    $statement = $connect->prepare($query);
    $statement->execute(array(':num_client'  => $id, ':item_article'  => $_POST["item_article"][$count],
    ':item_categorie' => $_POST["item_categorie"][$count], ':item_prix' => $_POST["item_prix"][$count], 
    ':item_quantity'  => $_POST["item_quantity"][$count] )); 
    
    //, ':item_date_depot'  => $_POST["item_date_depot"][$count], ':item_date_retrait'  => $_POST["item_date_retrait"][$count]
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>
