<!--login.php -->
<?php include 'nav.php'; ?>
<?php
include 'db.php';

$error_message = $success_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username and password are provided
    if (empty($username) || empty($password)) {
        $error_message = "Bitte Benutzername und Passwort eingeben.";
    } else {
        // Fetch the user from the database
        $sql = "SELECT * FROM users WHERE username = ?";
        if ($stmt = $link->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    $success_message = "Login erfolgreich.";
                    // Here you can start the session and store user information
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
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container">
        <h2>Anmelden</h2>
        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        <form action="login.php" method="post">
            <div>
                <label for="username">Benutzername:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div>
                <label for="password">Passwort:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Einloggen</button>
        </form>
    </div>
</body>
</html>




