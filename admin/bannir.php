<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=natural_skin', 'root', '');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM membre_admin WHERE id= ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {
        $bannirUser = $bdd->prepare('DELETE FROM membre_admin WHERE id = ?');
        $bannirUser->execute(array($getid));
        header('location: membre.php');
    } else {
        echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Aucun membre trouvé
          </div>';
    }
} else {
    echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Identifiant non récuperé
          </div>';
}
