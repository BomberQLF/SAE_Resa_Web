<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js"></script>
    <link rel="stylesheet" href="yacht.css">
    <link rel="stylesheet" href="style.css">
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
    if (isset($_GET['id'])) {
        // Récupération de l'ID du bateau depuis l'URL
        $id = $_GET['id'];

        // Préparation de la requête SQL pour récupérer les détails du bateau correspondant à l'ID
        $stmt = $db->prepare("SELECT modele, vitesse, cabines, prixParJour, description, longueur FROM sae_bateaux WHERE id_bateaux = :id");
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $yacht = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérification si le bateau existe dans la base de données
        if ($yacht) {
            ?>
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

            <div class="containers">
                <section id="s1">
                    <?php
                    // Vérification si le dossier correspondant à l'ID existe
                    $dossier = "images/" . $_GET['id'];
                    if (is_dir($dossier)) {
                        // Parcourir le dossier et afficher les images
                        $dir = opendir($dossier);
                        $imageCount = 0; // Compteur pour les images récupérées
                        while (($file = readdir($dir)) !== false && $imageCount < 7) {
                            // Vérifier si le fichier est une image
                            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                            if (in_array($ext, array("jpg", "jpeg", "png", "gif", "webp"))) {
                                // Incrémenter le compteur d'images
                                $imageCount++;
                                // Organiser les images dans les divs xl et sm
                                if ($imageCount == 1) {
                                    echo '<div class="xl">';
                                    echo '<img src="' . $dossier . '/' . $file . '" alt="' . $file . '">';
                                    echo '</div>';
                                } else {
                                    echo '<div class="sm">';
                                    echo '<img src="' . $dossier . '/' . $file . '" alt="' . $file . '">';
                                    // Afficher deux images dans sm s'il reste des images à récupérer
                                    $imageCount++;
                                    if ($imageCount <= 7) {
                                        $file = readdir($dir);
                                        echo '<img src="' . $dossier . '/' . $file . '" alt="' . $file . '">';
                                    }
                                    echo '</div>';
                                }
                            }
                        }
                        closedir($dir);
                    } else {
                        echo "Dossier d'images non trouvé pour cet ID.";
                    }
                    ?>
                </section>

                <section id="s2">
                    <div>
                        <h3><?php echo $yacht["modele"]; ?></h3>
                        <h6>Yacht à louer</h6>
                        <button id="btn-reserver" type="button">Réserver</button>
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