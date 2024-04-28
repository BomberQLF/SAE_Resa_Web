<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="yacht.css">
    <title>Location Yacht</title>
</head>

<body>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Connexion à la base de données
$db = new PDO('mysql:host=localhost;dbname=sae_resa_web;port=8889', 'root', 'root');

// Vérification si le paramètre 'id' est défini dans l'URL
if(isset($_GET['id'])) {
    // Récupération de l'ID du bateau depuis l'URL
    $id = $_GET['id'];

    // Préparation de la requête SQL pour récupérer les détails du bateau correspondant à l'ID
    $stmt = $db->prepare("SELECT modele, vitesse, cabines, prixParJour, description, longueur FROM sae_bateaux WHERE id_bateaux = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $yacht = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($yacht);

    // Vérification si le bateau existe dans la base de données
    if($yacht) {
?>
<header>
    <nav>
        <div class="logo">
            <a id="prestigeLogo" href="index.html"> <span>Prestige</span> Yacht</a>
        </div>
        <ul class="menu">
            <li>
                <a class="menuNav" href="#popular-destination">Destinations</a>
                <ul class="sous-menu">
                    <li><a href="antibes.html">Antibes</a></li>
                    <li><a href="lamanche.html">La Manche</a></li>
                    <li><a href="monaco.html">Monaco</a></li>
                    <li><a href="corse.html">Corse</a></li>
                    <li><a href="ibiza.html">Ibiza</a></li>
                    <li><a href="maldives.html">Maldives</a></li>
                </ul>
            </li>
            <li>
                <a class="menuNav" href="#">Bâteaux</a>
            </li>
            <li>
                <a class="menuNav" href="#a-propos">À propos</a>
            </li>
            <li>
                <a href="#" class="menuNav"><img id="navImage" src="images/user-solid.webp" alt=""></a>
            </li>
        </ul>
    </nav>
</header>

<div class="container">
        <section id="s1">
            <div class="xl">
                <img src="https://placehold.co/680x450" alt="">
            </div>
            <div class="sm">
                <img src="https://placehold.co/300x200" alt="">
                <img src="https://placehold.co/300x200" alt="">
            </div>
            <div class="xl">
                <img src="https://placehold.co/680x450" alt="">
            </div>
            <div class="sm">
                <img src="https://placehold.co/300x200" alt="">
                <img src="https://placehold.co/300x200" alt="">
            </div>
            <div class="xl">
                <img src="https://placehold.co/680x450" alt="">
            </div>
        </section>

        <section id="s2">
            <div>
                <h3><?php echo $yacht["modele"]; ?></h3>
                <h6>Yacht à louer</h6>
                <button type="button">Réserver</button>
            </div>
            <div class="descriptif-section">
                <h3 class="descriptif">Prix Par Jours</h3>
                <h6 class="bold"><?php echo $yacht["prixParJour"]; ?>€</h6>
                <h3 class="descriptif">Vitesse</h3>
                <h6 class="bold"><?php echo $yacht["vitesse"]; ?> noeuds</h6>
                <h3 class="descriptif">Longueur</h3>
                <h6 class="bold"><?php echo $yacht["longueur"]; ?> mètres</h6>
                <h3 class="descriptif">Cabines</h3>
                <h6 class="bold"><?php echo $yacht["cabines"]; ?></h6>
            </div>
            <div class="descriptif-section">
                <h3 class="descriptif">Description</h3>
                <h6 id="descriptionYacht">
                <?php echo $yacht["description"];?>
                </h6>
            </div>
        </section>
</div>

<?php
    } else {
        echo "Le bateau demandé n'existe pas.";
    }
} else {
    echo "Identifiant du bateau non spécifié.";
}
?>

<section class="details">
    <details>
        <summary>Test</summary>
    </details>
</section>

</body>

</html>
