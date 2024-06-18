<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=documentation.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['files'])) {
    $files = $_POST['files'];
    $placeholders = implode(',', array_fill(0, count($files), '?'));
    $types = str_repeat('s', count($files));
    
    // Prepare SQL to delete from database
    $sql = "DELETE FROM documents WHERE user_id = ? AND filepath IN ($placeholders)";
    if ($stmt = $link->prepare($sql)) {
        $stmt->bind_param("i" . $types, $user_id, ...$files);
        $stmt->execute();
        $stmt->close();
    }

    // Delete files from server
    foreach ($files as $file) {
        if (file_exists($file)) {
            unlink($file);
        }
    }

    header("Location: documentation.php?status=success&message=Dateien erfolgreich gelöscht.");
    exit();
} else {
    header("Location: documentation.php?status=error&message=Keine Dateien ausgewählt.");
    exit();
}
?>
