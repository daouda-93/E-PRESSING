<?php
	 session_start();

	// declaration variable
	$nom_prenom = "";
	// $identifaint    = "";
    $adresse = "";
    $telephone = "";
    $type_compte = "";
    $date = "";
	$errors = array(); 
	$_SESSION['success'] = "Compte créer avec succè !!";

	// connection � la base donn�e
	$db = mysqli_connect('localhost', 'root', '', 'p_experts');

	// ENREGISTREMENT DE L'UTILISATEUR
	if (isset($_POST['btn_save'])) {

		// reception tous les input values de from d'enregistrement

		$nom_prenom = mysqli_real_escape_string($db, $_POST['nom_prenom']);
        // $identifaint = mysqli_real_escape_string($db, $_POST['identifaint']);
        $adresse = mysqli_real_escape_string($db, $_POST['adresse']);
        $telephone = mysqli_real_escape_string($db, $_POST['telephone']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        $type_compte = mysqli_real_escape_string($db, $_POST['type_compte']);
        $date = mysqli_real_escape_string($db, $_POST['date']);

				//  validation des donn�es saisie dans le form

        if (empty($nom_prenom)) { array_push($errors, "nom et prenom est requise"); }
        // if (empty($identifaint)) { array_push($errors, "identifiant est requise"); }
        if (empty($adresse)) { array_push($errors, "adresse est requise"); }
        if (empty($telephone)) { array_push($errors, "telephone est requise"); }
		if (empty($password_1)) { array_push($errors, "Password est requise"); }
        if (empty($type_compte)) { array_push($errors, "Type Compte est requise"); }
        if (empty($date)) { array_push($errors, "La Date est requise"); }

		if ($password_1 != $password_2) {
			array_push ($errors, "<span class='list-group-item list-group-item-danger' align='center'><strong>Les deux mot de passe ne sont pas identique</strong></span>");
		}

		// enregistremen de l'utilisateur dans la base de donn�e si form est correcte

		if (count($errors) == 0) {
            $password = sha1($password_1);//encryptage du mot passe avant l'enregistrement dans la database

			$query = "INSERT INTO user (nom_prenom, adresse, password, telephone, type_compte, date)

			        VALUES('$nom_prenom', '$adresse', '$password', '$telephone', '$type_compte', '$date')";

			        mysqli_set_charset($db,"utf8");

			        mysqli_query($db, $query);

            header('location: ajouter_user.php');
		}

	}

?>

<!--  $_SESSION['msg'] = "Compte cr�er avec succ� !!";-->