<?php

    $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM message  WHERE id=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numContact'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:liste_notif_buanderie_admin.php');

?>
