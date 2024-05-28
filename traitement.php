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
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reserver'])) {
        // Intval pour convertir le prix total en un nombre entier et non une chaine de caractère
        $prix_total = intval($_POST['prix_total']);

        // Connexion à la base de données
        include ("connexion.php");

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

        // Vérifie si les dates pour le second bateau sont définies, sinon utilise NULL
        $second_date_debut = !empty($_POST['second_date_debut']) ? $_POST['second_date_debut'] : null;
        $second_date_fin = !empty($_POST['second_date_fin']) ? $_POST['second_date_fin'] : null;
        $stmt->bindParam(':second_date_debut', $second_date_debut);
        $stmt->bindParam(':second_date_fin', $second_date_fin);

        // Exécute la requête et vérifie le résultat
        if ($stmt->execute()) {
            // Section pour envoyer le mail à l'utilisateur ainsi qu'à moi
            $prenom = htmlspecialchars($_POST['prenom']);
            $nom = htmlspecialchars($_POST['nom']);
            $email = htmlspecialchars($_POST['email']);
            $prix_total = htmlspecialchars($_POST['prix_total']);
            $date_debut = htmlspecialchars($_POST['date_debut']);
            $date_fin = htmlspecialchars($_POST['date_fin']);
            $second_date_debut = htmlspecialchars($_POST['second_date_debut']);
            $second_date_fin = htmlspecialchars($_POST['second_date_fin']);
            
            $toUser = $email;
            $subjectUser = "Confirmation de réservation";
            if (empty($_POST['second_date_debut']) && empty($_POST['second_date_fin'])) {
                $messageUser = "Bonjour $prenom $nom,\n\nMerci d'avoir réservé l'un de nos majestueux Yachts de luxe !\nNous vous rappelons que votre réservation a lieu du $date_debut au $date_fin.\n\nVeuillez venir accompagné de votre porte-monnaie afin de payer la généreuse somme de $prix_total € ! \n\nCordialement,\nLa direction de Prestige Yacht.";
            } else {
                $second_date_debut = htmlspecialchars($_POST['second_date_debut']);
                $second_date_fin = htmlspecialchars($_POST['second_date_fin']);
                $messageUser = "Bonjour $prenom $nom,\n\nMerci d'avoir réservé l'un de nos majestueux Yachts de luxe !\nNous vous rappelons que votre réservation a lieu du $date_debut au $date_fin pour votre premier Yacht réservé.\nConcernant votre second Yacht réservé, les dates de réservation sont du $second_date_debut au $second_date_fin. \n\nVeuillez venir accompagné de votre porte-monnaie afin de payer la généreuse somme de $prix_total € !";
            }
            $headersUser = "From: tom.murphy@resaweb.murphy.butmmi.o2switch.site";

            $toMe = "tom.murphy@resaweb.murphy.butmmi.o2switch.site";
            $subjectMe = "Nouvelle réservation";
            $messageMe = "Bonjour Tom,\nL'utilisateur suivant a réservé un Yacht sur Prestige Yacht :\nPrénom : $prenom\nNom : $nom\nAdresse Email : $email\n\nTrès bonne journée à toi patron.";
            $headersMe = "From: tom.murphy@resaweb.murphy.butmmi.o2switch.site";

            if (mail($toUser, $subjectUser, $messageUser, $headersUser) && mail($toMe, $subjectMe, $messageMe, $headersMe)) {
                echo "<h1>Votre réservation a été enregistrée avec succès</h1>";
                echo "<p>Merci pour votre réservation. Veuillez vérifier votre boite mail afin de visionner le récapitulatif de votre réservation.</p>";
                echo "<a href='index.php'>Retour à la page d'accueil</a>";
            } else {
                echo "<h1>Erreur : Le mail récapitulatif n'a pas été envoyé correctement</h1>";
                echo "<p>Veuillez contacter directement la direction par mail.</p>";
            }
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erreur SQL (" . $errorInfo[0] . "): " . $errorInfo[2];
        }
    }
    ?>
</body>

</html>