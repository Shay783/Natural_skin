<?php
if (isset($_POST['btn-ajouter'])) {
    //connexion a la base de donnée
    $con = mysqli_connect("localhost", "root", "", "natural_skin");
    //recupere des données du formulaire
    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $bienfait_un = $_POST['bienfait_un'];
    $bienfait_deux = $_POST['bienfait_deux'];
    $bienfait_trois = $_POST['bienfait_trois'];
    $bienfait_quatre = $_POST['bienfait_quatre'];
    $conseil = $_POST['conseil'];
    $price = $_POST['price'];
    if (!empty($titre) && !empty($description) && !empty($bienfait_un) && !empty($bienfait_deux) && !empty($bienfait_trois) && !empty($bienfait_quatre) && !empty($conseil) && !empty($price)) {
        //verifier si le produit existe déjà dans la base de données
        $req1 = mysqli_query($con, "SELECT titre ,description, bienfait_un, bienfait_deux, bienfait_trois, bienfait_quatre, conseil, price FROM produit WHERE titre ='$titre' AND description = '$description' AND bienfait_un = '$bienfait_un' AND bienfait_deux = '$bienfait_deux' AND bienfait_trois = '$bienfait_trois' AND bienfait_quatre = '$bienfait_quatre' AND conseil = '$conseil' AND price = '$price'");

        if (mysqli_num_rows($req1) > 0) {
            //si le produit existe deja :
            $message = '<p style="color:red"> Le produit existe déjà </p>';
        } else {
            //sinon
            if (isset($_FILES['image'])) {
                //si une image a été télécharger :
                $img_nom = $_FILES['image']['name']; //On récupere le nom de l'image
                $tmp_nom = $_FILES['image']['tmp_name']; //Nous définission un num temporaire
                $time = time(); // On recupere l'heure actuelle
                //On renomme l'image

                $nouveau_nom_img = $time . $img_nom;

                //On deplace l'image dans le dossier img

                $deplacer_image = move_uploaded_file($tmp_nom, "../img/" . $nouveau_nom_img);

                if ($deplacer_image) {
                    //si l'image a été déplacé
                    //insérons le titre de la description et le nom de l'image dans la base de donnée
                    $req2 = mysqli_query($con, "INSERT INTO produit  VALUES (NULL,'$titre','$description','$bienfait_un', '$bienfait_deux', '$bienfait_trois', '$bienfait_quatre', '$conseil','$price','$nouveau_nom_img' )");
                    if ($req2) {
                        // si les infos ont été inséré dans la base de donnée
                        $message = '<p style="color:green">Produit ajouté !</p>';
                    } else {
                        //si non
                        $message = '<p style="color:red">Produit non ajouté !</p>';
                    }
                }
            }
        }
    } else {
        // si tous les champs ne sont pas rempli
        $message = '<p style="color:red">Veuillez complétez tous les champs </p>';
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
    <link rel="stylesheet" href="../assets/ajout_produit_detail.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="background-color:#f7d9eb;">



    <section class=" input_add">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="message">
                <?php
                if (isset($message)) {
                    //si la variable message existe, on affiche le contenu de la variable
                    echo $message;
                }
                ?>
            </div>
            
            <label>Nom du produit</label>
            <input type="text" name="titre">
            <label>Description du produit</label>
            <textarea name="description" cols="30" rows="5"></textarea>
            <label>Bienfait </label>
            <textarea name="bienfait_un" cols="10" rows="1"></textarea>

            <textarea style="margin-top:10px;" name="bienfait_deux" cols="10" rows="1"></textarea>

            <textarea style="margin-top:10px;" name="bienfait_trois" cols="10" rows="1"></textarea>

            <textarea style="margin-top:10px;" name="bienfait_quatre" cols="10" rows="1"></textarea>
            <label>Conseil d'utilisation</label>
            <textarea name="conseil" cols="30" rows="5"></textarea>
            <label>Prix</label>
            <input type="text" name="price">
            <label>Ajouter une image</label>
            <input type="file" name="image">

            <input type="submit" value="Ajouter" name="btn-ajouter">
            <a class="btn-liste-prod" href="resultat.php">Liste des produits</a>
        </form>
    </section>
</body>

</html>