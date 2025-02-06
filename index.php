<?php
$couleur = "#FFFFFF"; // Couleur par défaut (blanc)

if (isset($_COOKIE["couleur_preferee"])) {
    $couleur = $_COOKIE["couleur_preferee"];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['couleur'])){
    $couleur = $_POST['couleur'];
    setcookie("couleur_preferee", $couleur, time() + 3600, "/");
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: <?php print($couleur); ?>;
        }
    </style>
</head>
<body>
    <h1>Bienvenue sur notre site !</h1>
    <form method="post" action="index.php">
        <label for="couleur">Choisissez votre couleur préférée :</label>
        <input type="color" id="couleur" name="couleur" value="<?php print($couleur); ?>">
        <button type="submit">Valider</button>
    </form>
</body>
</html>