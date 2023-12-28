<?php
        $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM regle_facture  WHERE id=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numFacture'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:liste_facture_regle_adm.php');

?>
