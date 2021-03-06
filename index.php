<?php
session_start();
require('inc/pdo.php');
require('inc/fonction.php');
require('inc/request.php');

// Recup tout les vaccins pour affichage stats
$allUsers= recupUserStats();

// Recup tout les ajouts dans carnet pour affichage stats
$allAjout=recupVaccinsStats();


//PARTIE UTILISATEUR CONNECTED
if(!empty($_SESSION)) {

    $id= $_SESSION['user']['id'];

    $user = getUserById($id);

    include('inc/header.php'); ?>
    <section>
        <div class="container_accueil">
            <div class="wrap">
                <div class="items_accueil">
                    <div class="items_accueil_p">
                        <div class="p_items_a">
                            <?php if(!empty($user['prenom'])){ ?>
                                <p>Ravie de vous voir <?php echo $user['prenom']; ?> ! <br>
                                    Avec nous, vos donnée sont protegées </p>
                            <?php } else { ?>
                                <p>Vactolib est content de vous revoir. <br>Avec nous, vos donnée sont protegées </p>
                            <?php } ?>

                            <div class="accueil_buttons_container">
                                <a class="button_type1" href="moncarnet.php?page=1">Carnet</a>
                                <a class="button_type1" href="profil.php">Profil</a>
                            </div>
                        </div>
                    </div>
                    <div class="items_groupe">
                        <img src="asset/img/groupe.png">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="separator"></div>

    <section id="stats">
        <div class="wrap">
            <div class="title">
                <h2>Merci d'avoir choisi Vactolib !</h2>
            </div>
            <ul class="boxs">
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib1.png" alt="img1">
                    </div>
                    <div class="boxs_text">
                        <p>Recevez des rappels automatiques par SMS ou par email.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib2.png" alt="img2">
                    </div>
                    <div class="boxs_text">
                        <p>Inscription rapide et gratuite.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib3.png" alt="img3">
                    </div>
                    <div class="boxs_text">
                        <p>Accédez à votre carnet vaccinal en toute simplicité.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib4.png" alt="img4">
                    </div>
                    <div class="boxs_text">
                        <p>Retrouvez votre historique de vacination et vos documents de rappel.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section id="stats_chiffre">
        <div class="wrap">
            <div class="tache_box tache1">
                <div class="tache_para">
                    <p>Vactolib c'est...</p>
                </div>

            </div>
            <div class="tache_box tache2">
                <div class="tache_para">
                    <p class="data"><?php echo $allUsers['resultUsers'] ?></p>
                    <p>utilisateurs inscrits </p>
                </div>
            </div>
            <div class="tache_box tache3">
                <div class="tache_para">
                    <p class="data"><?php echo $allAjout['resultAjout']?></p>
                    <p>vaccins en base de donnée</p>
                </div>
            </div>
            <div class="tache_box tache4">
                <div class="tache_para">
                    <p class="data">98%</p>
                    <p>d'avis positifs</p>
                </div>
            </div>
        </div>
    </section>

    <section id="donnes_secure">
        <div class="wrap">
            <div class="container_secure">
                <div class="ds_text">
                    <div class="items_secure">
                        <h2>Chez Vactolib votre Santé, <br>C’est aussi vos données.</h2>
                        <p>La confidentialité de vos informations personnelles est une priorité absolue pour Vactolib et guide notre action au quotidien.</p>
                    </div>
                    <div class="logo_coffre">
                        <img src="asset/img/coffret%20fort.png" alt="coffre fort">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else {
    //PARTIE UTILISATEUR PAS CONNECTED
    include('inc/header.php'); ?>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/responsive.css">
    <section>
        <div class="container_accueil">
            <div class="wrap">
                <div class="items_accueil">
                    <div class="items_accueil_p">
                        <div class="p_items_a">
                            <p>Vactolib est une application <br>
                                permettant de vous retrouver dans vos différents vaccins.</p>
                        </div>
                        <div class="accueil_buttons_container">
                            <div class="button_type1">
                                <a href="register.php">Inscription</a>
                            </div>
                            <div class="button_type1">
                                <a href="login.php">Connexion</a>
                            </div>
                        </div>

                    </div>
                    <div class="items_groupe">
                        <img src="asset/img/groupe.png">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="separator">
    </div>
    <section id="stats">
        <div class="wrap">
            <div class="tache"></div>
            <div class="title">
                <h2>Pourquoi prendre Vactolib ?</h2>
            </div>
            <ul class="boxs">
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib1.png" alt="img1">
                    </div>
                    <div class="boxs_text">
                        <p>Recevez des rappels automatiques par SMS ou par email.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib2.png" alt="img2">
                    </div>
                    <div class="boxs_text">
                        <p>Inscription rapide et gratuite.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib3.png" alt="img3">
                    </div>
                    <div class="boxs_text">
                        <p>Accédez à votre carnet vaccinal en toute simplicité.</p>
                    </div>
                </li>
                <li>
                    <div class="img">
                        <img src="asset/img/pq_vactolib4.png" alt="img4">
                    </div>
                    <div class="boxs_text">
                        <p>Retrouvez votre historique de vacination et vos documents de rappel.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section id="stats_chiffre">
        <div class="wrap">
            <div class="tache_box tache1">
                <div class="tache_para">
                    <p>Vactolib c'est...</p>
                </div>

            </div>
            <div class="tache_box tache2">
                <div class="tache_para">
                    <p><?php echo $allUsers['resultUsers'] ?></p>
                    <p>utilisateurs inscrits </p>
                </div>
            </div>
            <div class="tache_box tache3">
                <div class="tache_para">
                    <p><?php echo $allAjout['resultAjout']?></p>
                    <p>vaccins en base de donnée</p>
                </div>
            </div>
            <div class="tache_box tache4">
                <div class="tache_para">
                    <p>98% d'avis positifs</p>
                </div>
            </div>
        </div>
    </section>

    <section id="donnes_secure">
        <div class="wrap">
            <div class="container_secure">
                <div class="ds_text">
                    <div class="items_secure">
                        <h2>Chez Vactolib votre Santé, <br>C’est aussi vos données.</h2>
                        <p>La confidentialité de vos informations personnelles est une priorité absolue pour Vactolib et guide notre action au quotidien.</p>
                    </div>
                    <div class="logo_coffre">
                        <img src="asset/img/coffret%20fort.png" alt="coffre fort">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php include ('inc/footer.php');
