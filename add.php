 <?php require 'database.php'; if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)){ 
     //on initialise nos messages d'erreurs; 
            $NomError = ''; 
            $SecteurError=''; 
            $CPError=''; 
    // on recupère nos valeurs 
            $Nom = htmlentities(trim($_POST['Nom'])); 
            $Secteur = htmlentities(trim($_POST['Secteur'])); 
            $CP = htmlentities(trim($_POST['CP'])); 
    // on vérifie nos champs 
            $valid = true; 
            if (empty($Nom)) { 
                $NomError = 'Enter le nom'; 
                $valid = false; 
                echo 'ok1';
            }
            else if (!preg_match("/^[a-zA-Z ]*$/",$Nom)) { 
                $NomError = "Only letters and white space allowed"; 
                echo 'ok2';
            } 
            else if(empty($Secteur)){ 
                $SecteurError ='Entrer le secteur'; 
                $valid= false; 
                echo 'ok3';
            }
            else if (!preg_match("/^[a-zA-Z ]*$/",$Secteur)) { 
                $SecteurError = "Only letters and white space allowed"; 
                echo 'ok4';
            } 
            else if (empty($CP)) { 
                $CPError = 'Entrer le code postal'; 
                $valid = false; 
                echo 'ok5';
            } 
    // si les données sont présentes et bonnes, on se connecte à la base 
            if ($valid) { 
                echo 'ok6';
                $pdo = Database::connect(); 
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "INSERT INTO entreprise (Nom, Secteur, CP) values(?, ?, ?)";
                $q = $pdo->prepare($sql);
                $q->execute(array($Nom,$Secteur,$CP));
                Database::disconnect();
                //header("Location: menu.php");
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
        <title>add</title>
        <script src="/script.js"></script>
        <meta name="theme-color" content="#317EFB"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                 <link rel="manifest" href="manifest.json">
        <script src="script.js"></script>
        <link rel="stylesheet" media="screen and (max-width: 1280px)" href="add_resolutionX.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="shortcut icon" href="./image/favicon.ico">
        <title>Crud</title>
    </head>
    <body>
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
<br />
<div class="container">
<br />
<div class="row">
<br />
<h3>Ajouter une entreprise</h3>
<p>
</div>
<p>
<br />
<form method="post" action="add.php">
<br />
<div class="control-group <?php echo !empty($NomError)?'error':'';?>">
<strong><label class="control-label">Nom</label></strong>
<br />
<div class="controls">
<input name="Nom" type="text" value="<?php echo !empty($Nom)?$Nom:'';?>" class="form-control">
<?php if (!empty($NomError)): ?>
<span class="help-inline"><?php echo $NomError;?></span>
<?php endif; ?>
</div>
<p>
</div>
<p>
<br />
<div class="control-group<?php echo !empty($SecteurError)?'error':'';?>">
<strong><label class="control-label">Secteur</label></strong>
<br />
<div class="controls">
<input type="text" name="Secteur" value="<?php echo !empty($Secteur)?$Secteur:''; ?>" class="form-control">
<?php if(!empty($SecteurError)):?>
<span class="help-inline"><?php echo $SecteurError ;?></span>
<?php endif;?>
</div>
<p>
</div>
<p>
<br />
<div class="control-group<?php echo !empty($CPError)?'error':'';?>">
<strong><label class="control-label">CP</label></strong>
<br />
<div class="controls">
<input type="number" name="CP" value="<?php echo !empty($CP)?$CP:''; ?>" class="form-control">
<?php if(!empty($CPError)):?>
<span class="help-inline"><?php echo $CPError ;?></span>
<?php endif;?>
</div>
<p>
</div>
<p>
<br />
<div class="form-actions">
<input type="submit" class="btn btn-primary" name="submit" value="submit">
<a class="btn btn-light" href="session.php">Retour</a>
</div>
<p>
</form>
<p>
</div>
<p>

</div>
</body>
</html>