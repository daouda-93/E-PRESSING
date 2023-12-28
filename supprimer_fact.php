<?php
        $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM facture  WHERE id=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numFacture'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:etat_facture.php');

?>
