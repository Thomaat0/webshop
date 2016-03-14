<header>
    <?php
//In inloggen.php staat de code die nodig is om het inloggen te reguleren
require_once('php/inloggen.php');
?>
<h1>Silk Road</h1>
<nav>
    <div class="hovermenu">
        <ul class="nav-list">
            <li>
                <a href="productenoverzicht.php" class="hover_item">Webshop</a>
                <ul class="submenu">
                    <li class="suboptie">
                        <a href="productenoverzicht.php">producten</a>
                    </li>
                    <li class="suboptie">
                        <a href="winkelwagen.php">winkelwagen</a>
                    </li>
                    <li class="suboptie">
                        <a href="winkelwagen.php?checkout=proceed+to+checkout">afrekenen</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">News</a>
            </li>
            <li>
                <a href="#">On offer</a>
            </li>
            <li>
                <a href="#">Vacancies</a>
            </li>
            <li>
                <a href="over_ons.php">About</a>
            </li>
        </ul>
    </div>
</nav>
</header>