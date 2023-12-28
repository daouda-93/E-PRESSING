<?php
     $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
    
    $req = $bdd->prepare('SELECT * FROM message WHERE lu=0');
    $req->execute();
    echo $req->rowCount();
?>