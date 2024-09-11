<?php require_once './inc/haut.inc.php'; 

// partie requêtes

//1 - Affichage des categories

$categories = executeRequete("SELECT DISTINCT categorie FROM produit");

$contenu_gauche .= '<div class="list-group mb-4>';

   // On affiche la catégorie "tous" par défaut :

  $contenu_gauche .= '<a href="?categorie=tous" class="list-group-item">
  Tous les produits </a>';

// Affichage des categories provenant de la base de données:

  while($cat = $categories->fetch(PDO::FETCH_ASSOC)){
  $contenu_gauche .= '<a href="?categorie=';
  }




?>

<h1 class="mt-4">Vêtements</h1>

<div class="row">
    <div  class="col-md-3">

    </div>
    <div class="col-md-9">

    </div>

</div>

<?php require_once './inc/bas.php'; ?>