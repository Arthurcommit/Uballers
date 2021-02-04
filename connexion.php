<?php
/*
Page: connexion.php
*/
session_start(); // à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
if(isset($_POST['connexion'])) { // si le bouton "Connexion" est appuyé
    // on vérifie que le champ "mail" n'est pas vide
    // empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
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
            $BDD['db'] = "test";
            $mysqli = mysqli_connect($BDD['host'], $BDD['user'], $BDD['pass'], $BDD['db']);
            //on vérifie que la connexion s'effectue correctement:
            if(!$mysqli){
                echo "Erreur de connexion à la base de données.";
            } else {
                // on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
                $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE mail = '".$mail."' AND mdp = '".md5($MotDePasse)."'");//si vous avez enregistré le mot de passe en md5() il vous suffira de faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
                // si il y a un résultat, mysqli_num_rows() nous donnera alors 1
                // si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
                // mysqli_num_rows() vérifie la requête dans laBDD 
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







