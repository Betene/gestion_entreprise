<?php require('database.php'); //on appelle notre fichier de config  
    if (!empty($_GET['id'])) { 
        $id = $_REQUEST['id'];
     } 
    if (null == $id) { 
        header("location:menu.php"); 
    } else { //on lance la connection et la requete 
        $pdo = Database ::connect(); $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
        $sql = "SELECT * FROM entreprise where id =?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
    Database::disconnect();
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>edit</title>
        <link rel="manifest" href="manifest.json">
        <script src="script.js"></script>
        <link rel="shortcut icon" href="./image/favicon.ico">
        <link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
        <link rel="stylesheet" media="screen and (max-width: 1280px)" href="edit_resolutionX.css" />
        <meta charset="utf-8">
        <meta name="theme-color" content="#317EFB"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

<body>
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
<div class="container">
<div class="span10 offset1">
<div class="row">
<h3>Editier une entreprise</h3>
</div>
<br />
<div class="form-horizontal" >
<br />
<div class="control-group">
<strong><label class="control-label">Nom</label></strong>
<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['Nom']; ?>
</label>
</div>
</div>
<br />
<div class="control-group">
<strong><label class="control-label">Secteur</label></strong>
<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['Secteur']; ?>
</label>
</div>
</div>
<br />
<div class="control-group">
<strong><label class="control-label">CP</label></strong>
<br />
<div class="controls">
<label class="checkbox">
<?php echo $data['CP']; ?>
</label>
</div>
</div>
<br />
<a class="btn btn-success" href="session.php" role="button">Back</a>
</div>
</div>
</div>
</div>
</body>
</html>