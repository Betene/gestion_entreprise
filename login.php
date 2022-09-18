<?php

session_start();
include("infos.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
include("connexion.php");
$verify = $pdo->prepare("select * from users where pseudo=? and password=? limit 1");
$verify->execute(array($pseudo, $pass_crypt));
$user = $verify->fetchAll();
if (count($user) > 0) {
$_SESSION["prenom_nom"] = ucfirst(strtolower($user[0]["prenom"])) .
" "  .  strtoupper($user[0]["nom"]);
$_SESSION["connecter"] = "yes";
header("location:session.php");
} else
$erreur = "Mauvais login ou mot de passe!";
}
?>

<!DOCTYPE  html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta  charset="utf-8"  />
<meta name="theme-color" content="#317EFB"/>
<meta name="viewport" content="width=devide-width, initial-scale=1.0">
<meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
<script src="script.js"></script>
<title>login</title>
<link rel="stylesheet" href="loginX.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="shortcut icon" href="./image/favicon.ico">
<link rel="stylesheet" media="screen and (max-width: 1280px)" href="login_resolutionX.css" />
<link rel="manifest" href="manifest.json">
<link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
<link rel="shortcut icon" href="./image/favicon.ico">
</head>
<body  onLoad="document.fo.login.focus()">
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
    <h1 class="text-center">Authentification</h1>
    <div  class="text-danger text-center"><?php  echo  $erreur  ?></div><br>
    <div class="Formulaire">
    <form  name="form"  method="post"  action="">
    <input  type="text"  name="pseudo"  placeholder="Votre Pseudo" class="form-control"/><br/>
    <input  type="password"  name="password"  placeholder="Mot de passe" class="form-control"/><br/>
    <input  type="submit" class="btn btn-primary" name="valider"  value="S'authentifier"/>
    <a  href="inscription.php">Créer votre Compte</a>
    </form>
    </div>
</div>
</body>
</html>