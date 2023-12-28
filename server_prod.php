<?php
        
                //var_dump( $_POST['mesage']);
        $db = mysqli_connect('localhost', 'root', '', 'p_experts');


            if(isset($_POST['btn_reg'])){

                        $nom = $_POST['nom'];

                        $prix_prod = $_POST['prix_prod'];

                        $stock = $_POST['stock'];

                        $date = $_POST['date'];

                        
                        $query = "INSERT  INTO produit (nom, prix_prod, stock, date) 
                        
                        VALUES ( '$nom', '$prix_prod', '$stock', '$date')";

                        mysqli_set_charset($db,"utf8");

                        $reponse = mysqli_query($db, $query);


                        if($reponse)
                        {

                            header('location: admin.php') ;
                            
                        //echo header('location:index.php');
                        }else
                        {
                            echo
                                    "
                                    </br></br>
                                    <div style='text-align: center'>
                                        <div class='alert alert-danger'>
                                            L'enregistrement du client a échoué !!
                                            <a href='forgot-password.php'>Retour</a>
                                        </div> 
                                    </div>";
                        }
                }

        ?>