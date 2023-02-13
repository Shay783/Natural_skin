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

<body style="background-color:#F7D9EB">

    <head>
        <a href="index.php"><img style="text-align:center;" src="../img/logo_admin.PNG" alt="" width=200></a>
    </head>

    <!-- FinAfficher tous les membres -->



    <h2 style=" color: #EAAECF; padding-top:50px; padding-bottom:50px; text-align:center;">Liste client</h2>

    <table class="table table-striped container">

        <?php
        include_once "conn.php"
        ?>
        <thead>
            <tr>
                <th style="color: #d3819b;" scope="col">id</th>
                <th style="color: #d3819b;" scope="col">Nom</th>
                <th style="color: #d3819b;" scope="col">Prenom</th>
                <th style="color: #d3819b;" scope="col">Email</th>
                <th style="color: #d3819b;" scope="col">Action</th>
            </tr>
        </thead>
        <?php
        $recupUsers = $bdd->query('SELECT * FROM users');
        while ($user = $recupUsers->fetch()) :
        ?>

            <tbody>
                <tr>
                    <td style="color: #EAAECF;"> <?= $user['id']  ?></td>
                    <td style="color: #EAAECF;"><?= $user['lastname'] ?></td>
                    <td style="color: #EAAECF;"> <?= $user['name']  ?></td>
                    <td style="color: #EAAECF;"><?= $user['email'] ?></td>
                    <td style="color: #EAAECF;">
                        <a href="bannir_client.php?id=<?= $user['id']; ?>"><i style="padding-right:10px; color: #ff5188;" class="fa-solid fa-trash-can"></i></a>
                        <a href="modifier_client.php?id=<?= $user['id']; ?>"><i style="color: #ff5188;" class="fa-solid fa-pen"></i></a>
                    </td>
                </tr>
            <?php
        endwhile
            ?>

            </tbody>
    </table>





</body>

</html>