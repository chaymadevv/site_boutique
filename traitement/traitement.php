<?php
require_once '../inc/init.inc.php';
// Page de traitement de l'inscription et de la connexion

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['inscription'])) {
    extract($_POST);

    $contenu .= verificationChamps($_POST);

    if (strlen($pseudo) > 30) {
        $contenu .= '<div class="alert alert-danger">Le pseudo ne peut pas être supérieur à 30 caractères </div>';
    }

    if (!preg_match('#^[0-9]{5}$#', $_POST['code_postal'])) {
        $contenu .= '<div class="alert alert-danger">Le format du code postal n\'est pas bon !</div>';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contenu .= '<div class="alert alert-danger">L\'email n est pas valide</div>';
    }

    if (empty($contenu)) {
        $verificationPseudo = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo", [':pseudo' => $pseudo]);

        if ($verificationPseudo->rowCount() > 1) {
            $contenu .= '<div class="alert alert-danger">Le pseudo existe dejà, merci d\en choisir un autre</div>';
        } else {
            $password = password_hash($mdp, PASSWORD_DEFAULT);
            executeRequete("INSERT INTO membre (pseudo,mdp,nom,prenom,email,civilite,ville,code_postal,adresse,statut) VALUES (:pseudo,:mdp,:nom,:prenom,:email,:civilite,:ville,:code_postal,:adresse,'client')", [
                ':pseudo' => $pseudo,
                ':mdp' => $password,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':email' => $email,
                ':civilite' => $civilite,
                ':ville' => $ville,
                ':code_postal' => $code_postal,
                ':adresse' => $adresse
            ]);

            header('Location: ../inscription.php?inscrit=true');
        }
    }
}

// traitement connexion

if (!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['connexion'])) {
    unset($_SESSION['error']);
    if (empty($_POST['email'])) {
        $_SESSION['error'] .= '<div class="alert alert-danger"> L\'email ne peut pas être vide </div>';
    }
    if (empty($_POST['mdp'])) {
        $_SESSION['error'] .= '<div class="alert alert-danger"> Le mot de passe ne peut pas être vide </div>';
    }

    if (empty($contenu)) {

        $infoConnexion = executeRequete("SELECT * FROM membre WHERE email = :email", ['email' => $_POST['email']]);

        if ($infoConnexion->rowCount() > 0) {
            $membre = $infoConnexion->fetch(PDO::FETCH_ASSOC);

            if (password_verify($_POST['mdp'], $membre['mdp'])) {
                $_SESSION['membre'] = $membre;
                header('Location: ../profil.php');
            } else {
                $_SESSION['error'] .= '<div class="alert alert-danger">Le mot de passe n\'est pas correct</div>';
                header('Location: ../connexion.php?erreur=true');
            }
        } else {
            $_SESSION['error'] .= '<div class="alert alert-danger"> L\'email n\'existe pas </div>';
            header('Location: ../connexion.php?erreur=true');
        }
    } else {
        header('Location: ../connexion.php?erreur=true');
    }
}

