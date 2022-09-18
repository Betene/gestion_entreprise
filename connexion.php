<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=flow","root","");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>
<!DOCTYPE  html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>connexion</title>
<link rel="manifest" href="manifest.json">
<script src="script.js"></script>
<link rel="shortcut icon" href="./image/favicon.ico">
<link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
<meta  charset="utf-8"  />
<meta name="theme-color" content="#317EFB"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
</head>
<body>
</body>
