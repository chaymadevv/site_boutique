<?php require_once 'init.inc.php'; ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Ma Boutique</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        /* Style de base pour le corps de la page */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #333333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* Style pour l'en-tête avec l'image */
        .header-img {
            text-align: center;
            padding: 20px 0;
        }

        .header-img img {
            max-width: 200px;
            /* Taille ajustée pour l'image */
            max-height: 100px;
        }

        /* Style pour la barre de navigation */
        nav {
            background-color: #B22222;
            /* Rouge pour la barre de navigation */
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        nav ul li {
            display: inline-block;
            margin: 0 20px;
        }

        nav ul li a {
            color: #ffffff;
            /* Blanc pour le texte du menu */
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: color 0.3s ease-in-out;
        }

        nav ul li a:hover {
            color: #f4f4f4;
            /* Gris clair au survol */
        }

        /* Style pour le contenu principal */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            min-height: 100px;
            /* Hauteur minimale du contenu */
        }

        /* Style pour les titres */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: #B22222;
            /* Rouge pour les titres */
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #B22222;
        }

        /* Style pour les paragraphes */
        p {
            margin-bottom: 20px;
        }

        /* Style pour les boutons */
        button,
        .btn {
            background-color: #B22222;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        button:hover,
        .btn:hover {
            background-color: #8B1A1A;
            /* Rouge foncé au survol */
        }

        /* Style pour les liens */
        a {
            color: #B22222;
            /* Rouge pour les liens */
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Style pour les tableaux */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #B22222;
            /* Bordure rouge pour les cellules du tableau */
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #B22222;
            /* Arrière-plan rouge pour les en-têtes */
            color: white;
            /* Texte blanc pour contraste */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
            /* Fond alternatif pour les lignes du tableau */
        }

        /* Style pour le pied de page */
        footer {
            background-color: #B22222;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
            position: relative;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="header-img">
        <img src="<?php echo ROOT . "img/logo_poleS.png" ?>" alt="Logo PoleS">

    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- La marque -->
            <a class="navbar-brand" href="<?php echo ROOT . 'boutique.php'; ?>">MA BOUTIQUE</a>

            <!-- Le burger -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav1" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <!-- Le menu -->
            <div class="collapse navbar-collapse" id="nav1">
                <ul class="navbar-nav ml-auto">
                    <?php
                    echo '<li><a class="nav-link" href="' . ROOT . 'boutique.php">Boutique</a></li>';

                    // menu de l'internaute connecté :
                    if (internauteEstConnecte()) {
                        echo '<li><a class="nav-link" href="' . ROOT . 'profil.php">Profil</a></li>';
                        echo '<li><a class="nav-link" href="' . ROOT . 'connexion.php?action=deconnexion">Se déconnecter</a></li>';
                    } else {
                        // internaute non connecté :
                        echo '<li><a class="nav-link" href="' . ROOT . 'inscription.php">Inscription</a></li>';
                        echo '<li><a class="nav-link" href="' . ROOT . 'connexion.php">Connexion</a></li>';
                    }
                    echo '<li><a class="nav-link" href="' . ROOT . 'panier.php">Panier</a></li>';

                    // menu de l'administrateur :
                    if (internauteEstConnecteEtAdmin()) {
                        echo '<li><a class="nav-link" href="' . ROOT . 'admin/gestion_boutique.php">Gestion de la boutique</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Page Content -->
    <div class="container" style="min-height: 80vh;">
        <div class="row">
            <div class="col-12">
                <!-- ici le contenu spécifique de chaque page -->