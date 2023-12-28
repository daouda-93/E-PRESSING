<?php

    $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $bdd->exec('SET NAMES utf8');

     if(empty($_GET['id']))
     {
        return;
     }

    extract ($_GET);

    $req = $bdd->prepare('UPDATE message SET lu=1 WHERE id=:id');
    $req->execute(array(':id'=>$id));

    header('location:notif_buanderie.php');exit;


?>