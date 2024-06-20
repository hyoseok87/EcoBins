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
                <div class="carousel-caption">
                    <h2>Sean Koppelmeyer</h2>
                    <button class="kontakt-button" data-id="sean">Kontakt</button>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="Henrik Rautenberg.jpg" alt="Henrik">
                <div class="carousel-caption">
                    <h2>Henrik Rautenberg</h2>
                    <button class="kontakt-button" data-id="henrik">Kontakt</button>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="Bonny Marsch.jpeg" alt="Bonny">
                <div class="carousel-caption">
                    <h2>Bonny Marsch</h2>
                    <button class="kontakt-button" data-id="bonny">Kontakt</button>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="Hyosuck Ham.jpeg" alt="Hyosuck">
                <div class="carousel-caption">
                    <h2>Hyosuck Ham</h2>
                    <button class="kontakt-button" data-id="hyosuck">Kontakt</button>
                </div>
            </div>
            <div class="carousel-slide">
                <img src="Teambild (Bonny, Hyosuck, Sean).jpeg" alt="Teambild 1">
                <div class="carousel-caption">
                </div>
            </div>
            <div class="carousel-slide">
                <img src="Teambild.jpeg" alt="Teambild 2">
                <div class="carousel-caption">
                </div>
            </div>
            <!-- Bilder hinzufügen -->
        </div>
        <div class="carousel-nav">
            <button class="carousel-nav-dot active"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <button class="carousel-nav-dot"></button>
            <!-- Punkte hinzufügen -->
        </div>
    </div>
    <?php include 'footer.php'; ?>

    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2 id="modal-name"></h2>
            <p id="modal-description"></p>
        </div>
    </div>

    <script src="slideshow.js"></script>
</body>
</html>
