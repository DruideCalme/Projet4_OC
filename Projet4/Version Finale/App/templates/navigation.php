<div class="navContainer">
    <nav>
        <ul class="navBlockA">
            <li><a href="./index.php">Billet pour<br>l'alaska</a></li>
        </ul>
        <ul class="navBlockB">
            <li><a class="navLink" href="./index.php">ACCUEIL</a></li>
            <li><a class="navLink" href="./index.php?route=chapitres">CHAPITRES</a></li>
            <li><a class="navLink" href="./index.php?route=presentation">QUI SUIS-JE</a></li>
        </ul>
        <ul class="navBlockC">
            <li>
                <a class="navLink" href="./index.php?route=espacePerso">
                    <?php
                    if (!$this->session->getUserInfo('pseudo')) {
                    ?>
                        SE CONNECTER
                    <?php
                    } else {
                    ?>
                        ESPACE PERSO
                    <?php
                    }
                    ?>    
                </a>
            </li>
        </ul>
    </nav>
</div>

<div class="navContainerSmall">
    <nav>
        <span class="navBackgroundSmall"></span>
        <span class="navClickZone"></span>
        <ul class="navBlockASmall">
            <li class="navLogoSmall"><span>Billet pour l'alaska</span></li>
            <li class="navButtonSmall"><span class="fas fa-bars fa-2x"></span></li>
        </ul>
        <ul class="navBlockBSmall navHide navDisplay">
            <li><a class="navLinkSmall" href="./index.php"><p>ACCUEIL</p></a></li>
            <li><a class="navLinkSmall" href="./index.php?route=chapitres"><p>CHAPITRES</p></a></li>
            <li><a class="navLinkSmall" href="./index.php?route=presentation"><p>QUI SUIS-JE</p></a></li>
            <li>
                <a class="navLinkSmall" href="./index.php?route=espacePerso">
                    <p>
                    <?php
                    if (!$this->session->getUserInfo('pseudo')) {
                    ?>
                        SE CONNECTER
                    <?php
                    } else {
                    ?>
                        ESPACE PERSO
                    <?php
                    }
                    ?> 
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>