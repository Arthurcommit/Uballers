<?php
/*
Page: connexion.php
*/
session_start(); 
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "mail" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe (is set)
    if(empty($_POST['mail'])) {
        echo "Le champ mail est vide.";
    } else {
        // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
        if(empty($_POST['mdp'])) {
            echo "Le champ Mot de passe est vide.";
        } else {

            // $_post permet de récuperer dans la BDD les infos soumises dans le formulaire
            $mail = $_POST["mail"]; 
            $MotDePasse = $_POST["mdp"]; 
           

            //on se connecte à la base de données:
            $BDD = array();
            $BDD['host'] = "localhost";
            $BDD['user'] = "root";
            $BDD['pass'] = "";
            $BDD['db'] = "nom_de_la_base_de_donnees";
            $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE mail = '".$mail."' AND mdp = '".md5($MotDePasse)."'");
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                // mysqli_num_rows() vérifie la requête dans la BDD 
                if(mysqli_num_rows($Requete) == 0) {
                    echo "Le mail ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
                } else {
                    // on ouvre la session avec $_SESSION:
                    $_SESSION['mail'] = $mail; // la session peut être appelée différemment et son contenu aussi peut être autre chose que le mail
                    echo "Vous êtes à présent connecté !";
                }
            }
        }
    }
}
?>







