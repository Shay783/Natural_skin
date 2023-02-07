<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=natural_skin;charset=utf8;", 'root', '');
if (isset($_POST['envoi'])) {
    if (!empty($_POST['email']) and !empty($_POST['password'])) {
        $email = htmlspecialchars($_POST['email']);
        $password = sha1($_POST['password']);
        $recupeUser = $bdd->prepare('SELECT * FROM users WHERE email = ? AND password = ? ');
        $recupeUser->execute(array($email, $password));
        if ($recupeUser->rowCount() > 0) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $recupeUser->fetch()['id'];
            header('Location: savon.php');
        } else {
            echo '<div class="alert alert-danger">
            <strong> Erreur </strong> email ou mot de passe incorrect
          </div>';
        }
    }
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email && $password) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="asset/connexion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>



<body>

    <header>
        <div class="ligne">
            <marquee behavior="scroll" direction="left">
                <span><i class="fa-solid fa-heart"></i> FRAIS DE PORT OFFERT A PARTIR DE 50€ •</span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ • </span>
                <span>FRAIS DE PORT OFFERT A PARTIR DE 50€ <i class="fa-solid fa-heart"></i> • </span>
            </marquee>
        </div>
    </header>

    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form method="POST" action="" class="login">


                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input type="email" name="email" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input type="password" name="password" class="login__input" placeholder="Password">
                    </div>
                    <button class="button login__submit" type="submit" value="Connexion" name="envoi">
                        Connexion
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
                 <p>Vous n'avez pas de compte <a href="register.php">Inscrivez vous</a></p>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>



</body>

</html>