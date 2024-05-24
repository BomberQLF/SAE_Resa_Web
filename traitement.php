<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation de la réservation</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #222;
        }

        h1 {
            color: #29d9d5;
            font-size: 3rem;
        }

        p {
            color: white;
        }

        a {
            color: navajowhite;
        }
    </style>
</head>

<body>
    <?php
    // var_dump($_POST); exit;
    if (isset($_POST['reserver'])) {
        // Intval pour convertir le prix total en un nombre entier et non une chaine de caractère
        $prix_total = intval($_POST['prix_total']);
        var_dump($prix_total);

        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=sae_resa_web;port=8889', 'root', 'root');

        // Prépare la requête d'insertion
        $stmt = $db->prepare("INSERT INTO sae_reservation_client (id_bateaux, date_reservation, date_debut, date_fin, prix_total, nom, prenom, email, modele, second_modele, second_date_debut, second_date_fin) VALUES (:id_bateaux, NOW(), :date_debut, :date_fin, :prix_total, :nom, :prenom, :email, :modele, :second_modele, :second_date_debut, :second_date_fin)");

        // Liaison des paramètres
        $stmt->bindParam(':id_bateaux', $_POST['modele']);
        $stmt->bindParam(':date_debut', $_POST['date_debut']);
        $stmt->bindParam(':date_fin', $_POST['date_fin']);
        $stmt->bindParam(':prix_total', $prix_total);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':modele', $_POST['modele']);
        $stmt->bindParam(':second_modele', $_POST['second_modele']);

        // Vérifie si les dates pour le second bateau sont définies, sinon utilise NULL (C'est une méthode ternaire que j'utilise pour raccourcir le code)
        $second_date_debut = !empty($_POST['second_date_debut']) ? $_POST['second_date_debut'] : null;
        $second_date_fin = !empty($_POST['second_date_fin']) ? $_POST['second_date_fin'] : null;
        $stmt->bindParam(':second_date_debut', $second_date_debut);
        $stmt->bindParam(':second_date_fin', $second_date_fin);



        // Exécute la requête et vérifie le résultat
        if ($stmt->execute()) {
            // Redirige l'utilisateur vers la page de confirmation
            header('Location: traitement.php');
            exit(); // Assure que le script se termine après la redirection
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erreur SQL (" . $errorInfo[0] . "): " . $errorInfo[2];
        }
    }

    // Section pour envoyer le mail à l'utilisateur ainsi qu'à moi
    if ($_SERVER("REQUEST_METHOD") == "POST") {
        // Ici on récupère les éléments utiles du formulaire, et on défini les variables pour pouvoir les réutiliser lors de l'envoi de l'email.
        $prenom = htmlspecialchars($_POST('prenom'));
        $nom = htmlspecialchars($_POST('nom'));
        $email = htmlspecialchars($_POST('email'));
        $prix_total = htmlspecialchars($_POST('prix_total'));
        $date_debut = htmlspecialchars($_POST('date_debut'));
        $date_fin = htmlspecialchars($_POST('date_fin'));
        $second_date_debut = htmlspecialchars($_POST('second_date_debut'));
        $second_date_fin = htmlspecialchars($_POST('second_date_fin'));

        // Ici on doit définir les paramètres qui constituent la fonction mail(), plutot que tout écrire dans les parenthèses, je vais simplement ajouter des variables car ca permet de globaliser ma fonction.
        if ($second_date_debut && $second_date_fin == NULL) {
            $toUser = $email; // Ici je fais en sorte de récupérer l'email qui a été saisi et envoyé dans le formulaire
            $subjectUser = "Confirmation de réservation";
            $messageUser = "Bonjour " . $prenom . " " . $nom . ", \n\n Merci d'avoir reservé l'un de nos majestueux Yacht de luxe !\n Nous vous rappellons que votre réservation a lieu du $date_debut" . "au $date_fin." . "\r Nous vous prions de venir accompagner de votre porte-monnaie afin de payer la généreuse somme de " . $prix_total . " € !";
            $headersUser = "De la part de : tom.murphy@resaweb.murphy.butmmi.o2switch.site";
        } else {
            $toUser = $email; // Ici je fais en sorte de récupérer l'email qui a été saisi et envoyé dans le formulaire
            $subjectUser = "Confirmation de réservation";
            $messageUser = "Bonjour " . $prenom . " " . $nom . ", \n\n Merci d'avoir reservé l'un de nos majestueux Yacht de luxe !\n Nous vous rappellons que votre réservation a lieu du $date_debut" . "au $date_fin pour votre premier Yacht réservé ainsi que du $second_date_debut" . "au $second_date_fin pour votre second Yacht" . "\r Nous vous prions de venir accompagner de votre porte-monnaie afin de payer la généreuse somme de " . $prix_total . " € !";
            $headersUser = "De la part de : tom.murphy@resaweb.murphy.butmmi.o2switch.site";
        }

        // Section pour l'envoi du mail à moi même
        $toMe = "tom.murphy@resaweb.murphy.butmmi.o2switch.site";
        $subjectMe = "Nouvelle réservation";
        $messageMe = "Bonjour Tom, l'utilisateur suivant à reserver un Yacht sur Prestige Yacht :" . "\n Prénom : $prenom" . "\nNom : $nom" . "\nAdresse Email : $email" . "\n\n Très bonne journée à toi patron.";
        $headersMe = "De la part de : tom.murphy@resaweb.murphy.butmmi.o2switch.site";


        if (mail($toUser, $subjectUser, $messageUser, $headersUser) && mail($toMe, $subjectMe, $messageMe, $headersMe)) {
            echo "<h1>Votre réservation a été enregistrée avec succès</h1>";
            echo "<p>Merci pour votre réservation. Veuillez vérifier votre boite mail afin de visionner le récapitulatif de votre réservation.";
            echo "<a href='index.php'>Retour à la page d'accueil</a>";
        } else {
            echo "<h1>Erreur : Le mail récapitulatif n'a pas été envoyé correctement</h1>";
            echo "<p>Veuillez contacter directement la direction par mail.";
        }

    }

    ?>

    <h1>Votre réservation a été enregistrée avec succès</h1>
    <p>Merci pour votre réservation. Veuillez vérifier votre boite mail afin de visionner le récapitulatif de votre
        reservation.</p>
    <a href="index.php">Retour à la page d'accueil</a>
</body>

</html>