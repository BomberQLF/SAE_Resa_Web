<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Confirmation de la réservation</title>
</head>

<body>
    <?php
    // var_dump($_POST); exit;
    if (isset($_POST['reserver'])) {
        // Connexion à la base de données
        $db = new PDO('mysql:host=localhost;dbname=sae_resa_web;port=8889', 'root', 'root');

        $stmt = $db->prepare("INSERT INTO sae_reservation_client (id_bateaux, date_reservation, date_debut, date_fin, prix_total, nom, prenom, email, modele, second_modele, second_date_debut, second_date_fin)  VALUES (:id_bateaux, NOW(), :date_debut, :date_fin, :prix_total, :nom, :prenom, :email, :modele, :second_modele, :second_date_debut, :second_date_fin)");
        $stmt->bindParam(':id_bateaux', $_POST['modele']); 
        $stmt->bindParam(':date_debut', $_POST['date_debut']);
        $stmt->bindParam(':date_fin', $_POST['date_fin']);
        $stmt->bindParam(':prix_total', $prixTotal);
        $stmt->bindParam(':nom', $_POST['nom']);
        $stmt->bindParam(':prenom', $_POST['prenom']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->bindParam(':modele', $_POST['modele']);
        $stmt->bindParam(':second_modele', $_POST['second_modele']);
        $stmt->bindParam(':second_date_debut', $_POST['second_date_debut']);
        $stmt->bindParam(':second_date_fin', $_POST['second_date_fin']);

        if ($stmt->execute()) {
            // Rediriger l'utilisateur vers la page de confirmation
            header('Location: traitement.php');
            exit(); // Assure que le script se termine après la redirection
        } else {
            $errorInfo = $stmt->errorInfo();
            echo "Erreur SQL (" . $errorInfo[0] . "): " . $errorInfo[2];
        }
    }
    ?>

    <h1>Votre réservation a été enregistrée avec succès</h1>
    <p>Merci pour votre réservation. Nous vous contacterons prochainement pour confirmer les détails de votre
        réservation.</p>
    <a href="index.php">Retour à la page d'accueil</a>
</body>

</html>