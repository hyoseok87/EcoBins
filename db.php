<!--db.php -->
<?php
$datenbank = "ecobins";
$port = 3306;
$link = mysqli_connect("localhost", "root", "", $datenbank, $port);

// Check connection
if ($link === false) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
