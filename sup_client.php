<?php
        $dbpdo = new PDO('mysql:host=localhost;dbname=p_experts','root','');

        $pdoStat = $dbpdo->prepare('DELETE FROM client  WHERE num_client=:num LIMIT 1');

        $pdoStat->bindValue(':num',$_GET['numClient'], PDO::PARAM_INT);

        $executeIsok = $pdoStat->execute();

        header('location:admin.php');

?>
