        <!-- ============================================================== -->
        <!-- Début navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="gerant.php">E-pressing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Boutton imprimer -->
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <button type="button" onclick="printContent('div1')" class="btn btn-primary" data-dismiss="modal" title="Impression"><i class="fas fa-print"></i> Imprimer</button> 
                            </div>
                        </li>

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell" title="Notifications de la buanderie"></i> <span class="indicator"><strong style="color: red;"><?php include('check.php')?></strong></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Nouvelle Notification de la Buanderie</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                        <?php
                                                $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                                $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                                $bdd->exec('SET NAMES utf8');

                                                $req = $bdd->prepare('SELECT * FROM message WHERE lu=0');
                                                $req->execute();

                                            while ($data = $req->fetch(PDO::FETCH_OBJ)):?>

                                            <a href="notif_buanderie.php" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <?php echo "<img src='assets/images/user.jpg' class='user-avatar-md rounded-circle' alt=''/>";?>
                                                    </div>

                                                        <div class="notification-list-user-block">
                                                            <span class="notification-list-user-name"><?php echo $data->nom_prenom;?> : </span><?php echo  $data->message;?>.
                                                    <div class="notification-date"><?php echo $data->date;?></div>
                                                    </div>
                                                  
                                                </div>
                                            </a>
                                            <?php endwhile;?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"></div>
                                </li>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                                <!-- More -->
                         <!-- ============================================================== -->
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <!-- <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt="" > <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt="" > <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt="" > <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt="" ><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt="" > <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">Voir</a></div>
                                </li> -->
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User login -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/user.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info" align="center">
                                    <img src="assets/images/user.jpg" alt="" class="user-avatar-md rounded-circle"></br>
                                    <span class="status"></span><span class="ml-2">Connecté</span>
                                </div>
                                <a class="dropdown-item" href="gerant.php">
                                    <i class="fas fa-user mr-2"></i>
                                    <?php
                                        $connect = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');

                                        if (isset($_SESSION['nom_prenom'])){

                                            echo $_SESSION['nom_prenom'];
                                        }
                                    ?>
                                </a>
                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Déconnexion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- Fin navbar -->
        <!-- ============================================================== -->
         <!-- Modal Client-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header" align="center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                        </button>
                        <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">            
                        <h4 class="mb-0"><strong>INFORMATIONS DU CLIENT</strong></h4>
                    </div>
                    <div class="card-body">
                        <form  method="POST" action="server_client.php">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Nom & Prénoms</label>
                                    <input type="text" class="form-control" name="nom_prenom" placeholder="" required="required" >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Adresse Client</label>
                                    <input type="text" class="form-control" name="adresse" placeholder=""  >
                                </div>
                               </div>

                            <div class="row">
                               <div class="col-md-6 mb-3">
                                    <label for="addresse">Téléphone<span class="text-muted"> (Whatsapp)</span></label>
                                    <input type="number" class="form-control" name="telephone" placeholder="" required="required" >
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="number">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="" >
                                    </div>
                                 </div>

                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <label for="country">Genre de Client</label>
                                    <select class="custom-select d-block w-100" name="genre" required="required" >
                                            <option value="">Choisir le genre...</option>
                                            <option>Homme</option>
                                            <option>Femme</option>
                                    </select>
                                </div>
                            </div>
                                <button class="btn btn-primary btn-lg btn-block" name="btn_regis" type="submit">Enregistrer Client</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Début left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="gerant.php">Tableeau de Bord</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                                                        
                            <li class="nav-divider">
                                <a class="nav-link active" href="gerant.php" ><i class="fa fa-fw fa-home"></i>Tableeau de Bord</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5" title="Action sur clients"><i class="fas fa-f fas fa-users"></i>Gestion Clients</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#" title="Enregistrement du client">Ajouter client</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link"  href="liste_client.php" title="Consulter la liste des clients">Lister clients</a> 
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4" title="Action sur facture des clients"><i class="fab fa-fw fa-wpforms"></i>Gestion Factures</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="editer_facture.php" title="Editer une facture d'un client">Editer factures</a>
                                        </li> 
                                        <li class="nav-item">
                                            <a class="nav-link" href="liste_facture.php" title="Consulter la liste des factures enregistrés">Lister factures</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="liste_facture_regle.php" title="Consulter la liste des factures réglés">Factures réglés</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3" title="Action sur Articles de linge"><i class="fas fa-edit"></i>Gestion Articles</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="depot.php" title="Efectuer un dépot d'article">Dépot Articles</a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="planing_retrait.php" title="Consulter la liste des linges non rétirer">Planing retraits</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="linge_retire.php" title="Consulter la liste des linges rétirés">Liste des retraits</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="notif_buanderie.php" title="Consulter la liste des notifications de la buanderie">Liste notifications</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Fin left sidebar -->
        <!-- ============================================================== -->