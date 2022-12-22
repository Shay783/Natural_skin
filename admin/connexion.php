<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=natural_skin;charset=utf8;", 'root', '');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['prenom']) and !empty($_POST['password'])) {
        $prenom = htmlspecialchars($_POST['prenom']);
        $password = sha1($_POST['password']);
        $recupeUser = $bdd->prepare('SELECT * FROM membre_admin WHERE prenom = ? AND password = ? ');
        $recupeUser->execute(array($prenom, $password));
        if ($recupeUser->rowCount() > 0) {
            $_SESSION['prenom'] = $prenom;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupeUser->fetch()['id'];
            header('Location: index.php');
        } else {
            echo '<div class="alert alert-danger">
            <strong> Erreur </strong> prenom ou mot de passe incorrect
          </div>';
        }
    }
    $prenom = $_POST['prenom'];
    $password = $_POST['password'];
    if ($prenom && $password) {
        $connect = mysqli_connect('localhost', 'root', '');
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
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body style="background-color: #2e1e26">


    <form method="POST" action="" class="form_connect row col-4" style="margin-left:35%; margin-top:10%; margin-bottom:50px; ">
        <div class="mb-3">
            <label for="exampleInputprenom1" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="exampleInputprenom1" aria-describedby="prenomHelp" name="prenom">

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="envoi" style="width:20%; margin-left:35%;">Connexion</button>
    </form>



</body>

</html>