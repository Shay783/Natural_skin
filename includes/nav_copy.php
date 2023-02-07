     <?php
        session_start();
        include_once "con_dbb.php";

        //supprimer les produits
        //si la variable del existe
        if (isset($_GET['del'])) {
            $id_del = $_GET['del'];
            //suppression
            unset($_SESSION['produit'][$id_del]);
        }
        ?>
     <!DOCTYPE html>
     <html lang="fr">

     <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="../asset/style.css">
         <title>Document</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     </head>

     <body>

     </body>

     </html>

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



         <nav class="navbar navbar-expand-lg bg-body-tertiary ">
             <div class="container">
                 <a class="navbar-brand" href="#">
                     <img src="../img/logo_natural_skin.png" alt="Logo" width="150" class="d-inline-block align-text-top">
                 </a>
                 <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav">
                         <li class="nav-item">
                             <a href="../savon.php" class="nav-link active" aria-current="page" href="#">Acceuil</a>
                         </li>
                         <li class="nav-item">
                             <a href="../about.php" class="nav-link active" aria-current="page" href="#">A propos</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link active" aria-current="page" href="#">Nos Savons</a>
                         </li>
                         <li class="nav-item">
                             <a href="../contact.php" class="nav-link active" aria-current="page" href="#">Contact</a>
                         </li>
                     </ul>




                     <div class="d-flex">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                             <li class="nav-item">









                             </li>
                             <li class="nav-item">

                                 <a class="nav-link active" aria-current="page" href="#"><i style="color:rgb(255, 168, 208)" class="fa-solid fa-user"></i></a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>


         </nav>
         <button style=" margin-top:10px;  background-color:white; border-color:white;    position: absolute; top: 35px; left: 75%;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i style="color:rgb(255, 168, 208)" class="fa-solid fa-cart-shopping"></i><span style="    background-color: #ff4f83; height: 20px; width: 20px; display: flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 12px; color: #fff; position: absolute; bottom: 23px; left: 30px;"><?= array_sum($_SESSION['produit']) ?></span></button>


         <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
             <div class="offcanvas-header"> PANIER
                 <li style="margin: 20px; width: fit-content; position: relative; text-decoration: 0;  color: #fff;"></li>
                 <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
             </div>
             <div class="offcanvas-body">

                 <!-- LA OU JE DEVRAI METTRE MON PHP DU PANIER -->
                 <?php
                    $total = 0;
                    // Liste des produits
                    // recuperer les dlés du tavleau session

                    $ids = array_keys($_SESSION['produit']);
                    // s'il n'y a aucune clé dans le tableau
                    if (empty($ids)) {
                        echo "Votre panier est vide";
                    } else {
                        // si oui
                        $products = mysqli_query($con, "SELECT * FROM produit WHERE id IN (" . implode(',', $ids) . ")");

                        //Liste des produits avec une boucle foreach
                        foreach ($products as $product) :
                            // Calculer le total (prix initaire * quantité) et addictionné chaque résultat a chaque tour de boule

                            $total = $total + $product['price'] * $_SESSION['produit'][$product['id']];
                    ?>
                         <div class="card mb-3" style="max-width: 540px; border-color:white;">
                             <div class="row g-0">
                                 <div class="col-md-4">
                                     <img src="../admin/img/<?= $product['image'] ?>" class="img-fluid rounded-start">
                                 </div>

                                 <div class="col-md-8">
                                     <div class="card-body">
                                         <h5 class="card-title"><?= $product['titre'] ?></h5>
                                         <p class="card-text"></p>
                                         <p><?= $product['price'] ?> €</p>
                                         <p class="card-title">Quantité : <?= $_SESSION['produit'][$product['id']] ?> </p>
                                         <a style="color: #e95593;" href="savon_detail.php?del=<?= $product['id'] ?>"> Retirer le produit</a>

                                     </div>
                                 </div>
                             </div>
                         </div>

                 <?php endforeach;
                    } ?>


                 <h4>TOTAL : <?= $total ?> €</h4>

             </div>
         </div>


     </header>