<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <input type="checkbox" id="menuToggle" style="display:none;">
    <label for="menuToggle" id="menuButton">
        <div id="menuButtonIcon">&#9776;</div>
    </label>
    <ul id="verticalMenu">
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="index.php" title="Home">Home</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'service.php' ? 'active' : ''; ?>" href="service.php" title="Service">Service</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'merkmale.php' ? 'active' : ''; ?>" href="merkmale.php" title="Merkmale">Merkmale</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'documentation.php' ? 'active' : ''; ?>" href="documentation.php" title="Dokumentation">Dokumentation</a></li>
        <?php endif; ?>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'bewertung_von_kunden.php' ? 'active' : ''; ?>" href="bewertung_von_kunden.php" title="Bewertung von Kunden">Bewertung von Kunden</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'mitarbeiter.php' ? 'active' : ''; ?>" href="mitarbeiter.php" title="Über uns">Über uns</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'kontakt.php' ? 'active' : ''; ?>" href="kontakt.php" title="Kontakt">Kontakt</a></li>
       
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="navMenuLink"><a class="navMenuLinkContent" href="logout.php" title="Abmelden" onclick="return confirmLogout();">Abmelden</a></li>
        <?php else: ?>
            <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>" href="login.php" title="Anmelden">Anmelden</a></li>
            <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php" title="Registrieren">Registrieren</a></li>
        <?php endif; ?>
    </ul>
</nav>

<script>
function confirmLogout() {
    return confirm('Möchten Sie sich abmelden?');
}
</script>
