<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=natural_skin; charset=utf8', 'root', '');
// if !empty = si tous les champs ne sont pas completer faire lecho
if (isset($_POST['envoi'])) {
    if (!empty($_POST['prenom']) and !empty($_POST['nom']) and  !empty($_POST['password'] and !empty($_POST['email']))) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $password = sha1($_POST['password']);
        $email = htmlspecialchars($_POST['email']);

        $insertUser = $bdd->prepare('INSERT INTO membre_admin(prenom, nom, password,email)VALUES(?, ?, ?, ?)');
        $insertUser->execute(array($prenom, $nom, $password, $email));
        $recupUser = $bdd->prepare('SELECT * FROM membre_admin WHERE  AND prenom = ? AND nom = ? AND password = ? AND email = ? ');
        $recupUser->execute(array($prenom, $nom, $password,  $email));
        if ($recupUser->rowCount() > 0) {
            $_SESSION['prenom'] = $prenom;
            $_SESSION['nom'] = $nom;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location: membre.php');
        }
        echo "Vous etes bien inscrit veuillez vous connecter";
    } else {
        echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Veuillez saisir tous les champs
          </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natural Skin</title>
    <link rel="stylesheet" href="assets/ajout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="background-color:#f7d9eb;">

    <head>
        <a href="index.php"><img style="text-align:center;" src="../img/logo_admin.PNG" alt="" width=200></a>
    </head>

    <h2 style=" color: #EAAECF; padding-top:50px; text-align:center;">Ajouter un admin</h2>
    <section class=" input_add">
        <form method="POST" action="" enctype="multipart/form-data">

            <label>Nom</label>
            <input type=" text" name="nom">


            <label>Prénom</label>
            <input type="text" name="prenom">


            <label>Email</label>
            <input type="email" name="email">


            <label>Mot de passe</label>
            <input type="password" name="password">


            <input type="submit" value="Ajouter l'admin" class="btn-liste-prod" name="envoi">
            <a class="btn-liste-prod" href="membre.php">Liste Admin</a>

        </form>
    </section>



</body>

</html>