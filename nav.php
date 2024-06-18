<?php
session_start();

$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav style="position:sticky;top:0px;font-family:sans-serif;display:flex;justify-content:space-between;align-items:center;background-color:#fafafa;border-bottom:1px solid rgba(0, 0, 0, 0.07);z-index:1;text-overflow:ellipsis;height:50px;box-sizing:border-box;padding:0 20px;">
    <div style="flex:1;">
        <a href="index.php" style="text-decoration:none;color:inherit;font-weight:bold;"></a>
    </div>
    <input id="menuToggle" type="checkbox" style="display:none;">
    <label id="menuButton" for="menuToggle" style="display:none; flex;">
        <div id="menuButtonIcon" style="width:24px;padding:8px;">
            <svg viewBox="0 0 24.0 24.0" preserveAspectRatio="none" style="background:url('data:image/png;base64,');">
                <path d="M5.75 5.25h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 0 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5z"></path>
            </svg>
        </div>
    </label>
    <ul id="verticalMenu" style="display: flex; list-style: none; margin: 0; padding: 0;">
        <li class="navMenuLink"><a class="navMenuLinkContent" href="index.php" title="Home" style="<?= ($currentPage == 'index.php') ? 'color: blue;' : '' ?>">Home</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="leistungen.php" title="Service" style="<?= ($currentPage == 'leistungen.php') ? 'color: blue;' : '' ?>">Service</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="merkmale.php" title="Merkmale" style="<?= ($currentPage == 'merkmale.php') ? 'color: blue;' : '' ?>">Merkmale</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="bewertung_von_kunden.php" title="Bewertung von Kunden" style="<?= ($currentPage == 'bewertung_von_kunden.php') ? 'color: blue;' : '' ?>">Bewertung von Kunden</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="mitarbeiter.php" title="Über uns" style="<?= ($currentPage == 'mitarbeiter.php') ? 'color: blue;' : '' ?>">Über uns</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="kontakt.php" title="Kontakt" style="<?= ($currentPage == 'kontakt.php') ? 'color: blue;' : '' ?>">Kontakt</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="documentation.php" title="Dokumentation" style="<?= ($currentPage == 'documentation.php') ? 'color: blue;' : '' ?>">Dokumentation</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
            <li class="navMenuLink"><a class="navMenuLinkContent" href="logout.php" title="Abmelden" onclick="confirmLogout()">Abmelden</a></li>
        <?php else: ?>
            <li class="navMenuLink"><a class="navMenuLinkContent" href="login.php" title="Anmelden" style="<?= ($currentPage == 'login.php') ? 'color: blue;' : '' ?>">Anmelden</a></li>
        <?php endif; ?>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="register.php" title="Register" style="<?= ($currentPage == 'register.php') ? 'color: blue;' : '' ?>">Registrieren</a></li>
    </ul>
</nav>

<script>
function confirmLogout() {
    if (confirm('Möchten Sie sich abmelden?')) {
        window.location.href = 'logout.php';
    }
}
</script>
