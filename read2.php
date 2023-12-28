<?php

    $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
    $bdd->exec('SET NAMES utf8');

     if(empty($_GET['num_client']))
     {
        return;
     }

    extract ($_GET);

    $req = $bdd->prepare('UPDATE depot SET lu=1 WHERE num_client=:num_client');
    $req->execute(array(':num_client'=>$num_client));

    header('location:buandeur.php');exit;


?>