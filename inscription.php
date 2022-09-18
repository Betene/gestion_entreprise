<?php
session_start();
include("infos.php");
@$valider = $_POST["inscrire"];
$erreur = "";
if (isset($valider)) {
if (empty($nom)) $erreur = "Le champs nom est obligatoire!";
elseif (empty($prenom)) $erreur = "Le champs prénom est obligatoire!";
elseif (empty($pseudo)) $erreur = "Le champs Pseudo est obligatoire!";
elseif (empty($password)) $erreur = "Le champs mot de passe est obligatoire!";
elseif ($password != $passwordConf) $erreur = "Mots de passe differents!";
else {
include("connexion.php");
$verify_pseudo = $pdo->prepare("select id from users where pseudo=? limit 1");
$verify_pseudo->execute(array($pseudo));
$user_pseudo = $verify_pseudo->fetchAll();
if (count($user_pseudo) > 0)
$erreur = "Pseudo existe déjà!";
else {
$ins = $pdo->prepare("insert into users(nom,prenom,pseudo,password) values(?,?,?,?)");
if ($ins->execute(array($nom, $prenom, $pseudo, md5($password))))
header("location:login.php");
     }
   }
}
?>
<!DOCTYPE  html>

<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>inscription</title>
<meta  charset="utf-8"  />
<meta name="theme-color" content="#317EFB"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
<link rel="manifest" href="manifest.json">
<script src="script.js"></script>
<link rel="stylesheet" href="inscriptionX.css" />
<link rel="shortcut icon" href="./image/favicon.ico">
<link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
<link rel="stylesheet" media="screen and (max-width: 1280px)" href="inscription_resolutionX.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
  <h1 class="text-center">Inscription</h1>
  <div class="text-danger text-center"><?php  echo  $erreur  ?></div><br>
  <form  name="fo"  method="post"  action="">
  <input  type="text"  name="nom"  placeholder="Nom"  value="<?=  $nom  ?>" class="form-control" /><br  />
  <input  type="text"  name="prenom"  placeholder="Prénom"  value="<?=  $prenom  ?>" class="form-control" /><br  />
  <input  type="text"  name="pseudo"  placeholder="Votre Pseudo"  value="<?=  $pseudo  ?>" class="form-control" /><br  />
  <input  type="password"  name="password"  placeholder="Mot de passe" class="form-control"/><br />
  <input  type="password"  name="passconf"  placeholder="Confirmer votre Mot de passe" class="form-control" /><br  />
  <input  type="submit"  name="inscrire"  value="S'inscrire" class="btn btn-primary" />
  <a  href="login.php">Deja un compte</a>
  </form>
</div>
</body>
</html>