<?php class Database { 
    private static $dbName = 'flow' ; 
    private static $dbHost = 'localhost' ; 
    private static $dbUsername = 'root'; 
    private static $dbUserPassword = ''; 
    private static $cont = null; 
    public function __construct() { 
        die('Init function is not allowed'); 
    } 
    public static function connect() { 
        if ( null == self::$cont ) { 
            try { 
                self::$cont = new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
            } 
            catch(PDOException $e) { 
                die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>
<!DOCTYPE  html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>database</title>
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
 