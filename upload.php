<!-- upload.php -->
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=documentation.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $files = $_FILES['file'];

    if (is_array($files['name'])) {
        for ($i = 0; $i < count($files['name']); $i++) {
            $filename = $files['name'][$i];
            $filepath = 'uploads/' . basename($filename);

            $sql = "SELECT COUNT(*) FROM documents WHERE user_id = ? AND filename = ?";
            if ($stmt = $link->prepare($sql)) {
                $stmt->bind_param("is", $user_id, $filename);
                $stmt->execute();
                $stmt->bind_result($count);
                $stmt->fetch();
                $stmt->close();

                if ($count > 0) {
                    header("Location: documentation.php?status=error&message=Eine Datei mit dem Namen '$filename' existiert bereits.");
                    exit();
                }
            }

            // Proceed with file upload
            if (move_uploaded_file($files['tmp_name'][$i], $filepath)) {
                $sql = "INSERT INTO documents (user_id, filename, filepath) VALUES (?, ?, ?)";
                if ($stmt = $link->prepare($sql)) {
                    $stmt->bind_param("iss", $user_id, $filename, $filepath);
                    $stmt->execute();
                    $stmt->close();
                } else {
                    header("Location: documentation.php?status=error&message=Fehler beim Hochladen der Datei '$filename'.");
                    exit();
                }
            } else {
                header("Location: documentation.php?status=error&message=Fehler beim Hochladen der Datei '$filename'.");
                exit();
            }
        }

        header("Location: documentation.php?status=success&message=Dateien erfolgreich hochgeladen.");
        exit();
    } else {
        header("Location: documentation.php?status=error&message=Keine Dateien zum Hochladen gefunden.");
        exit();
    }
} else {
    header("Location: documentation.php?status=error&message=Ungültige Anforderung.");
    exit();
}
