<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Log In</title>
</head>
<body>
    <section class="form-section">
        <h1 class="form-title">Log In</h1>
        <form action="login.php" method="post" class="auth-form">
            <div class="form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" required class="form-input" placeholder="youremail@abc.com">
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" required class="form-input">
            </div>
            <div class="form-group button-group-vertical">
                <button type="submit" class="form-button">Log In</button>
                <button type="button" class="form-button" onclick="location.href='signup.php'">Sign Up</button>
            </div>
        </form>
    </section>
</body>
</html>

