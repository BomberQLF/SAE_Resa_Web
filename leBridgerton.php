<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bateaux</h1>
    <?php
    $db = new PDO('mysql:host=localhost;dbname=sae_resa_web;port=8889', 'root', 'root');
    $stmt = $db->query("SELECT modele, vitesse, cabines, prixParJour, disponible FROM sae_bateaux");
    $result = $stmt->fetchAll();
    ?>

    <?php
    if (count($result) > 0) {
        foreach ($result as $bateau) {
            echo "<div class='display-boat-container'>";
            echo "<h2>Modèle: " . htmlspecialchars($bateau['modele']) . "</h2>";
            echo "<p>Vitesse: " . htmlspecialchars($bateau['vitesse']) . " km/h</p>";
            echo "<p>Nombre de cabines: " . htmlspecialchars($bateau['cabines']) . "</p>";
            echo "<p>Prix par jour: " . htmlspecialchars($bateau['prixParJour']) . " €</p>";
            echo "<hr>"; // Ajoute une ligne horizontale pour séparer visuellement chaque bateau
            echo "</div>";
        }
    } else {
        echo "<p>Aucun bateau trouvé.</p>";
    }
    ?>

</body>

</html>