<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<nav>
    <input id="menuToggle" type="checkbox" style="display:none;">
    <label id="menuButton" for="menuToggle" style="display:none; flex;">
        <div id="menuButtonIcon" style="width:24px;padding:8px;">
            <svg viewBox="0 0 24.0 24.0" preserveAspectRatio="none" style="background:url('data:image/png;base64,');">
                <path d="M5.75 5.25h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 0 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5z"></path>
            </svg>
        </div>
    </label>
    <ul id="verticalMenu" style="display: flex; list-style: none; margin: 0; padding: 0;">
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
        <?php endif; ?>
        <li class="navMenuLink"><a class="navMenuLinkContent <?php echo basename($_SERVER['PHP_SELF']) == 'register.php' ? 'active' : ''; ?>" href="register.php" title="Register">Registrieren</a></li>
    </ul>
</nav>

<script>
function confirmLogout() {
    return confirm('Möchten Sie sich abmelden?');
}
</script>
