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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
    <script src="script.js"></script>
    <link rel="stylesheet" href="yacht.css">
    <link rel="stylesheet" href="style.css">
    <title>Location Yacht</title>
</head>

<body>
    <script>
        AOS.init();
    </script>
    <?php
    // Connexion à la base de données
    include ("connexion.php");

    // Vérification si le paramètre 'id' est défini dans l'URL
    if (isset($_GET['id'])) {
        // Récupération de l'ID du bateau depuis l'URL
        $id = $_GET['id'];

        // Préparation de la requête SQL pour récupérer les détails du bateau correspondant à l'ID
        $stmt = $db->prepare("SELECT modele, vitesse, cabines, prixParJour, description, longueur, id_bateaux FROM sae_bateaux WHERE id_bateaux = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $yacht = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si le bateau existe dans la base de données
        if ($yacht) {
            ?>
            <header>
                <nav>
                    <a href="#s1" class="skip-link">Aller au contenu</a>
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
                            <a class="menuNav blue" href="#">Bâteaux</a>
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

            <div class="containers">
                <section id="s1">
                    <?php
                    // Vérification si le dossier correspondant à l'ID existe
                    $dossier = "images/" . $_GET['id'];
                    if (is_dir($dossier)) {
                        // Parcourir le dossier et afficher les images
                        $files = scandir($dossier);
                        natcasesort($files);
                        $imageCount = 0; // Compteur pour les images que je récupuère
                        foreach ($files as $file) {
                            // Vérification si le fichier est une image
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($ext, array("jpg", "jpeg", "png", "gif", "webp"))) {
                                // Incrémenter le compteur d'images
                                $imageCount++;
                                // Organiser les images dans les divs xl et sm
                                if ($imageCount == 1) {
                                    echo '<div class="xl">';
                                    echo '<img data-aos="zoom-in-down" data-aos-duration="1200" src="' . $dossier . '/' . $file . '" alt="">';
                                    echo '</div>';
                                } elseif ($imageCount == 2) {
                                    echo '<div class="sm">';
                                    echo '<img data-aos="zoom-in" data-aos-duration="1200" src="' . $dossier . '/' . $file . '" alt="">';
                                    echo '</div>';
                                } else {
                                    // Afficher les autres images
                                    echo '<div class="sm">';
                                    echo '<img data-aos="zoom-in" data-aos-duration="1200" src="' . $dossier . '/' . $file . '" alt="">';
                                    echo '</div>';
                                }
                            }
                        }
                    } else {
                        echo "Dossier d'images non trouvé pour cet ID.";
                    }
                    ?>
                </section>

                <section id="s2">
                    <div>
                        <h1 data-aos="zoom-in" data-aos-duration="1200"><?php echo $yacht["modele"]; ?></h1>
                        <h2 data-aos="zoom-in" data-aos-duration="1200">Yacht à louer</h2>
                        <a id="lien-reserver" href="formulaire.php?id=<?php echo $yacht['id_bateaux']; ?>">Réserver</a>
                    </div>
                    <div class="descriptif-section">
                        <h3 data-aos="zoom-in-right" data-aos-duration="1200" class="descriptif">Prix Par Jours</h3>
                        <h4 data-aos="zoom-in-right" data-aos-duration="1200" class="bold"><?php echo $yacht["prixParJour"]; ?>€
                        </h4>
                        <h3 data-aos="zoom-in-right" data-aos-duration="1200" class="descriptif">Vitesse</h3>
                        <h4 data-aos="zoom-in-right" data-aos-duration="1200" class="bold"><?php echo $yacht["vitesse"]; ?>
                            noeuds</h4>
                        <h3 data-aos="zoom-in-right" data-aos-duration="1200" class="descriptif">Longueur</h3>
                        <h4 data-aos="zoom-in-right" data-aos-duration="1200" class="bold"><?php echo $yacht["longueur"]; ?>
                            mètres</h4>
                        <h3 data-aos="zoom-in-right" data-aos-duration="1200" class="descriptif">Cabines</h3>
                        <h4 data-aos="zoom-in-right" data-aos-duration="1200" class="bold"><?php echo $yacht["cabines"]; ?></h4>
                    </div>
                    <div class="descriptif-section">
                        <h5 data-aos="fade-down" data-aos-duration="1200" class="descriptif">Description</h>
                            <h6 data-aos="fade-down" data-aos-duration="1200" id="descriptionYacht">
                                <?php echo $yacht["description"]; ?>
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