<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | Pressing Experts</title>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="assets/images/log-expert.PNG" />
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/libs/css/style1.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 80px;
        padding-bottom: 40px;
    }
    body{
        background-image: url(assets/images/pressing-experts.JPG);
        background-attachment:fixed;
    }
    </style>
</head>
<body class="bg-dark">
    <div class="container" >

        <div class="card ">
            <div class="card-header text-center">
                <a href="#">
                    <img class="logo-img" src="assets/images/e-pressing.PNG" width="100" alt="logo">
                </a>
                
            </div>
                <?php

                    session_start();

                    $host = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "p_experts";
                    $message = "";
                try
                {
                    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
                    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    if(isset($_POST["btn_log"]))
                    {
                        if(empty($_POST["nom_prenom"]) || empty($_POST["password"]))
                        {
                                $message = '<label>Veuillez remplir les champs</label>';
                        }
                        else
                        {
                                $query = "SELECT * FROM user WHERE nom_prenom = :nom_prenom";
                                $statement = $connect->prepare($query);
                                $statement->execute(
                                    array(

                                        'nom_prenom'     =>     $_POST["nom_prenom"]

                                    )
                                );
                                $count = $statement->rowCount();

                                    $data = $statement->fetch();

                                    // var_dump( $data);

                                if($count > 0)
                                {
                                    if( sha1($_POST["password"]) == $data['password'])
                                    {
                                    $_SESSION["nom_prenom"] = $_POST["nom_prenom"];

                                    // header("location:login_success.php");

                                    if($data['type_compte'] == 'admin')
                                    {
                                        header('location:admin.php');
                                    }

                                    if($data['type_compte'] == 'buandeur')
                                    {
                                        header('location:buandeur.php');
                                    }

                                    if($data['type_compte'] == 'gerant')
                                    {
                                        header('location:gerant.php');
                                    }
                                    } else
                                    {
                                    
                                    echo '</br></br>
                                            <div style="text-align: center">
                                                    <div class="alert alert-danger">
                                                        Votre mot de passe est  incorrecte !!!
                                                        <a href="index.php">Connexion</a>
                                                    </div>  
                                            </div>';
                                    }

                                } else {
                                    echo '</br></br>
                                    <div style="text-align: center">
                                            <div class="alert alert-danger">
                                                Votre identifiant est  incorrecte !!!
                                                <a href="index.php">Connexion</a>
                                            </div>         
                                    </div>';
                                    }
                        }
                    }
                }
                    catch(PDOException $error)
                    {
                        $message = $error->getMessage();
                    }
                ?>
         </div>
    </div>
</div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2({ tags: true });
        });
        </script>
        <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300

            });
        });
    </script>
</body>
 
</html>