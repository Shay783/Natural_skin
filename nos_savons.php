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


                  

                    <div style=" background-color:#FBF1F7; " class=" question col-sm-6 mb-3 mb-sm-0">
                        <img src="img/photo_coté-removebg-preview.png" alt="" width=90%>
                    </div>
  <div style=" padding-left: 40px; padding-top: 50px; padding-bottom:80px; background-color:#FBF1F7;" class=" question col-sm-6 mb-3 mb-sm-0">
                        <h1 style=" margin-bottom:40px; color:#EAAECF; ">Recette Unique </h1>
                        <p> Nous comprenons que chaque peau est unique et nous avons donc conçu notre gamme pour répondre à un large éventail de besoins de soins de la peau. Que vous cherchiez à hydrater votre peau sèche, à minimiser les rides et les ridules, à calmer les irritations ou simplement à donner à votre peau un éclat sain, nous avons le produit qu'il vous faut. <br> <br>

                            N'attendez plus pour découvrir les bienfaits de la peau naturelle. Parcourez notre gamme de produits aujourd'hui et découvrez comment une peau saine et radieuse peut être à portée de main. <br> <br></p>
                    </div>
                    <hr style="color: #ff4f83; width:50%; margin-left:25%;">


                </div>




        </section>


        <div class="container">


            <h1 id="vente" style="padding-bottom: 20px;"> NOS SAVONS </h1>

            <div class="row">

                <?php



                //Nous allons afficher tous les produits ajouté :
                //connexion à la base de données
                $con = mysqli_connect("localhost", "root", "", "natural_skin");
                $req3 = mysqli_query($con, "SELECT * FROM produit");

                if (mysqli_num_rows($req3) == 0) {
                    //si la base de donnée ne contient aucun produit , alors affichons :
                    echo " Aucun produit trouvé";
                } else {
                    while ($row = mysqli_fetch_assoc($req3)) {

                        echo '

                      
                            <div class="col-sm-4 mb-3 mb-sm-0">
                              <div class="card" style="margin-bottom:10%;  border:none; width:90%;">
                                <img src="./admin/img/' . $row['image'] . '"  >
                                
                          
                        <div class="card-body">

                        <h5 class="card-title">' . $row['titre'] . '</h5>
                        <p class="card-text"> ' . $row['description'] . '</p>
                        <p class="card-text"> ' . $row['price'] . ' €</p>
                        
                        <a href="./panier/savon_detail.php" class="btn btn--info col-12">Voir Produit</a>
                           
                        </div>
                          </div> 
                            </div>
                           



                            
                            
            ';
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