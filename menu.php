<!DOCTYPE html>
<html lang="en">
<head>
    <title>menu</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="manifest" href="manifest.json">
    <script src="script.js"></script>
    <link rel="shortcut icon" href="./image/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="./image/apple-touch-icon.png">
         <meta name="theme-color" content="#317EFB"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="RAS juste un logiciel de gestion des entreprises"/>
    <title>Crud en php</title>
</head>
<body>
    <br />
    <div class="container">
        <br />
        <div class="row">
            <br />
            <h2>Crud en Php</h2>
            <p>
        </div>
        <p>
            <br />
        <div class="row">
            <a href="add.php" class="btn btn-success">Ajouter une entreprise</a>
            <br />
            <div class="table-responsive">
                <br />
                <table class="table table-hover table-bordered">
                    <br />
                    <thead>
                        <th>Nom</th>
                        <p>
                            <th>Secteur</th>
                        <p>
                            <th>CP</th>
                        <p>
                    </thead>
                        <p>
                        <br />
                        <tbody>
                        <?php 
                        include 'database.php'; //on inclut notre fichier de connection 
                        $pdo = Database::connect(); //on se connecte à la base 
                        $sql = 'SELECT * FROM entreprise ORDER BY id ASC'; //on formule notre requete 
                        foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                        echo '<br /><tr>';
                        echo '<td>' . $row['Nom'] . '</td><p>';
                        echo'
<td>' . $row['Secteur'] . '</td>
<p>
';
                        echo'
<td>' . $row['CP'] . '</td>
<p>
';
                        echo'
<td>';
                        echo '<a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a>';// un autre td pour le bouton d'edition
                        echo '</td>
<p>
';
                        echo '

<td>';
                        echo '<a class="btn btn-success" href="read.php?id=' . $row['id'] . '">Update</a>';// un autre td pour le bouton d'update
                        echo '</td>
<p>
';
                        echo'

<td>';
                        echo '<a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' ">Delete</a>';// un autre td pour le bouton de suppression
                        echo '</td>
<p>
';
                        echo '</tr>
<p>
';
}
            Database::disconnect(); //on se deconnecte de la base
;
                        ?>
                        </tbody>
                    <p>

                </table>
                <p>

                        </div>
                         <p>

                         </div>
                         <p>

                         </div>
                         <p>
</body>

</html>