<?php
//inclure la page connexion
include_once "con_dbb.php";

//verifier si une session existe
if(!isset($_SESSION)){
    //si non demarrer la session
    session_start();
}

//creer la session
if(!isset($_SESSION['produit'])){
    //s'il n'existe pas une session on créer une et on mets un tbaleau a l'interieur

    $_SESSION['produit'] = array();
}

//récupération de l'id dans le lien
   if(isset($_GET['id'])){//si un id a été envoyer alors:
    $id =$_GET['id'];

    //verifier grace a l'id si le produit existe dans la base de donnée
    $produit = mysqli_query($con, "SELECT * FROM produit WHERE id = $id");
    if(empty(mysqli_fetch_assoc($produit))){
        //si le produit n'existe pas
        die("ce produit n'existe pas");
    }

    //ajouter le produit dan le panier (le tableau)
    if(isset($_SESSION['produit'][$id])){// si le produit ets déja dans le panier
        $_SESSION['produit'][$id]++; // represente la quantité

    }else{
        //si non ajoute le produit
        $_SESSION['produit'][$id] = 1 ;
           
        
            

            
    }
    header("location:savon_detail.php");
}

