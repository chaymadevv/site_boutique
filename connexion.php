<?php require_once './inc/haut.inc.php'; ?>

<h1 class="mt-4">Connnexion</h1>

<p>Veuillez indiquer vos identifiants pour vous connecter</p>

<form action="./traitement/traitement.php" method="post">

<label for="email">Email</label><br>
<input type="text" id="email" name="email"><br><br>

<label for="mdp">Votre mot de passe</label><br>
<input type="password" id="mdp" name="mdp"><br><br>

<input type="submit" name="connexion" value="se connecter" class="btn">
</form>