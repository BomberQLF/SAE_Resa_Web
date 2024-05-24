<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="slider.js"></script>
    <script src="script.js"></script>
    <title>Prestige Yacht</title>
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

    <!-- acceuil section -->
    <section id="home">
        <h1>Prestige Yacht</h1>
        <h2>Naviguez avec Luxe</h2>
    </section>

    <!-- A propos section -->
    <section id="a-propos">
        <h3 class="title">à propos</h3>
        <div data-aos="fade-left" data-aos-duration="3000" class="img-desc">
            <div class="left">
                <img class="imgAbout" src="images/accueil-yacht.jpg" alt="">
            </div>
            <div class="right">
                <h4>Plongez dans notre fascinante histoire et découvrez nous rapidement.</h4>
                <p>Cliquez ci-dessus pour apprendre à nous connaitre et en apprendre davantage sur notre parcours
                    captivant.</p>
                <a id="lireHover" href="about.html">Lire Plus</a>
            </div>
        </div>
    </section>

    <!-- CAROUSEL -->

    <section class="carousel">
        <div class="list">
            <div class="item ">
                <figure>
                    <img src="images/1/black-water.jpg" alt="Photo du bateau nommé le Bridgerton">
                </figure>
                <div class="content">
                    <h4>
                        Le Bridgerton
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=1">Réserver</a>
                        <a href="yacht.php?id=1">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/2/1hadès-2000.jpg" alt="Photo du bateau nommé Hadès 2000">
                </figure>
                <div class="content">
                    <h4>
                        Hadès 2000
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=2">Réserver</a>
                        <a href="yacht.php?id=2">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/3/octavius.jpg" alt="Photo du bateau nommé Octavius">
                </figure>
                <div class="content">
                    <h4>
                        Octavius
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=3">Réserver</a>
                        <a href="yacht.php?id=3">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/4/leColossal.jpg" alt="Photo du bateau nommé le Colossal">
                </figure>
                <div class="content">
                    <h4>
                        Le Colossal
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=4">Réserver</a>
                        <a href="yacht.php?id=4">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/5/corbac-x.jpg" alt="Photo du bateau nommé Corbac X">
                </figure>
                <div class="content">
                    <h4>
                        Corbac-X
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=5">Réserver</a>
                        <a href="yacht.php?id=5">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/6/ventex.jpg" alt="Photo du bateau nommé Ventex">
                </figure>
                <div class="content">
                    <h4>
                        Ventex
                    </h4>
                    <div class="more">
                        <a href="formulaire.php?id=6">Réserver</a>
                        <a href="yacht.php?id=6">Voir Plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prev" aria-label="Défile vers le bateau précédent"><i class="fa-solid fa-chevron-left"
                    aria-hidden="true"></i></button>
            <button id="next" aria-label="Défile vers le bateau suivant"><i class="fa-solid fa-chevron-right"
                    aria-hidden="true"></i></button>
        </div>
        <div class="indicators">
            <div class="number" style="display:none;">02</div>
            <ul>
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </section>

    <!-- FIN CAROUSEL -->

    <section id="popular-destination">
        <h4 class="title">Destinations populaires</h4>
        <div class="content">
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/antibes-marina.jpeg" alt="">
                <div class="content" id="carteAntibes">
                    <div>
                        <h4>Antibes</h4>
                        <p>Plongez dans l'élégance d'Antibes depuis nos yachts exclusifs, </p>
                        <p>alliant luxe et aventure dans les eaux scintillantes de la Côte d'Azur.</p>
                        <a class="boxDecouvrir" href="antibes.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/laMancheVignette.jpg" alt="">
                <div class="content" id="carteLaManche">
                    <div>
                        <h4>La Manche</h4>
                        <p>Découvrez la Manche depuis nos yachts exclusifs,</p>
                        <p>élégance et exploration au rendez-vous.</p>
                        <a class="boxDecouvrir" href="lamanche.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/monacoVignette.jpg" alt="">
                <div class="content" id="carteMonaco">
                    <div>
                        <h4>Monaco</h4>
                        <p>Découvrez Monaco depuis nos yachts exclusifs,</p>
                        <p>luxe et prestige sur la French Riviera.</p>
                        <a class="boxDecouvrir" href="monaco.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/corseVignette.jpg" alt="">
                <div class="content" id="carteCorse">
                    <div>
                        <h4>Corse</h4>
                        <p>Découvrez la Corse depuis nos yachts exclusifs,</p>
                        <p>luxe et nature dans les eaux cristallines.</p>
                        <a class="boxDecouvrir" href="corse.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/ibizaVignette.jpg" alt="">
                <div class="content" id="carteIbiza">
                    <div>
                        <h4>Ibiza</h4>
                        <p>Découvrez Ibiza depuis nos yachts exclusifs,</p>
                        <p>luxe et fête sur la Méditerranée.</p>
                        <a class="boxDecouvrir" href="ibiza.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
            <div data-aos="zoom-in" data-aos-duration="1000" class="box">
                <img src="images/maldivesVignette.jpg" alt="">
                <div class="content" id="carteMaldives">
                    <div>
                        <h4>Maldives</h4>
                        <p>Découvrez les Maldives depuis nos yachts exclusifs,</p>
                        <p>luxe et beauté entre sable et eaux turquoise.</p>
                        <a class="boxDecouvrir" href="maldives.html">Découvrir</a>
                    </div>
                </div>
            </div>
            <!-- boîte -->
        </div>
    </section>

    <section class="derniers-bateaux">
        <h5>Nos derniers modèles</h5>
        <div class="yacht-list">
            <?php
            include ("connexion.php");
            $stmt = $db->prepare("SELECT id_bateaux, modele, cabines, prixParJour, image FROM sae_bateaux ORDER BY id_bateaux DESC LIMIT 3");
            $stmt->execute();
            $yachts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <?php foreach ($yachts as $yacht): ?>
                <div data-aos="zoom-in-down" data-aos-duration="1000" class="yacht-item">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($yacht["image"]); ?>"
                        alt="Nos bateaux les plus récents" style="width:100%">
                    <h6 class="yacht-title"><?php echo $yacht["modele"]; ?></h6>
                    <div class="yacht-details">
                        <p class="yacht-price">Prix Par Jours : <?php echo $yacht["prixParJour"]; ?>€</p>
                        <p class="yacht-cabines">Cabines : <?php echo $yacht["cabines"]; ?></p>
                    </div>
                    <a href="yacht.php?id=<?php echo $yacht["id_bateaux"]; ?>" class="voir-plus">Voir plus</a>
                </div>
            <?php endforeach; ?>
        </div>
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