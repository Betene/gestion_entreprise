<?php require 'database.php'; 
        $id=0; 
        if(!empty($_GET['id'])){ 
            $id=$_REQUEST['id']; 
        } 
        if(!empty($_POST)){ 
            $id= $_POST['id']; 
            $pdo=Database::connect(); 
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM entreprise  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
        header("Location: session.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>delete</title>
<link rel="manifest" href="manifest.json">
<script src="script.js"></script>
<link rel="shortcut icon" href="./image/favicon.ico">
<link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
<link rel="stylesheet" media="screen and (max-width: 1280px)" href="delete_resolutionX.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<meta charset="utf-8">
<meta name="theme-color" content="#317EFB"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>

</head>
<body>
<div class="mx-auto my-5 p-4 border rounded" style="max-width:500px">
<div class="container">
<div class="span10 offset1">
<div class="row">
<br />
<h3>Supprimer une entreprise</h3>
</div>
<br />
<form class="form-horizontal" action="delete.php" method="post">
<input type="hidden" name="id" value="<?php echo $id;?>"/>                    
<strong>Voulez-vous vraiment supprimer ?</strong>
<div class="form-actions"><br>
<button type="submit" class="btn btn-danger">Yes</button>
<a class="btn btn-light" href="session.php">No</a>
</div>
<p>
</form>
<p>
</div>
<p>            
</div>
<p>
</body>
</div>
</html>