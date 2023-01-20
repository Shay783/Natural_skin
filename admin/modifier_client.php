<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body style="background-color: #2e1e26">

    <h2 style="text-align: center; color:white; margin-top:10px;">Modifier l'employé : </h2>
    <p class="erreur_message">

    </p>

    <form method="POST" action="" class="form_connect row col-5" style="margin-left:30%; margin-top:40px; margin-bottom:50px; ">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="lastname">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pseudo">
        </div>


        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputPassword1" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="envoi" style="width:20%; margin-left:35%;">Modifier</button>
    </form>

</body>

</html>