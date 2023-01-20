<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UT -8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/ajout_produit.css">
</head>

<body style="background-color:#f7d9eb;">
    <div class="result">
        <div class="result-content">
            
            <a href="../ajouter_produit/ajout_produit.php">Ajouter un produit</a>
            <h3>liste des produits</h3>
            <div class="liste-produits">

                <?php
                //Nous allons afficher tous les produits ajouté :
                //connexion à la base de données
                $con = mysqli_connect("localhost", "root", "", "natural_skin");
                $req3 = mysqli_query($con, "SELECT * FROM produit");
                if (mysqli_num_rows($req3) == 0) {
                    //si la base de donnée ne contient aucun produit , alors affichons :
                    echo " Aucun produit trouvé";
                } else { //si oui
                    while ($row = mysqli_fetch_assoc($req3)) {
                        //affichons les informations
                        echo ' 
                           <div class="produit">
                                <div class="image-prod">
                                        <img src="../img/' . $row['image'] . '" > 
                                </div>
                                <div class="text">
                                     <strong><p class="titre">' . $row['titre'] . '</p></strong>
                                     <p class="description">' . $row['price'] . '€</p>
                                     <a href="supp_produit.php"> Retirer le produit</a>
                                
                                </div>

                               
                           </div> 
                           
                             ';
                    }
                }


                ?>
                
                <!-- produit -->

            </div>
        </div>
    </div>
</body>

</html>