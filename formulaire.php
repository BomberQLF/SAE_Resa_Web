<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="yacht.css">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire Reservation</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <a id="prestigeLogo" href="index.php"> <span>Prestige</span> Yacht</a>
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
                    <a class="menuNav" href="catalogue.php">Catalogue</a>
                </li>
                <li>
                    <a class="menuNav" href="catalogue.php">Bâteaux</a>
                    <ul class="sous-menu">
                        <li><a href="yacht.php?id=1">Le Bridgerton</a></li>
                        <li><a href="yacht.php?id=2">Hadès 2000</a></li>
                        <li><a href="yacht.php?id=3">Octavius</a></li>
                        <li><a href="yacht.php?id=4">Le Colossal</a></li>
                        <li><a href="yacht.php?id=5">Corbac-X</a></li>
                        <li><a href="yacht.php?id=6">Ventex</a></li>
                    </ul>
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

    <main>
        <div class="retour-page-precedente">
            <a href="catalogue.php">Retour</a>
        </div>
    </main>

    <?php
    // Connexion à la base de données
    $db = new PDO('mysql:host=localhost;dbname=sae_resa_web;port=8889', 'root', 'root');
    $stmt = $db->prepare("SELECT modele, id_bateaux, prixParJour FROM sae_bateaux ORDER BY modele ASC");
    $stmt->execute();
    $yachts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $idReservation = isset($_GET['id']) ? $_GET['id'] : null;

    // Stock les prix dans un array en JS
    echo '<script>';
    echo 'var yachtPrices = {';
    foreach ($yachts as $yacht) {
        echo "'" . $yacht['id_bateaux'] . "': " . $yacht['prix'] . ',';
    }
    echo '};';
    echo '</script>';


    ?>

    <section id="formulaire">
        <h2 id="form-title">Réservation du Yacht</h2>
        <form action="traitement.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="email">Adresse email :</label>
            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br><br>

            <label for="date_debut">Date de début :</label>
            <input type="date" id="date_debut" name="date_debut" required><br><br>

            <label for="date_fin">Date de fin :</label>
            <input type="date" id="date_fin" name="date_fin" required><br><br>

            <select name="modele" id="modele">
                <?php foreach ($yachts as $yacht) { ?>
                    <option value="<?php echo $yacht['id_bateaux'] ?>" <?php echo $yacht['id_bateaux'] == $idReservation ? " selected=selected" : ""; ?>>
                        <?php echo $yacht['modele'] ?>
                    </option>
                <?php } ?>
            </select>

            <div id="prix-total-input">
                <div id="prix-total"><span>Prix total :</span> <span id="total-price">0 €</span></div>
                <input type="submit" id="reserver" name="reserver" value="Réserver">
            </div>


        </form>
    </section>


    <footer>
        <div class="container">
            <div class="footer-section">
                <h3>Bateaux</h3>
                <ul>
                    <li><a href="yacht.php?id=1" class="lien-footer">Le Bridgerton</a></li>
                    <li><a href="yacht.php?id=2" class="lien-footer">HADÈS 2000</a></li>
                    <li><a href="yacht.php?id=3" class="lien-footer">Octavius</a></li>
                    <li><a href="yacht.php?id=4" class="lien-footer">Le Colossal</a></li>
                    <li><a href="yacht.php?id=5" class="lien-footer">Corbac-X</a></li>
                    <li><a href="yacht.php?id=6" class="lien-footer">Ventex</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Destination</h3>
                <ul>
                    <li><a href="antibes.html" class="lien-footer">Antibes</a></li>
                    <li><a href="lamanche.html" class="lien-footer">La Manche</a></li>
                    <li><a href="monaco.html" class="lien-footer">Monaco</a></li>
                    <li><a href="corse.html" class="lien-footer">Corse</a></li>
                    <li><a href="ibiza.html" class="lien-footer">Ibiza</a></li>
                    <li><a href="maldives.html" class="lien-footer">Maldives</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Mentions légales</h3>
                <ul>
                    <li><a href="#" class="lien-footer">Politique de confidentialité</a></li>
                    <li><a href="#" class="lien-footer">Conditions d'utilisation</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>À propos</h3>
                <ul>
                    <li><a href="#" class="lien-footer">Direction</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>