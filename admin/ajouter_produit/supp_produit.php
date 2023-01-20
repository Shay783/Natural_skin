<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=natural_skin', 'root', '');
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupProduct = $bdd->prepare('SELECT * FROM produit WHERE id= ?');
    $recupProduct->execute(array($getid));
    if ($recupProduct->rowCount() > 0) {
        $bannirProduct = $bdd->prepare('DELETE FROM produit WHERE id = ?');
        $bannirProduct->execute(array($getid));
        header('location: resultat.php');
    } else {
        echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Aucun produit trouvé
          </div>';
    }
} else {
    echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Identifiant non récuperé
          </div>';
}
