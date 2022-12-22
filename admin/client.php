<?php
session_start();
$bdd = new PDO('mysql:host=localhost; dbname=natural_skin', 'root', '');
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
    <title>Natural Skin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Catamaran&family=Jura:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>


    <div class="content">
        <h2 style="text-align:center; margin-bottom:50px; margin-top:50px;">Les clients</h2>
        <!-- Afficher tous les membres -->


        <table class="table table-dark table-hover">

            <thead>
                <td>Id</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>Pseudo</td>
                <td>Email</td>
                <td>Action</td>
            </thead>

            <?php
            $recupUsers = $bdd->query('SELECT * FROM users');
            while ($user = $recupUsers->fetch()) :
            ?>

                <tbody>
                    <td> <?= $user['id']  ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td> <?= $user['name']  ?></td>
                    <td> <?= $user['pseudo']  ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="bannir_client.php?id=<?= $user['id']; ?>"><i class="fa-solid fa-trash-can"></i></a>
                        <a href=""><i class="fa-solid fa-pen"></i></a>
                    </td>
                <?php
            endwhile
                ?>

                </tbody>
        </table>



        <!-- FinAfficher tous les membres -->
    </div>
</body>

</html>