<?php
        $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM article  WHERE id=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numContact'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:admin.php');

?>
