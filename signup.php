<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <section class="form-section">
        <h1 class="form-title">Sign Up</h1>

        <form action="signup-process.php" method="post" class="signup-form">
            <div class="form-group">
                <label for="sae_prenom" class="form-label">First Name:</label>
                <input type="text" id="sae_prenom" name="sae_prenom" required class="form-input" placeholder="James">
            </div>
            <div class="form-group">
                <label for="sae_nom" class="form-label">Last Name:</label>
                <input type="text" id="sae_nom" name="sae_nom" required class="form-input" placeholder="MURPHY">
            </div>
            <div class="form-group">
                <label for="sae_motDePasse" class="form-label">Password: (6 characters minimum)</label>
                <input type="password" id="sae_motDePasse" name="sae_motDePasse" minlength="6" required class="form-input">
            </div>
            <div class="form-group">
                <label for="confirm_password" class="form-label">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required class="form-input">
            </div>
            <div class="form-group">
                <label for="sae_dateNaissance" class="form-label">Date of Birth:</label>
                <input type="date" id="sae_dateNaissance" name="sae_dateNaissance" required class="form-input">
            </div>
            <div class="form-group">
                <label for="sae_email" class="form-label">Email:</label>
                <input type="email" id="sae_email" name="sae_email" required class="form-input" placeholder="youremail@abc.com">
            </div>
            <div class="form-group button-group">
                <button type="submit" class="form-button sign-up">Sign Up</button>
                <button type="button" class="form-button log-in" onclick="location.href='login.php'">Log In</button>
            </div>
        </form>
    </section>
</body>

</html>
