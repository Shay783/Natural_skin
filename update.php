<?php
session_start();
//connexion à la base de donnée
$bdd = mysqli_connect("localhost:3306", "root", "", "natural_skin");
//  //on récupère le id dans le lien

// Récupère l'ID de l'utilisateur en tant qu'entier

$id = $_GET['id'];

//   //requête pour afficher les infos d'un employé

$req = mysqli_query($bdd, "SELECT * FROM users Where id = '$id' ");
$client = mysqli_fetch_assoc($req);


//vérifier que le bouton ajouter a bien été cliqué
if (isset($_POST['button'])) {
   // Extraction des informations envoyées dans des variables par la méthode POST
   extract($_POST);
   // Vérification que tous les champs ont été remplis
   $req = "update users set lastname = '$_POST[lastname]', name = '$_POST[name]', email = '$_POST[email]', password = .md5( '$_POST[password]).'";
   $success =   '<div class="alert alert-success alert-dismissible fade show">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                <strong>User Updated!</strong></div>';
   mysqli_query($bdd, $req);
   if (isset($lastname) && isset($name) && isset($email)  && isset($password)) {
      // Requête de modification
      $req = mysqli_query($bdd, "UPDATE users SET lastname = '$lastname', name = '$name', email = '$email', password = '$password' WHERE id = '$id'");
      if ($req) { // Si la requête a été effectuée avec succès, on fait une redirection
         header("Location: profile.php");
      } else { // Sinon
         $message = "Profil non modifié";
      }
   } else {
      // Sinon
      $message = "Veuillez remplir tous les champs !";
   }
}

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

   <section class="form-container">
     
      <form action="" method="post" enctype="multipart/form-data">
         
         <h3>Mettre À Jour Le Profil</h3>
         <p>Prénom</p>
         <input type="text" name="name" maxlength="50" class="box" value="<?= $client['name'] ?>">
         <p>Nom de famille</p>
         <input type="text" name="lastname" maxlength="50" class="box" value="<?= $client['lastname'] ?>">
         <p>Email</p>
         <input type="email" name="email" maxlength="50" class="box" value="<?= $client['email'] ?>">
         <p>Mot de passe précédent</p>
         <input type="password" name="password" maxlength="20" class="box" value="<?= $client['password'] ?>">
         <p>Nouveau mot de passe</p>
         <input type="password" name="password" placeholder="Entrer le mot de passe" maxlength="20" class="box">
         <p>Confirmez le mot de passe</p>
         <input type="password" name="password" placeholder="Confirmez le mot de passe" maxlength="20" class="box">

         <input type="submit" value="Mettre À Jour Le Profil" name="button" class="btn">
      </form>

   </section>



   <!-- custom js file link  -->
   <script src="js/script.js"></script>


</body>

</html>