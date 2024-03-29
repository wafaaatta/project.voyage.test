<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" rel="stylesheet">
<title>Dashboard</title>

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.voyage {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    padding: 20px;
}

.voyage h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.voyage p {
    font-size: 16px;
    color: #333;
    margin-bottom: 20px;
}

.voyage img {
    max-width: 100%;
    border-radius: 8px;
    margin-bottom: 10px;
}
</style>

<body>



<?php
require_once "../classes/voyages.php";

//une instance de la classe Voyage
$tour = new Voyage;
// j'appelle la méthode add pour ajouter un voyage dans la base de données
$tour->showAll();  



?>
</body>
</html>