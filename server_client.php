<?php
        
                //var_dump( $_POST['mesage']);
        $db = mysqli_connect('localhost', 'root', '', 'p_experts');


            if(isset($_POST['btn_regis'])){

                        $nom_prenom = $_POST['nom_prenom'];

                        $adresse = $_POST['adresse'];

                        $telephone = $_POST['telephone'];

                        $email = $_POST['email'];

                        $genre = $_POST['genre'];

                        // $date = $_POST['date'];

                        
                        $query = "INSERT  INTO client (nom_prenom, adresse, telephone, email, genre, date,lu) 
                        
                        VALUES ( '$nom_prenom', '$adresse', '$telephone', '$email', '$genre', now(), 0)";

                        mysqli_set_charset($db,"utf8");

                        $reponse = mysqli_query($db, $query);


                        if($reponse)
                        {

                            header('location: liste_client.php') ;
                            
                        //echo header('location:index.php');
                        }else
                        {
                            echo
                                    "
                                    </br></br>
                                    <div style='text-align: center'>
                                        <div class='alert alert-danger'>
                                            L'enregistrement du client a échoué !!
                                            <a href='gerant.php'>Retour</a>
                                        </div> 
                                    </div>";
                        }
                }

        ?>