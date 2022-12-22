<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=natural_skin', 'root', '');
if (!$_SESSION['password']) {
    header('location: connexion.php');
}

if (isset($_POST['envoi'])) {
    if (!empty($_PODT['titre']) and !empty($_POST['description'])) {
        $titre = htmlspecialchars($_POST['titre']);
        $description = nl2br(htmlspecialchars($_POST['description']));

        $insererProduit = $bdd->prepare('INSERT INTO produit (titre, description)VALUES(?, ?)');
        $insererProduit->execute(array($titre, $description));
        echo '<div class="alert alert-success" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Le produit a bien été ajouté
          </div>';
    } else {
        echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Veuillez completer tous les champs
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
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>


    <section class="input_add">
        <form action="" method="POST" enctype="multipart/form-data">
            <label>Nom du produit</label>
            <input type="text" name="titre"><br>
            <label>Description du produit</label>
            <textarea name="description" cols="30" rows="10"></textarea><br>
            <label>Ajouter une image</label>
            <input type="file" name="image"><br>
            <input type="submit" value="Ajouter" name="btn-ajouter">
            <a href="" class="btn-liste-prod">Liste des produits</a>

        </form>
    </section>




</body>

</html>