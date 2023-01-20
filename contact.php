<?php
require(__DIR__ . '/vendor/autoload.php');

use Mailjet\Client;
use Mailjet\Resources;

define('API_USER', '66e48d2e40d1de38b439ecc438573c63');
define('API_LOGIN', 'ed322234848d403e67cbf4313067dea6');
$mj = new Client(API_USER, API_LOGIN, true, ['version' => 'v3.1']);

$bdd = new PDO('mysql:host=localhost; dbname=natural_skin', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => "shaymae.ourahou@yahoo.com",
                        'Name' => "shayy"
                    ],
                    'To' => [
                        [
                            'Email' => "shaymae.ourahou@outlook.com",
                            'Name' => "shay"
                        ]
                    ],
                    'Subject' => "Demande de renseignement",
                    'TextPart' => "$email, $message",
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
        echo '<div class="alert alert-success" align="center" style=" text-align: center;">
            <strong> Super </strong> Email envoyé avec succés !
          </div>';
    } else {
        echo '<div class="alert alert-danger" align="center" style=" text-align: center;">
            <strong> Erreur </strong> Email non valide
          </div>';
    }
} 
?>

<?php
session_start();
// echo $_SESSION['id'];
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
    <link rel="stylesheet" href="asset/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="img/icon_ns.PNG" rel="icon">


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


        <nav>
            <ul>
                <li><a href="savon.php">Savon</a></li>
                <li><a href="">Gamme visage</a></li>
                <li><a href="">Coffret</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href=""><i class="fa-sharp fa-solid fa-basket-shopping"></i></a></li>


            </ul>
        </nav>
    </header>

    <div class="body_contact" style="background-color: #FBF1F7;">

        <div class="container">
            <form class="contact" action="" method="POST" style="">

                <h1 style="color:#eec5da; margin-top:20px;">Nous contacter</h1>
                <div class="row col-11" style="margin-top:50px; ">
                    <label for="">Nom</label>
                    <input type=" text" name="nom" style="height:45px" ;>
                </div>
                <div class=" row col-11" style="margin-top:50px;">
                    <label for="">Prénom</label>
                    <input type=" text" name="prenom" style="height:45px">
                </div>
                <div class="row col-11" style="margin-top:50px;">
                    <label for="">Email</label>
                    <input type="email" name="email" style="height:45px" autocomplete="off">
                </div>

                <div class="row col-11" style="margin-top:50px;">
                    <label for="">Votre Message</label>
                    <textarea name="message" id="" cols="60" rows="10"></textarea>
                </div>
                <button style="margin-top:40px;  margin-bottom: 30%;" type=" submit" name="envoi" class="btn btn--info row col-11">Envoyer</button>


        </div>
    </div>


    </form>



















































    <footer id="footer">
        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Shaymae</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                Designed by <a href="file:///C:/Users/EDW/index.html">Shaymae Ourahou</a>
            </div>
        </div>
    </footer>
</body>

</html>