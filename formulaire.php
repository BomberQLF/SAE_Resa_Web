<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
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
                    <a class="menuNav" href="#">Bâteaux</a>
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
                    <a class="menuNav" href="about.html">À propos</a>
                </li>
            </ul>
        </nav>
    </header>

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
        <h1 id="form-title">Réservation du Yacht</h1>
        <form action="traitement.php" method="post">
            <label for="nom">Nom : <span class="formulaire-required">(Obligatoire)</span></label>
            <input type="text" id="nom" name="nom" required><br><br>

            <label for="prenom">Prénom : <span class="formulaire-required">(Obligatoire)</span></label>
            <input type="text" id="prenom" name="prenom" required><br><br>

            <label for="email">Adresse email : <span class="formulaire-required">(Obligatoire)</span></label>
            <input type="email" id="email" name="email" placeholder="exemple@gmail.com" required><br><br>

            <label for="date_debut">Date de début : <span class="formulaire-required">(Obligatoire)</span></label>
            <input type="date" id="date_debut" name="date_debut" required><br><br>

            <label for="date_fin">Date de fin : <span class="formulaire-required">(Obligatoire)</span></label>
            <input type="date" id="date_fin" name="date_fin" required><br><br>

            <label for="modele">Bateau réservé</label>
            <select name="modele" id="modele">
                <?php foreach ($yachts as $yacht) { ?>
                    <option value="<?php echo $yacht['id_bateaux'] ?>" <?php echo $yacht['id_bateaux'] == $idReservation ? " selected=selected" : ""; ?>>
                        <?php echo $yacht['modele'] ?>
                    </option>
                <?php } ?>
            </select>

            <label for="second_modele">Second Modèle à Réserver : <span
                    class="formulaire-required">(Optionnel)</span></label>
            <select name="second_modele" id="second_modele">
                <option value="">Sélectionner un Yacht</option>
                <?php foreach ($yachts as $yacht) {
                    if ($yacht['id_bateaux'] != $idReservation) { ?>
                        <option value="<?php echo $yacht['id_bateaux'] ?>">
                            <?php echo $yacht['modele'] ?>
                        </option>
                    <?php }
                } ?>
            </select>
            <label for="second_date_debut">Date de début du second bateau : <span
                    class="formulaire-required">(Obligatoire)</span></label>
            <input type="date" id="second_date_debut" name="second_date_debut"><br><br>

            <label for="second_date_fin">Date de fin du second bateau : <span
                    class="formulaire-required">(Obligatoire)</span></label>
            <input type="date" id="second_date_fin" name="second_date_fin"><br><br>

            <div id="prix-total-input">
                <div id="prix-total"><span class="blueColor">Prix total :</span> <span id="total-price">0 €</span></div>
                <input type="submit" id="reserver" name="reserver" value="Réserver">
                <input type="hidden" id="prix_total_hidden" name="prix_total">
            </div>
        </form>
    </section>


    <footer>
        <div class="container">
            <div class="footer-section">
                <p>Bateaux</p>
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
                <p>Destination</p>
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
                <p>Mentions légales</p>
                <ul>
                    <li><a href="#" class="lien-footer">Politique de confidentialité</a></li>
                    <li><a href="#" class="lien-footer">Conditions d'utilisation</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <p>À propos</p>
                <ul>
                    <li><a href="about.html" class="lien-footer">Direction</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>

</html>