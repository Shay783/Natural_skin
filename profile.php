<?php
// Connexion à la base de données
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=natural_skin;charset=utf8;", 'root', '');
// Vérifie si l'ID de l'utilisateur est défini et est supérieur à 0
if (isset($_GET['id']) and $_GET['id'] > 0) {
    // Récupère l'ID de l'utilisateur en tant qu'entier
    $getid = intval($_GET['id']);
    // Prépare une requête pour récupérer les informations de l'utilisateur
    $requser = $bdd->prepare('SELECT * FROM users WHERE lastname = ? AND id = ?');
    // Exécute la requête en utilisant l'ID de l'utilisateur
    $requser->execute(array($getid));
    // Récupère les informations de l'utilisateur
    $username = $requser->fetch();
}
// Inclut le fichier de navigation
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./asset/profile.css">
</head>

<body>

    <section class="user-profile">
        <h1 class="heading">Compte de <?= $_SESSION['name'] ?></h1>

        <div class="info">
            <div class="user">
                <h3>
                    <?= $_SESSION['name'] ?></h3>
                <h1><?= $_SESSION['lastname'] ?></h1>
<h5 class="title" style="font-size: 15px;"><?= $_SESSION['email'] ?> </h5>
                <p>Client</p>
                <a href="update.php?id=<?= $_SESSION['id']; ?>" class="inline-btn">Mettre à jour mon profile</a>
            </div>
        </div>  
        <br><br>
    
    </section>


    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>
<?php
?>