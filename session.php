<?php
session_start();
if ($_SESSION["connecter"] != "yes") {
header("location:login.php");
exit();
}
if (date("H") < 18)
$bienvenue = "Bonjour et bienvenue "  .
$_SESSION["prenom_nom"];
else
$bienvenue = "Bonsoir et bienvenue "  .
$_SESSION["prenom_nom"];
?>

<?php
$bdd = new PDO ('mysql:host=localhost;dbname=flow;','root','');
$allEntreprises = $bdd->query('SELECT * FROM entreprise ORDER BY id DESC');
if (isset($_GET['s']) AND !empty ($_GET['s'])) {
    $recherche = htmlspecialchars($_GET['s']);
    $allEntreprises = $bdd->query('SELECT Nom FROM entreprise WHERE Nom LIKE "%'.$recherche.'%" ORDER BY id DESC');
}

?>
<!DOCTYPE  html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>session</title>
<link rel="manifest" href="manifest.json">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="script.js"></script>
<link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
<link rel="stylesheet" media="screen and (max-width: 1280px)" href="session_resolutionX.css" />
<link rel="shortcut icon" href="./image/favicon.ico">
<meta  charset="utf-8"  />
<meta name="theme-color" content="#317EFB"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
</head>
<body  onLoad="document.fo.login.focus()">
<a id="haut"></a>
<h2 class="text-center"><?php  echo  $bienvenue ?></h2>
<center>
<br>
<button id="togg1" type="button" class="btn btn-outline-primary">Masquer tout</button>
</center>

<div id="d1">
<center>
<br>
<a href="#bas" class="link-warning">Aller bas de page</a>
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L7.5 10.293V4.5a.5.5 0 0 1 1 0z"/>
</svg>
</center>

<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-reply-all-fill " viewBox="0 0 16 16">
  <path d="M8.021 11.9 3.453 8.62a.719.719 0 0 1 0-1.238L8.021 4.1a.716.716 0 0 1 1.079.619V6c1.5 0 6 0 7 8-2.5-4.5-7-4-7-4v1.281c0 .56-.606.898-1.079.62z"/>
  <path d="M5.232 4.293a.5.5 0 0 1-.106.7L1.114 7.945a.5.5 0 0 1-.042.028.147.147 0 0 0 0 .252.503.503 0 0 1 .042.028l4.012 2.954a.5.5 0 1 1-.593.805L.539 9.073a1.147 1.147 0 0 1 0-1.946l3.994-2.94a.5.5 0 0 1 .699.106z"/>
</svg>
<a  href="deconnexion.php" class="my-5 p-4">Se déconnecter</a><br><br/>
<form method="GET">
    <input type="search" name="s" placeholder="rechercher une entreprise" autocomplete="off" class="form-control"><br>
    <input type="submit" name="envoyer">
    <button id="togg2" type="button" class="btn btn-outline-secondary">Masquer résultats</button>
</form><br>
<div id="d2">
<div class="afficher_entreprise mx-auto border rounded p-4">
    <?php
    if ($allEntreprises->rowCount() > 0){
        while($entreprise = $allEntreprises->fetch()){
            ?>
            <p><?= $entreprise['Nom'];?></p>
            <?php
        }
    }else{
        ?>
        <p>Aucune entreprise trouvée</p>
        <?php } ?>
</div>
</div>

</div>

    <div class="container">
        <div class="row">
            <p class="text-center">
            <a href="add.php" class="btn btn-primary">Ajouter une entreprise</a>
            </p>
            <div><br>

                <table class="mx-auto border rounded table table-bordered text-center ">
                    <thead>
                        <th>Nom</th>
                        <th>Secteur</th>
                        <th>CP</th>
                    </thead>
                        <tbody>
                        <?php 
                        include 'database.php'; //on inclut notre fichier de connection 
                        $pdo = Database::connect(); //on se connecte à la base 
                        $sql = 'SELECT * FROM entreprise ORDER BY id ASC'; //on formule notre requete 
                        foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<td>'.$row['Nom'].'</td>';
                        echo '<td>'.$row['Secteur'].'</td>';
                        echo '<td>'.$row['CP'].'</td>';
                        echo'<td>';
                        echo '<a class="btn btn-success" href="edit.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                        echo '</td>';
                        echo '<td>';
                        echo '<a class="btn btn-warning" href="read.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                        echo '</td>';
                        echo'<td>';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                        echo '</td>';
                        echo '</tr>';
}
            Database::disconnect(); //on se deconnecte de la base
;?>
</tbody>
</table>
    </div>
    </div>
    </div>
<center>
<a href="#haut" class="link-warning">Retour haut de page</a>
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-up-square-fill" viewBox="0 0 16 16">
  <path d="M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z"/>
</svg>
</center>
<a id="bas"></a>

</div>

<script src="./session.js"></script>
</body>
</html>