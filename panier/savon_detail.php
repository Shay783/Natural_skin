<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../asset/detail.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body style="background-color:rgb(255, 242, 248);">

  <?php
  include '../nav.php'
  ?>

  <div>
    <div class="row">
      <?php
      //inclure la page de connexion
      include_once "con_dbb.php";

      //affciher la liste des produits

      $req = mysqli_query($con, "SELECT * FROM produit");
      while ($row = mysqli_fetch_assoc($req)) {

      ?>
        <div class="image col-6 ">
          <img src="../admin/img/<?= $row['image'] ?>" style="width:90%; margin-top:50px; margin-bottom:50px;" alt="">
        </div>

        <div class="text col-6">
          <h1 style="margin-top:70px;"><?= $row['titre'] ?></h1>
          <h2 style="margin-top:40px;"><?= $row['price'] ?> €</h2>

          <button type="button" class="btn btn-light" style="background-color:#c3d3ff;"><a href="ajouter_panier.php?id=<?= $row['id'] ?>">Ajouter au panier</a></button>

          <h2 style="margin-top:40px; margin-bottom:20px;">Description</h2>
          <p><?= $row['description'] ?></p>

          <h2 style="margin-top:40px; margin-bottom:20px;">Bienfait du Savon :</h2>
          <p style="margin-left: 15px;"><i class="fa-solid fa-arrow-right" style="color:#ff9dd8;"> </i> <?= $row['bienfait_un'] ?></p>
          <p style="margin-left: 15px;"><i class="fa-solid fa-arrow-right" style="color:#ff9dd8;"> </i> <?= $row['bienfait_deux'] ?></p>
          <p style="margin-left: 15px;"><i class="fa-solid fa-arrow-right" style="color:#ff9dd8;"></i> <?= $row['bienfait_trois'] ?></p>
          <p style="margin-left: 15px;"><i class="fa-solid fa-arrow-right" style="color:#ff9dd8;"></i> <?= $row['bienfait_quatre'] ?></p>


          <h2 style="margin-top:40px; margin-bottom:20px;">Comment l'utilisé ?</h2>
          <p><?= $row['conseil'] ?></p>



        </div>

    </div>
  <?php } ?>
  </div>


</body>

</html>