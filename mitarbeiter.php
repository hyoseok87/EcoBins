<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitarbeiter</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="carousel-container">
        <div class="carousel-track">
            <div class="carousel-slide active">
                <img src="Sean Koppelmeyer.jpeg" alt="Sean">
            </div>
            <div class="carousel-slide">
                <img src="Henrik Rautenberg.jpg" alt="Henrik">
            </div>
            <div class="carousel-slide">
                <img src="Bonny Marsch.jpeg" alt="Bonny">
            </div>
            <div class="carousel-slide">
                <img src="Hyosuck Ham.jpeg" alt="Hyosuck">
            </div>
            <div class="carousel-slide">
                <img src="Teambild (Bonny, Hyosuck, Sean).jpeg" alt="Teambild 1">
            </div>
            <div class="carousel-slide">
                <img src="Teambild.jpeg" alt="Teambild 2">
            </div>
            <!-- Bilder hinzufügen-->
        </div>
        <div class="carousel-nav">
            <button class="carousel-nav-dot active"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <!-- punkte hinzufügen -->
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="slideshow.js"></script>
</body>
</html>
