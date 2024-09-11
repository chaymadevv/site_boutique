<?php

function debug($param)
{
    echo '<pre>';
    var_dump($param);
    echo '</pre>';
}

// Fonctions Membres 

function internauteEstConnecte()
{
    if (isset($_SESSION['membre'])) {
        return true;
    } else {
        return false;
    }
}
// Fonction pour vérifier si l'utilisateur est connecté et s'il est admin
function internauteEstConnecteEtAdmin()
{
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 'admin') {
        return true;
    } else {
        return false;
    }
}

// Fonction générale de requête

// paramètre requete : 'INSERT INTO membre (Les champs de la table membre) VALUES (?,?,?,?,?)'
// paramètre param : $_POST;
function executeRequete($requete, $param = [])
{

    if (!empty($param)) {
        foreach ($param as $key => $values) {
            $param[$key] = htmlspecialchars($values, ENT_QUOTES); // On boucle sur le tableau de paramètres pour échapper les données reçues
        }
    }

    global $pdo; // Permet d'avoir accès (à l'interieur de la fonction) à la variable $pdo définie à l'exterieur de la fonction (l'espace global)

    $request = $pdo->prepare($requete);
    $request->execute($param);

    return $request; // On retourne l'objet PDOStatement à l'endroit où la fonction executeRequest est executée
}

// Fonction pour vérifier empty

function verificationChamps(array $array)
{
    $contenu = '';
    foreach ($array as $key => $values) {
        if (empty($array[$key])) {
            $contenu .= "<div class='alert alert-danger'>$array[$key] doit être rempli</div>";
        }
    }
    return $contenu;
}
