<!--register.php -->
<?php include 'nav.php'; ?>
<?php
include 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($password_repeat)) {
        $error_message = "Bitte alle Felder ausfüllen.";
    } elseif ($password !== $password_repeat) {
        $error_message = "Passwörter stimmen nicht überein.";
    } else {
        try {
            $stmt =  $link ->prepare("SELECT COUNT(*) FROM users WHERE username = ? OR email = ?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            $stmt->close();

            if ($count > 0) {
                $error_message = "Benutzername oder E-Mail bereits vergeben.";
            } else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $stmt =  $link ->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $hashed_password);
                $stmt->execute();
                $stmt->close();
                $success_message = "Registrierung erfolgreich.";
            }
        } catch (mysqli_sql_exception $e) {
            $error_message = "Fehler: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrieren</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Registrieren</h2>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php elseif (!empty($success_message)): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <form action="register.php" method="post">
            <div>
                <label for="username">Benutzername:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="email">E-Mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <label for="password_repeat">Passwort bestätigen:</label>
                <input type="password" id="password_repeat" name="password_repeat" required>
            </div>
            <button type="submit">Registrieren</button>
        </form>
    </div>
</body>
</html>






