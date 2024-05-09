<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="style.css">
    <script src="slider.js"></script>
    <script src="script.js"></script>
    <title>Prestige Yacht</title>
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

    <!-- acceuil section -->
    <section id="home">
        <h1>Prestige Yacht</h1>
        <h4>Naviguez avec Luxe</h4>
    </section>

    <!-- A propos section -->
    <section id="a-propos">
        <h2 class="title">à propos</h2>
        <div class="img-desc">
            <div class="left">
                <img class="imgAbout" src="images/accueil-yacht.jpeg" alt="image-bateau-bienvenue">
            </div>
            <div class="right">
                <h3>Plongez dans notre fascinante histoire et découvrez nous rapidement.</h3>
                <p>Cliquez ci-dessus pour apprendre à nous connaitre et en apprendre davantage sur notre parcours
                    captivant.</p>
                <a id="lireHover" href="#">Lire Plus</a>
            </div>
        </div>
    </section>

    <!-- CAROUSEL -->
    <!-- CAROUSEL -->
    <!-- CAROUSEL -->
    <!-- CAROUSEL -->
    <!-- CAROUSEL -->

    <section class="carousel">
        <div class="list">
            <div class="item ">
                <figure>
                    <img src="images/1/black-water.webp">
                </figure>
                <div class="content">
                    <h2>
                        LE BRIDGERTON
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=1">Réserver</a>
                        <a href="yacht.php?id=1">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/2/1hadès-2000.jpg">
                </figure>
                <div class="content">
                    <h2>
                        HADÈS 2000
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=2">Réserver</a>
                        <a href="yacht.php?id=2">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/3/octavius.webp">
                </figure>
                <div class="content">
                    <h2>
                        OCTAVIUS
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=3">Réserver</a>
                        <a href="yacht.php?id=3">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/4/leColossal.webp">
                </figure>
                <div class="content">
                    <h2>
                        LE COLOSSAL
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=4">Réserver</a>
                        <a href="yacht.php?id=4">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/5/corbac-x.webp">
                </figure>
                <div class="content">
                    <h2>
                        CORBAC-X
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=5">Réserver</a>
                        <a href="yacht.php?id=5">Voir Plus</a>
                    </div>
                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="images/6/ventex.webp">
                </figure>
                <div class="content">
                    <h2>
                        VENTEX
                    </h2>
                    <div class="more">
                        <a href="yacht.php?id=6">Réserver</a>
                        <a href="yacht.php?id=6">Voir Plus</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="arrows">
            <button id="prev"><i class="fa-solid fa-chevron-left"></i></button>
            <button id="next"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
        <div class="indicators">
            <div class="number">02</div>
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
        <h2 class="title">Destinations populaires</h2>
        <div class="content">
            <!-- boîte -->
            <div class="box">
                <img src="images/antibesVignette.jpg" alt="">
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
            <!-- boîte -->
            <div class="box">
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
            <!-- boîte -->
            <div class="box">
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
            <!-- boîte -->
            <div class="box">
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
            <!-- boîte -->
            <div class="box">
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
            <!-- boîte -->
            <div class="box">
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

    <div class="yacht-list">
        <div class="yacht-item">
            <img src=".jpg" alt="Le Colossal" style="width:100%">
            <h2>Le Colossal</h2>
            <p>Prix: 5000€/jour</p>
            <p>Capacité: 10 personnes</p>
            <a href="yacht.php?id=4" class="voir-plus">Voir plus</a>
        </div>

        <div class="yacht-item">
            <img src="boat2.jpg" alt="Corbac-X" style="width:100%">
            <h2>Corbac-X</h2>
            <p>Prix: 6000€/jour</p>
            <p>Capacité: 12 personnes</p>
            <a href="yacht.php?id=5" class="voir-plus">Voir plus</a>
        </div>

        <div class="yacht-item">
            <img src="boat3.jpg" alt="Ventex" style="width:100%">
            <h2>Ventex</h2>
            <p>Prix: 7000€/jour</p>
            <p>Capacité: 15 personnes</p>
            <a href="yacht.php?id=6" class="voir-plus">Voir plus</a>
        </div>
    </div>

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