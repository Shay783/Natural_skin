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
  include 'nav.php'
  ?>

  <section id="savon">

    <div class="savon">
      <div class="row" style="padding-bottom:50px;">



        <div class="col-md-6">
          <div> <img class="photo_deux" src="img/StockSnap_FXNCQS1ZDO.jpg""></div>
            </div>
            <div class=" col-md-6">
            <div> <img class="photo_trois" src="./img/beauty-gce7bab334_1920.jpg"></div>

          </div>
        </div>





  </section>


  <div class="container">


    <h1 id="vente" style="padding-bottom: 20px;"> NOS SAVONS </h1>



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

                      <div class="row">
                            <div class="col-md-4">
                              <div class="card" style="margin-bottom:10%;">
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

      // header('location: http://localhost/ecommerceFinal/savon.php');
    }


    ?>

</div>

 
 



  














  <footer id="footer" class="footer-1">
    <div class="main-footer widgets-dark typo-light">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="widget subscribe no-box">
              <h5 class="widget-title">COMPANY NAME<span></span></h5>
              <p>About the company, little discription will goes here.. </p>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="widget no-box">
              <h5 class="widget-title">Quick Links<span></span></h5>
              <ul class="thumbnail-widget">
                <li>
                  <div class="thumb-content"><a href="#.">Get Started</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">Top Leaders</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">Success Stories</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">Event/Tickets</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">News</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">Lifestyle</a></div>
                </li>
                <li>
                  <div class="thumb-content"><a href="#.">About</a></div>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="widget no-box">
              <h5 class="widget-title">Get Started<span></span></h5>
              <p>Get access to your full Training and Marketing Suite.</p>
              <a class="btn" href="https://bit.ly/3m9avif" target="_blank">Subscribe Now</a>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-3">

            <div class="widget no-box">
              <h5 class="widget-title">Contact Us<span></span></h5>

              <p><a href="mailto:info@domain.com" title="glorythemes">info@domain.com</a></p>
   
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="footer-copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Copyright Company Name © 2022. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>