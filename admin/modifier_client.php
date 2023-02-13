<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/ajout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="background-color:#f7d9eb;">

    <?php

    //connexion a la base de donnée
    include_once "conn.php";
    //on recup l'id dans le lien

    $id = $_GET['id'];

    //requete afficher les infos

    $req = mysqli_query($con, "SELECT * FROM users WHERE id = '$id' ");
    $row = mysqli_fetch_assoc($req);

    if (isset($_POST['envoi'])) {
        //extraction des informations envoyé dans des variables par la methode POST
        extract($_POST);
        //verfier que tous les champs ont été rempli
        if (isset($lastname) && isset($name) && isset($email)) {

            //requête de modification
            $req = mysqli_query($con, "UPDATE users SET lastname = '$lastname' , name = '$name' , email = '$email' WHERE id = $id");
            header("location: client.php");
            if ($req) { //si la requête a été effectuée avec succès , on fait une redirection

                if ($req) { //si la requete a été effectués avec succées, on fait une redirection
                    header("location: client.php");
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


            <label>Nom</label>
            <input type="text" name="lastname" value="<?= $row['lastname']  ?>">


            <label>Prénom</label>
            <input type="text" name="name" value="<?= $row['name']  ?>">


            <label>Email</label>
            <input type="email" name="email" value="<?= $row['email']  ?>">


            <input type="submit" value="Modifier le client" class="btn-liste-prod" name="envoi">
        </form>
    </section>
</body>

</html>