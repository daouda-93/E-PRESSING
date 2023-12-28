<?php
   session_start();

   if (!(isset($_SESSION['nom_prenom']))) {

       /* unset($_SESSION['username']);   session_destroy();*/
        header("location: admin.php");
   }
?>