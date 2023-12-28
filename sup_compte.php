<?php
        $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM user  WHERE id=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numUser'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:admin.php');

?>
