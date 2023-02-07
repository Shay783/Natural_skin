 <?php
    session_start();
    include_once "../conn.php";

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
     <meta charset="UT -8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" href="../assets/ajout_produit.css">
 </head>

 <body style="background-color:#FBF1F7;">




     <h2 style=" color: #EAAECF; padding-top:50px; padding-bottom:50px; text-align:center;">Les Produits Ajoutés</h2>


     <table class="table table-striped container">
         <thead>
             <tr>
                 <th style="color: #d3819b;" scope="col">id</th>
                 <th style="color: #d3819b;" scope="col">image</th>
                 <th style="color: #d3819b;" scope="col">titre</th>
                 <th style="color: #d3819b;" scope="col">description</th>
                 <th style="color: #d3819b;" scope="col">bienfait un</th>
                 <th style="color: #d3819b;" scope="col">bienfait deux</th>
                 <th style="color: #d3819b;" scope="col">bienfait trois</th>
                 <th style="color: #d3819b;" scope="col">bienfait quatre</th>
                 <th style="color: #d3819b;" scope="col">conseil</th>
                 <th style="color: #d3819b;" scope="col">prix</th>
                 <th style="color: #d3819b;" scope="col">Action</th>
             </tr>
         </thead>


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
        <tbody >
            <tr>
                <td style="color: #EAAECF;" >' . $row['id'] . '</td>
                <td scope="row">  <img width=150 src="../img/' . $row['image'] . '"></td>
                <td style="color: #EAAECF;" >' . $row['titre'] . '</td>
                <td style="color: #EAAECF;" >' . $row['description'] . '</td>
                <td style="color:#EAAECF;" >' . $row['bienfait_un'] . '</td>
                <td style="color:#EAAECF;" >' . $row['bienfait_deux'] . '</td>
                <td style="color: #EAAECF;" >' . $row['bienfait_trois'] . '</td>
                <td style="color: #EAAECF;" >' . $row['bienfait_quatre'] . '</td>
                <td style="color: #EAAECF;" >' . $row['conseil'] . '</td>
                <td style="color: #EAAECF;" >' . $row['price'] . '€</td>
                <td>
                    <a href="resultat.php"><i style="padding-right:10px; color: #ff5188;" class="fa-solid fa-trash-can"></i></a>
                    <a href="modifier_produit.php?id=<?= $row[\'id\']; ?>"><i style="color: #ff5188;" class="fa-solid fa-pen"></i></a>

                </td>
            </tr>
         
            </tr>
        </tbody>';
                }
            }


            ?>
     </table>
 </body>

 <!-- bannir_client.php?id=<?= $user['id']; ?> -->

 </html>