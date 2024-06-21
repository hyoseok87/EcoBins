<?php
include 'nav.php';
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?redirect=documentation.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM documents WHERE user_id = ?";
$documents = [];

if ($stmt = $link->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $documents[] = $row;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Dokumentation</title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script>
        function toggleCheckboxes(source) {
            checkboxes = document.getElementsByName('files[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        // Funktion, um eine Nachricht nach 10 Sekunden verschwinden zu lassen
        window.onload = function() {
            setTimeout(function() {
                var messageElement = document.querySelector('.alert');
                if (messageElement) {
                    messageElement.style.display = 'none';
                }
            }, 10000); // 10000ms = 10 Sekunden
        };
    </script>
</head>
<body>
    <div class="login-container">
        <div class="documentation-box">
            <h2>Dokumentation</h2>
            <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                <div class="alert alert-success"><?php echo htmlspecialchars($_GET['message']); ?></div>
            <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
                <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['message']); ?></div>
            <?php endif; ?>
            <h2>Liste Ihrer Dokumente</h2>
            <form action="download.php" method="post">
                <input type="checkbox" onclick="toggleCheckboxes(this)"> Alle auswählen/abwählen
                <?php if (count($documents) > 0): ?>
                    <ul>
                        <?php foreach ($documents as $document): ?>
                            <li>
                                <input type="checkbox" name="files[]" value="<?php echo htmlspecialchars($document['filepath']); ?>">
                                <?php echo htmlspecialchars($document['filename']); ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="form-container">
                        <button type="submit" class="btn btn-primary download-button">Download</button>
                        <button type="submit" formaction="delete.php" class="btn btn-danger delete-button">Löschen</button>
                    </div>
                <?php else: ?>
                    <p>Keine Dokumente gefunden.</p>
                <?php endif; ?>
            </form>
            <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
                <div class="input-group">
                <label for="file">Datei hochladen:</label>
                <input type="file" id="file" name="file[]" required multiple>
                </div>
                <button type="submit" class="btn btn-primary hochladen-button">Hochladen</button>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
