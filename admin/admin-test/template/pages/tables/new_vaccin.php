<?php
session_start();
require('../../../../../inc/pdo.php');
require('../../../../../inc/fonction.php');
require('../../../../../inc/request.php');

$errors = [];
if(!empty($_POST['submitted'])){

    $nom_vaccin = cleanXss('nom_vaccin');
    $laboratoire = cleanXss('laboratoire');
    $description = cleanXss('description');
    $rappel = cleanXss('rappel');


    $errors = textValidation($errors, $nom_vaccin, 'nom_vaccin', 3, 255);
    $errors = textValidation($errors, $laboratoire, 'laboratoire', 3, 50);
    $errors = textValidation($errors, $description, 'description', 3, 450);
    $errors = textValidation($errors, $rappel, 'rappel', 1, 11);

    if(count($errors) == 0){

    $sql = "INSERT INTO vactolib_vaccins
    (nom_vaccin, laboratoire, description, rappel)
    VALUES (:nom_vaccin, :laboratoire, :description, :rappel";
    $query = $pdo->prepare($sql);
    $query->bindValue(':nom_vaccin', $nom_vaccin, PDO::PARAM_STR);
    $query->bindValue(':laboratoire', $laboratoire, PDO::PARAM_STR);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':rappel', $rappel, PDO::PARAM_INT);
    $query ->execute();
    die ("ok");
//    header('Location: index.php');
    }else{
    debug($errors);
    }
}

if ($_SESSION['user']['status']=='admin'){

include('../../inc/header.php'); ?>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ajout d'un vaccin</h4>
                            <!-- FORMULAIRE DE MODIFICATION -->

                            <form method="post" role="form" id="contact-form" class="contact-form">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="form-label">Nom du vaccin :</label>
                                            <input type="text" class="form-control" name="nom_vaccin" value="<?php recupInputValue('nom_vaccin') ?>" id="nom_vaccin" placeholder="nom vaccin">
                                            <span class="text-danger"><?php viewError($errors, 'nom_vaccin'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="form-label">Laboratoire :</label>
                                            <input type="text" class="form-control" name="laboratoire" value="<?php recupInputValue('laboratoire') ?>" id="laboratoire" placeholder="laboratoire">
                                            <span class="text-danger"><?php viewError($errors, 'laboratoire'); ?></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="form-label">Nombre de jours avant rappel :</label>
                                            <input type="number" class="form-control" name="rappel" value="<?php recupInputValue('rappel') ?>" id="rappel" placeholder="rappel">
                                            <span class="text-danger"><?php viewError($errors, 'rappel'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="form-label">Description :</label>
                                            <textarea class="form-control textarea" rows="4" name="description" id="description" placeholder="Description"><?php recupInputValue('description') ?></textarea>
                                            <span class="text-danger"><?php viewError($errors, 'description'); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" name="submitted" class="btn btn-primary float-right" value="Ajouter">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include('../../inc/footer.php'); } else{die('403');} ?>