<?php
// fichier de configuration du site

// Connexion à la BDD :
$pdo = new PDO(
    'mysql:host=localhost;dbname=site_commerce',
    'root',
    '',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'set NAMES utf8'
    )
);


// Session :
session_start();

// Constante qui contient le chemin du site :
define('ROOT', '/site_web/'); // indiquer le dossier dans lequel se situe le site sans "localhost". Permet de créer des chemins absolus utilisés notamment dans le header du site inclus dans différents sous-dossiers : par conséquent les chemins relatifs vers les sources changent selon le sous-dossier, ce qui n'est pas les cas en chemin absolu.

// Variables d'affichage :
$contenu = '';
$contenu_gauche = '';
$contenu_droite = '';

// inclusions du fichier qui contient les fonctions du site :
require_once 'fonctions.inc.php';

