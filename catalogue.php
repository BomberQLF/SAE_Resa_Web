<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
    <link rel="stylesheet" href="yacht.css">
    <link rel="stylesheet" href="style.css">
    <title>Catalogue - Yacht</title>
</head>

<body>
    <script>
        AOS.init();
    </script>
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
                    <a class="menuNav blue" href="catalogue.php">Catalogue</a>
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

    <main>
        <section id="catalogue">
            <h1 data-aos="zoom-in">Catalogue de bateaux</h1>
            <form data-aos="zoom-in" action="catalogue.php" method="get">
                <label for="search" class="sr-only">Barre de recherche</label>
                <input type="text" name="search" id="search" placeholder="Rechercher un modèle...">
                <button type="submit">Rechercher</button>
            </form>

            <div id="bateaux">
                <!-- Les bateaux vont apparaitre ici -->
            </div>

            <div id="tri">
                <a class="prix-tri" href="catalogue.php?tri=prix-croissant">Prix croissant</a>
                <a class="prix-tri" href="catalogue.php?tri=prix-decroissant">Prix décroissant</a>
            </div>
            <div class="bateaux">
                <?php
                // Connexion à la base de données
                include("connexion.php");
                // Préparation de la requête SQL pour récupérer les détails des bateaux
                // Si prix-decroissant ne se trouve pas dans l'url, le catalogue classe automatiquement les bateaux par ordre croissant 'ASC'.
                $orderBy = $_GET['tri'] === 'prix-decroissant' ? 'DESC' : 'ASC';

                $stmt = $db->prepare("SELECT * FROM sae_bateaux WHERE modele LIKE :search ORDER BY prixParJour $orderBy");

                $stmt->bindValue(':search', '%' . $_GET['search'] . '%', PDO::PARAM_STR);

                $stmt->execute();

                // Affichage des détails des bateaux dans le catalogue
                while ($yacht = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Vérification si le dossier correspondant à l'ID existe
                    $dossier = "images/" . $yacht['id_bateaux'];
                    if (is_dir($dossier)) {
                        // Récupérer tous les fichiers d'images du dossier
                        $images = glob($dossier . "/*.{jpg,jpeg,png,gif,webp}", GLOB_BRACE);
                        if (!empty($images)) {
                            // Sélectionner le premier fichier d'image
                            $firstImage = reset($images);

                            echo '<div data-aos="zoom-in-down" data-aos-duration="1200" class="bateau">';
                            echo '<img src="' . $firstImage . '" alt="' . 'Voici notre bateau nommé ' . $yacht['modele'] . '">';
                            echo '<div class="details">';
                            echo '<h2>' . $yacht['modele'] . '</h2>';
                            echo '<p>Vitesse : ' . $yacht['vitesse'] . ' noeuds</p>';
                            echo '<p>Cabines : ' . $yacht['cabines'] . '</p>';
                            echo '<p>Prix par jour : ' . $yacht['prixParJour'] . ' €</p>';
                            echo '<p>Longueur : ' . $yacht['longueur'] . ' mètres</p>';
                            echo '<div class="button-container">';
                            echo '<a href="formulaire.php?id=' . $yacht['id_bateaux'] . '" id="directionFormulaire" class="btn-reserver" data-yacht-id="' . $yacht['id_bateaux'] . '">Réserver</a>';
                            echo '<a href="yacht.php?id=' . $yacht['id_bateaux'] . '" class="btn-voir-plus">Voir Plus</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }
                }
                ?>
            </div>
        </section>
    </main>
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
                    <li><a href="mentions-legales.html" class="lien-footer">Politique de confidentialité</a></li>
                    <li><a href="termes-conditions.html" class="lien-footer">Termes & Conditions</a></li>
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