<!-- login.php -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include 'nav.php';
include 'db.php';

$error_message = $success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error_message = "Bitte Benutzername und Passwort eingeben.";
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $success_message = "Login erfolgreich.";
                    header("Location: index.php");
                    exit();
                } else {
                    $error_message = "Ungültiges Passwort.";
                }
            } else {
                $error_message = "Benutzer nicht gefunden.";
            }
            $stmt->close();
        } else {
            $error_message = "Datenbankfehler: " . $link->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmelden</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="logo-container">
                <img src="muster.png" alt="Muster Logo">
            </div>
            <h2>Ein Account für alles von EcoBins</h2>
            <p>Mit einer EcoBins-ID und einem Passwort hast du Zugriff auf alle Dienste von EcoBins. Melde dich an, um deinen Account zu verwalten.</p>
            <?php if (!empty($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form action="login.php" method="post">
                <div class="input-group">
                    <label for="username">Benutzername:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Passwort:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Anmelden</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
