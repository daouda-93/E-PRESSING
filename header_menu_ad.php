        <!-- ============================================================== -->
        <!-- Début navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="admin.php">E-pressing</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!-- Boutton imprimer -->
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <button type="button" onclick="printContent('div1')" class="btn btn-primary" data-dismiss="modal" title="Impression"><i class="fas fa-print"></i> Imprimer</button> 
                            </div>
                        </li>

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell" title="Consulter liste des notifications de la buanderie"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notifications de la Buanderie</div>
                                        <div class="notification-list">
                                                <div class="list-group">
                                                    <?php
                                                            $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                                            $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                                            $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                                            $bdd->exec('SET NAMES utf8');
                        
                                                            $req = $bdd->prepare('SELECT * FROM message ORDER by id desc');
                                                            $req->execute();

                                                        while ($data = $req->fetch(PDO::FETCH_OBJ)):?>

                                                        <a href="liste_notif_buanderie_admin.php" class="list-group-item list-group-item-action active">
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
                                            <a href="#" class="connection-item"><button type="button" onclick="printContent('div1')" class="btn btn-primary" data-dismiss="modal" title="Impression"><i class="fas fa-print"></i></button> <span>Imprimer</span></a>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><button type="button"  class="btn btn-primary" data-dismiss="modal" title="Exporter sur fichier Excel"><i class="fas fa-download"></i></button> <span>Exporter</span></a>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><button type="button"  class="btn btn-primary" data-dismiss="modal" title="Exporter sur fichier Excel"><i class="fas fa-download"></i></button> <span>Boutton</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"></div>
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
                                <a class="dropdown-item" href="#.php">
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

        <!-- ============================================================== -->
         <!-- Modal Utilisateurs-->
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                    </button>
                        <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">             -->
                        <h4 class="mb-0"><strong>LISTE DES COMPTES UTILISATEURS</strong></h4>
                    </div>                    
                        <div class="card-body">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                $bdd->exec('SET NAMES utf8');
                                $reponse = $bdd->query('SELECT * FROM user order by id desc ');

                                     echo"
                                         <thead>
                                            <tr>
                                                <th>Utilisateur</th>
                                                <th>Adresse</th>
                                                <th>Contact</th>
                                                <th>Rôle User</th>
                                                <th>Enregistré</th>
                                                <th style='color: green'>Edite</th>
                                                <th style='color: red'>Delete</th>
                                            </tr>
                                         </thead>";

                                                    // corps du tableau

                                    while ($donnees = $reponse->fetch())
                                        {
                                             echo"
                                                <tbody>
                                                     <tr>
                                                        <td>".$donnees['nom_prenom']."</td>
                                                        <td>".$donnees['adresse']."</td>
                                                        <td>".$donnees['telephone']."</td>
                                                        <td>".$donnees['type_compte']."</td>
                                                        <td>".$donnees['date']."</td>
                                                        <td><a href='profile.php?numUser=".$donnees['id']."'><button type='button' class='btn btn-success btn-sm add'><i title='modifier le compte' class='fas fa-edit'></i></button></a></td>
                                                        <td><a href='sup_compte.php?numUser=".$donnees['id']."'><button type='button' class='btn btn-danger btn-sm remove' title='Supprimer le compte'><i class='fas fa-trash-alt'></i></button></td>
                                                     <tr>
                                                </tbody>";
                                         }
                                ?> 
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal produits-->
        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header" align="center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                        </button>
                        <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">             -->
                        <h4 class="mb-0"><strong>LISTE DES PRODUITS DE LINGE</strong></h4>
                    </div>                    
                        <div class="card-body">
                        <table id="example4" class="table table-striped table-bordered" style="width:100%">
                            <?php
                                $bdd = new PDO('mysql:host=localhost;dbname=p_experts', 'root', '');
                                $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
                                $bdd->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);
                                $bdd->exec('SET NAMES utf8');
                                $reponse = $bdd->query('SELECT * FROM produit order by id desc ');

                                     echo"
                                         <thead>
                                            <tr align='center'>
                                                <th>Nom Produit</th>
                                                <th>Prix Produit</th>
                                                <th>Stock Produit</th>
                                                <th>Enregistré</th>
                                                <th style='color: green'>Actions</th>
                                            </tr>
                                         </thead>";

                                                    // corps du tableau

                                    while ($donnees = $reponse->fetch())
                                        {
                                             echo"
                                                <tbody>
                                                     <tr align='center'>
                                                        <td>".$donnees['nom']."</td>
                                                        <td>".$donnees['prix_prod']." FCFA</td>
                                                        <td>".$donnees['stock']."</td>
                                                        <td>".$donnees['date']."</td>
                                                        <td>
                                                            <a href='modifier_produit.php?numProduit=".$donnees['id']."'><button type='button' class='btn btn-secondary btn-sm add'><i title='modifier le produit de linge' class='fas fa-edit'></i></button></a>
                                                            <a href='sup_produit.php?numPoduit=".$donnees['id']."'><button type='button' class='btn btn-danger btn-sm remove' title='Supprimer le produit de linge'><i class='fas fa-trash-alt'></i></button>
                                                        </td>
                                                     <tr>
                                                </tbody>";
                                         }
                                ?> 
                            </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal Articles-->
         <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header" align="center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                        </button>
                        <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">             -->
                        <h4 class="mb-0"><strong>INFORMATIONS SUR ARTICLES DE LINGE</strong></h4>
                    </div>
                    <div class="card-body">
                    <form method="post" action="server_artic.php" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nom Article</label>
                                <input type="text" class="form-control" name="nom_art" placeholder="" value="" required="">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Prix Article</label>
                                <input type="number" class="form-control" name="prix_art" placeholder="" value="" required="">
                            </div>
                            
                            </div>
                                                
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <label for="country">Catégorie</label>
                                    <select class="custom-select d-block w-100" name="catego" required="">
                                        <option value="">Choisir....</option>
                                        <option>Adulte</option>
                                        <option>Enfant</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="state">Photo</label>
                                        <input type="file" class="form-control" name="fichier" placeholder="" required="">
                                    </div>
                                </div>
                                              
                                <button class="btn btn-primary btn-lg btn-block" name="btn_reg"  type="submit">ENREGISTRER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal produits de linge-->
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="card">
                    <div class="card-header" align="center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                    </button>
                        <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">             -->
                        <h4 class="mb-0"><strong>INFORMATIONS SUR PRODUIT</strong></h4>
                    </div>
                    <div class="card-body">
                    <form method="post" action="server_prod.php" >
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName">Nom Produit</label>
                                <input type="text" class="form-control" name="nom" placeholder="" required="">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="email">Prix Produit</label>
                                <input type="number" class="form-control" name="prix_prod" placeholder=""  required="">
                            </div>
                            
                            </div>
                                                
                            <div class="row">
                                <div class="col-md-6 mb-5">
                                    <label for="state">Quantité Stock</label>
                                        <input type="number" class="form-control" name="stock" placeholder="" required="">
                                </div>

                                <div class="col-md-6 mb-5">
                                    <label for="country">Date du jour</label>
                                    <input type="date" class="form-control" name="date" placeholder="" required="">
                                </div>
                            </div>
                                              
                                <button class="btn btn-primary btn-lg btn-block" name="btn_reg"  type="submit">ENREGISTRER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal Liste Articles-->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="card">
                        <div class="card-header" align="center">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true"><img src="assets/images/annuler.png"  width="30" height="25" /></span>
                        </button>
                            <!-- <img class="logo-img" src="assets/images/pressing_experts.PNG" alt="logo">             -->
                            <h4 class="mb-0"><strong>LISTE DES GRILLES TARIFAIRES DE LINGE</strong></h4>
                        </div>
                            <div class="card-body">
                                <table id="example4" class="table table-striped table-bordered" style="width:100%">
                         
                                    <?php
                                        $Host ="localhost";
                                        $uname = "root";
                                        $pwd = '';
                                        $db_name = "p_experts";
                                        
                                        $file_path = 'files/'; /* chemin du dossier de fichier */
                                        $result = mysqli_connect($Host,$uname,$pwd) ;
                                        mysqli_select_db($result,$db_name);
                                        $image_query = mysqli_query($result,"select id, name, file_url, nom_art, prix_art, catego  from  article");
                                        
                                        echo"
                                        <thead>
                                            <tr align='center'>
                                                <th>Photo</th>
                                                <th>Désignation</th>
                                                <th>Prix</th>
                                                <th>Catégorie</th>
                                                <th style='color: red'>Action</th>
                                            </tr>
                                        </thead>";

                                        while($rows = mysqli_fetch_array($image_query))
                                        {
                                            $id_src = $rows['id'];/* chemin du fichier dans bd */
                                            $img_src = $rows['file_url'];/* chemin du fichier dans bd */
                                            $nom_art_img = $rows['nom_art']; /* nom article */
                                            $prix_art_img = $rows['prix_art'];/* prix article*/
                                            $catego_img = $rows['catego']; /* catégorie */
                                            
                                        ?>
                                        
                                        <?php 
                                            echo"
                                                <tbody>
                                                    <tr align='center'>
                                            
                                                        <td align='center'><img src='$img_src'  alt=''  width='90' higth='50'></td>

                                                        <td>$nom_art_img</td>

                                                        <td> $prix_art_img FCFA</td>

                                                        <td>$catego_img</td>

                                                        <td  align='center'><a href='sup_art.php?numContact=  $id_src'><button type='button' class='btn btn-danger btn-sm remove' title='Supprimer article'><i class='fas fa-trash-alt'></i></button></td>
                                                    <tr>
                                                 </tbody>";
                                            ?>
                                        <?php
                                        }
                                    ?>     
                                </table>
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
                    <a class="d-xl-none d-lg-none" href="admin.php">Tableeau de Bord</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                                                        
                            <li class="nav-divider">
                                <a class="nav-link active" href="admin.php" ><i class="fa fa-fw fa-home"></i>Tableeau de Bord</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3" title="Articles de linge"><i class="fas fa-edit"></i>Gestion Articles</a>
                                <div id="submenu-3" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal1" href="#" title="Ajouter une grille tarifaire de linge">Ajouter tarifs</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal2" href="#" title="Consulter la liste des grilles tarifaires de linge">Grille tarifaire</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="linge_effectuer.php" title="Consulter la liste des linges non retiré au niveau de la caisse">Planing retraits</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="liste_retrait_linge.php" title="Consulter la liste des linges rétirés par les clients">liste des retraits</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="planing_linge_effectuer.php" title="Consulter la liste des linges effectué au niveau de la buanderie">Planing linges éffectué</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="planing_linge_traitement.php" title="Consulter la liste des linges en cours de traitement au niveau de la buanderie">Planing linges traitement</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4" title="Produits de linge"><i class="fab fa-fw fa-wpforms"></i>Gestion Produits</a>
                                <div id="submenu-4" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal3" href="#" title="Ajouter des produits de linge à la buanderie">Ajouter produit</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal4" href="#" title="Consulter la liste des produits de linge à la buanderie">Liste produits</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-14" aria-controls="submenu-14" title="Action sur factions"><i class="fas fa-f fa-address-card"></i>Gestion Factures</a>
                                <div id="submenu-14" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="etat_facture.php" title="Consulter liste des factures enregistrés">Liste Factures</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" href="liste_facture_regle_adm.php" title="Consulter liste des factures réglés">Factures Réglés </a>
                                        </li>                       
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10" title="Création des comptes utilisateurs"><i class="fas fa-f fas fa-users"></i>Gestion Comptes</a>
                                <div id="submenu-10" class="collapse submenu" >
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="ajouter_user.php" title="Créer un compte utilisateur">Créer user</a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="modal" data-target="#exampleModal" href="#" title="Consulter la liste des compts utilisateurs">Liste user </a>
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