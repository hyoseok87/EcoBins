<!--nav.php -->
<nav style="position:sticky;top:0px;font-family:sans-serif;display:flex;justify-content:flex-end;align-items:center;background-color:#fafafa;border-bottom:1px solid rgba(0, 0, 0, 0.07);z-index:1;text-overflow:ellipsis;height:50px;box-sizing:border-box;">
    <input id="menuToggle" type="checkbox" style="display:none;">
    <label id="menuButton" for="menuToggle" style="display: none; flex;">
        <div id="menuButtonIcon" style="width:24px;padding:8px;">
            <svg viewBox="0 0 24.0 24.0" preserveAspectRatio="none" style="background:url('data:image/png;base64,');">
                <path d="M5.75 5.25h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 0 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5zm0 6h12.5a.75.75 0 1 1 0 1.5H5.75a.75.75 0 1 1 0-1.5z"></path>
            </svg>
        </div>
    </label>
    <ul id="verticalMenu" style="display: flex; list-style: none; margin: 0; padding: 0;">
        <li class="navMenuLink"><a class="navMenuLinkContent" href="index.php" title="Home">Home</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="leistungen.php" title="Service">Service</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="merkmale.php" title="Merkmale">Merkmale</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="bewertung_von_kunden.php" title="Bewertung von Kunden">Bewertung von Kunden</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="mitarbeiter.php" title="Über uns">Über uns</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="kontakt.php" title="Kontakt">Kontakt</a></li>
        <li class="navMenuLink dropdown">
          <a class="navMenuLinkContent dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Dokumentation">Dokumentation</a>
          <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="upload.php" title="Hochladen">Hochladen</a></li>
              <li><a class="dropdown-item" href="download.php" title="Download">Download</a></li>
          </ul>
        </li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="login.php" title="Anmeldung">Anmelden</a></li>
        <li class="navMenuLink"><a class="navMenuLinkContent" href="register.php" title="Register">Registrieren</a></li>
    </ul>
</nav>
