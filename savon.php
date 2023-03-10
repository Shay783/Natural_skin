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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https : //fonts.googleapis.com/css2?family= Allura & display = swap" rel="stylesheet">

</head>



<body>

  <?php
  include 'includes/nav.php'
  ?>

  <div style="background-color:#FBF1F7;">
    <section id="savon">

      <div class="savon">
        <div class="row" style="padding-bottom:50px;">



          <div class="col-md-6">
            <div> <img class="photo_deux" src="img/StockSnap_FXNCQS1ZDO.jpg""></div>
            </div>
            <div class=" col-md-6">
              <div> <img class="photo_trois" src="./img/beauty-gce7bab334_1920.jpg"></div>

            </div>

            <div style=" padding-left: 40px; padding-top: 50px; padding-bottom:80px; background-color:#FBF1F7;" class=" question col-sm-6 mb-3 mb-sm-0">
              <h1 style=" margin-bottom:40px; color:#EAAECF; ">Natural skin</h1>
              <p>Nos savons ?? froid NATURAL SKIN vous offriront un v??ritable soin lavant, <br> hydratant et protecteur de votre peau.
                Le choix de nos huiles et beurres non raffin??s <br> extraites ?? froid pendant 6 semaines, aux propri??t??s pr??serv??es, <br> est un atout incomparable dans nos savons <br> <br> Le savon naturel ne dess??chera pas votre peau et ne provoquera aucune irritation de la peau. <br> Elle vous offrira un v??ritable soin lavant hydratant et protecteur de votre peau</p>
            </div>

            <div style=" padding-left: 20px; padding-top: 50px; padding-bottom:80px; background-color:#FBF1F7;  " class=" question col-sm-6 mb-3 mb-sm-0">
              <h1 style=" margin-bottom:40px; color:#EAAECF; ">Le saviez vous ?</h1>
              <p>Saviez-vous que choisir un savon personnalis?? c'est la moiti?? de l'efficacit?? de votre routine beaut?? ? <br> <br> Le savon naturel ne contient pas d???ingr??dients synth??tiques qui peuvent ??tre absorb??s par la peau et provoquer<br> des probl??mes Le savon naturel peut convenir aux diff??rents types de peaux, et adapt?? ?? tout le monde en fonction des ingr??dients et parfum choisi. </p>
            </div>

            <hr style="color: #ff4f83; width:50%; margin-left:25%;">


          </div>


    </section>


    <div class="container">


      <h1 id="vente" style="padding-bottom: 20px;"> NOS SAVONS </h1>

      <div class="row">

        <?php



        //Nous allons afficher tous les produits ajout?? :
        //connexion ?? la base de donn??es
        $con = mysqli_connect("localhost", "root", "", "natural_skin");
        $req3 = mysqli_query($con, "SELECT * FROM produit");

        if (mysqli_num_rows($req3) == 0) {
          //si la base de donn??e ne contient aucun produit , alors affichons :
          echo " Aucun produit trouv??";
        } else {
          while ($row = mysqli_fetch_assoc($req3)) { ?>




            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="card" style="margin-bottom:10%;  border:none; width:90%;">
                <img src="./admin/img/<?php echo $row['image'] ?>">


                <div class="card-body">

                  <h5 class="card-title"><?php echo $row['titre'] ?></h5>
                  <p class="card-text"> <?php echo $row['description'] ?></p>
                  <p class="card-text"> <?php echo  $row['price'] ?>???</p>

                  <a class=" btn btn--info col-12" href="savon_detail.php?titre=<?php echo $row['titre'] ?>&description=<?php echo $row['description'] ?>&bienfait_un<?php echo $row['bienfait_un'] ?>&bienfait_deux<?php echo $row['bienfait_deux'] ?>&bienfait_trois<?php echo $row['bienfait_trois'] ?>&bienfait_quatre<?php echo $row['bienfait_quatre'] ?>&conseil<?php echo $row['conseil'] ?>&price<?php echo $row['price'] ?>&image<?php echo $row['image'] ?>"> Voir Produit</a>
                  

                </div>
              </div>
            </div>






        <?php
          }
        }


        ?>
      </div>
    </div>
  </div>











  <?php
  include 'includes/footer.php'
  ?>





</body>

</html>