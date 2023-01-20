<?php

//connexion à la base de donnée
$con = mysqli_connect("localhost:3306", "root","", "natural_skin");
//vérifier la connexion
if(!$con){
    echo "Vous n'êtes pas connecté a la base de donnée";
}



?>