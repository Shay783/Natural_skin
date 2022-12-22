<?php
session_start();
if (!$_SESSION['password']) {
    header('location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="assets/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>


<body>

    <body style="background-color: #2e1e26">
        <div class="row">
            <div class="col-md-4">

                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Admin
                    </div>
                    <ul class="list-group list-group-flush" style="color: black;">
                        <li class="list-group-item"><a href="membre.php">Membres</a></li>
                        <li class="list-group-item"><a href="client.php">Clients</a></li>
                        <li class="list-group-item"><a href="ajout_membre.php">Ajouter un membre</a></li>
                        <li class="list-group-item"><a href="ajout_clients.php">Ajouter un client</a></li>
                        <li class="list-group-item"><a href="ajout_produit.php">Ajouter un nouveau produit</a></li>

                        <li class="list-group-item"><a href="logout.php" class="btn btn-primary">Déconnexion</a></li>
                    </ul>
                </div>

            </div>
        </div>








    </body>



</html>