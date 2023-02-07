<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/ajout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="background-color:#f7d9eb;">

    <?php

    //connexion a la base de donnée
    include_once "../conn.php";
    //on recup l'id dans le lien

    $id = $_GET['id'];

    //requete afficher les infos

    $req = mysqli_query($con, "SELECT * FROM produit WHERE id = '$id' ");
    $row = mysqli_fetch_assoc($req);

    if (isset($_POST['envoi'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verfier que tous les champs ont été rempli
        if (isset($titre) && isset($description) && isset($bienfait_un) && isset($bienfait_deux) && isset($bienfait_trois) && isset($bienfait_quatre) && isset($conseil) && isset($price) && isset($image)) {

            //requête de modification
            $req = mysqli_query($con, "UPDATE produit SET titre = '$titre' , description = '$description' , bienfait_un = '$bienfait_un' , bienfait_deux = '$bienfait_deux', bienfait_trois = '$bienfait_trois', bienfait_quatre = '$bienfait_quatre', conseil = '$conseil', price = '$price', image = '$image' WHERE id = $id");
            header("location: resultat.php");
            if ($req) { //si la requête a été effectuée avec succès , on fait une redirection

                if ($req) { //si la requete a été effectués avec succées, on fait une redirection
                    header("location: resultat.php");
                } else {
                    $message = "employé non modifier";
                }
            }
        }
    }
    ?>

    <h2 style=" color: #EAAECF; padding-top:50px; text-align:center;">Liste Admin</h2>
    <p class="erreur_message">

    </p>

    <section class=" input_add">
        <form method="POST" action="" enctype="multipart/form-data">


            <label>Titre</label>
            <input type="text" name="titre" value="<?= $row['titre']  ?>">


            <label>Description</label>
            <input type="text" name="description" value="<?= $row['description']  ?>">


            <label>bienfait un</label>
            <input type="text" name="bienfait_un" value="<?= $row['bienfait_un']  ?>">

            <label>bienfait deux</label>
            <input type="text" name="bienfait_deux" value="<?= $row['bienfait_deux']  ?>">

            <label>bienfait trois</label>
            <input type="text" name="bienfait_trois" value="<?= $row['bienfait_trois']  ?>">

            <label>bienfait quatre</label>
            <input type="text" name="bienfait_quatre" value="<?= $row['bienfait_quatre']  ?>">

            <label>Conseil</label>
            <input type="text" name="conseil" value="<?= $row['conseil']  ?>">

            <label>Prix</label>
            <input type="text" name="price" value="<?= $row['price']  ?>">

            <label>Image</label>
            <input type="file" name="image" value="<?= $row['image']  ?>">




            <input type="submit" value="Modifier le produit" class="btn-liste-prod" name="envoi">
        </form>
    </section>
</body>

</html>