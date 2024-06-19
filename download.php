<!-- download.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['files']) && is_array($_POST['files'])) {
        $files = $_POST['files'];

        if (count($files) > 1) {
            // Create a zip file
            $zip = new ZipArchive();
            $zipFileName = 'downloads_' . time() . '.zip';
            $zipFilePath = 'C:\\Users\\Notebook\\Downloads\\' . $zipFileName; // Use absolute path

            if (!file_exists(__DIR__ . '/temp')) {
                mkdir(__DIR__ . '/temp', 0777, true);
            }

            if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
                foreach ($files as $file) {
                    $filePath = realpath($file);
                    if (file_exists($filePath)) {
                        $zip->addFile($filePath, basename($filePath));
                    }
                }
                $zip->close();

                // Send the zip file to the browser for download
                header('Content-Type: application/zip');
                header('Content-Disposition: attachment; filename=' . basename($zipFileName));
                header('Content-Length: ' . filesize($zipFilePath));
                flush();
                readfile($zipFilePath);

                // Delete the zip file from the server
                unlink($zipFilePath);
                exit;
            } else {
                echo 'Failed to create the zip file.';
            }
        } else {
            // Download a single file
            $filePath = realpath($files[0]);
            if (file_exists($filePath)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename=' . basename($filePath));
                header('Content-Length: ' . filesize($filePath));
                flush();
                readfile($filePath);
                exit;
            } else {
                echo 'File not found.';
            }
        }
    } else {
        echo 'No files selected.';
    }
} else {
    echo 'Invalid request method.';
}
?>
