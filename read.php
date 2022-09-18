<?php require 'database.php'; 
             $id = null; 
             if ( !empty($_GET['id'])) { 
                 $id = $_REQUEST['id']; 
                } 
             if ( null==$id ) { 
                 header("Location: menu.php"); 
                }
             if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
                  // on initialise nos erreurs 
             $NomError = null; 
             $SecteurError = null; 
             $CP = null;  
                // On assigne nos valeurs 
             $Nom = $_POST['Nom']; 
             $Secteur = $_POST['Secteur']; 
             $CP = $_POST['CP'];
               // On verifie que les champs sont remplis 
             $valid = true; 
             if (empty($Nom)) { 
                 $NomError = 'Entrer le nom'; 
                 $valid = false; 
                } 
             if (empty($Secteur)) { 
                 $SecteurError = 'Entrer le secteur'; 
                 $valid = false; 
                }
             if (empty($CP)) { 
                 $CPError = 'Entrer le code postal'; 
                 $valid = false; 
                } 
                // mise à jour des donnés 
             if ($valid) { 
                 $pdo = Database::connect(); 
                 $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
                 $sql = "UPDATE entreprise SET Nom = ?,Secteur = ?,CP = ? WHERE id = ?";
                 $q = $pdo->prepare($sql);
                 $q->execute(array($Nom,$Secteur, $CP, $id));
                 Database::disconnect();
                 header("Location: session.php");
             }
             else {

             $pdo = Database::connect();
             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "SELECT * FROM entreprise where id = ?";
             $q = $pdo->prepare($sql);
             $q->execute(array($id));
             $data = $q->fetch(PDO::FETCH_ASSOC);
             $Nom = $data['Nom'];
             $Secteur = $data['Secteur'];
             $CP = $data['CP'];
             Database::disconnect();
         }
        }
     
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>read</title>
     <link rel="manifest" href="manifest.json">
     <script src="script.js"></script>
     <link rel="shortcut icon" href="./image/favicon.ico">
     <link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
     <link rel="stylesheet" media="screen and (max-width: 1280px)" href="read_resolutionX.css" />
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <meta name="theme-color" content="#317EFB"/>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Crud-Update</title>
</head>
<body>
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
<div>
<div>
<h3>Modifier une entreprise</h3>
<p>
</div>
<p>
<br />
<form method="post" action="read.php?id=<?php echo $id ;?>">
<br />
<div class="control-group <?php echo!empty($NomError) ? 'error' : ''; ?>">
                 <strong><label class="control-label">Nom</label></strong>
<br />
<div class="controls">
<input name="Nom" type="text" value="<?php echo!empty($Nom) ? $Nom : ''; ?>" class="form-control">
<?php if (!empty($NomError)): ?>
<span class="help-inline"><?php echo $NomError; ?></span>
 <?php endif; ?>
</div>
<p>
</div>
<p>
<br />
<div class="control-group<?php echo!empty($SecteurError) ? 'error' : ''; ?>" class="form-control">
<strong><label class="control-label">Secteur</label></strong>
<br />
<div class="controls">
<input type="text" name="Secteur" value="<?php echo!empty($Secteur) ? $Secteur : ''; ?>" class="form-control">
<?php if (!empty($SecteurError)): ?>
<span class="help-inline"><?php echo $SecteurError; ?></span>
<?php endif; ?>
</div>
<p>
</div>
<p>
<br />
<div class="control-group<?php echo!empty($CPError) ? 'error' : ''; ?>" >
<strong><label class="control-label">CP</label></strong>
<br />
<div class="controls">
<input type="number" name="CP" value="<?php echo!empty($CP) ? $CP : ''; ?>" class="form-control">
<?php if (!empty($CPError)): ?>
<span class="help-inline"><?php echo $CPError; ?></span>
<?php endif; ?>
</div>
<p>
</div>
<p>
</div>
<p>
<br />
<div class="form-actions">
<input type="submit" class="btn btn-warning" name="submit" value="submit">
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