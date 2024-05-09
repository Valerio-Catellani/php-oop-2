<?php
include __DIR__ . "/Models/Prodotti.php";

$accessori = Prodotto::fetchAll('Accessori_db');
$cibo = Prodotto::fetchAll('Cibo_db');
$giochi = Prodotto::fetchAll('Giochi_db');



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include __DIR__ . "/Views/head/head.php"; ?>
    <link rel="stylesheet" href="style/hype_utility.css">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/media_query.css">
    <link rel="stylesheet" href="style/animation.css">

    <title>Negozio di Animali</title>
</head>

<body class="bg-dark text-white">
    <?php include __DIR__ . "/Views/body/header.php"; ?>
    <main>

    </main>
    <?php include __DIR__ . "/Views/body/footer.php" ?>
</body>

</html>