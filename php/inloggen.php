<?php
/*
 * Hieronder wordt session gestart en wordt er gecontroleerd of er iemand is ingelogd.
 * Indien er niemand is ingelogd wordt het inlogform getoond.
 * Indien er wel iemand is ingelogd komt er een welkomstbericht te staan en komt er een knop voor het uitloggen.
 * Als er op de knop voor het uitloggen wordt gedrukt dan wordt de huidig ingelogde gebruiker uitgelogd.
 * In $_SESSION['login'] staat welke user er is ingelogd. Indien er geen user is ingelogd staat in deze variable: null
 * In $_SESSION['foutmelding'] staat indien het inloggen niet gelukt is een eventuele foutmelding.
 */
//session_start();
if (!isset($_SESSION['login']) )  {
    /*
     * Inlogform.
     * De action brengt je naar een pagina die het inloggen verwerkt en die je vervolgens terugstuurt naar deze website.
     */

    ?>
    <form action="php/inloggenverwerken.php" id="inloggen" method="post">
        <label for="username">Username
        <input type="text" name="username">
        </label>
        <br/>
        <label for="password">Password
        <input type="password" name="password">
        </label>
        <br/>
        <input type="submit" name="login" value="login">
        &nbsp;&nbsp;&nbsp;
        <a href="registreren.php">Register</a>
    </form>
    <?php
    if(isset($_SESSION['foutmelding'])){
        //Er is iets fout gegaan tijdens het inloggen. Foutmelding wordt getoond.
        echo $_SESSION['foutmelding'];
        $_SESSION['foutmelding'] = null;
    }
}
else {
    //Er is ingelogd. Welkomstbericht wordt getoond.
    echo 'Welkom ';
    echo $_SESSION['login'];
    //Hieronder staat de knop voor het uitloggen.
    ?>
    <form method="post">
        <input type="submit" name="uitloggen" value="logout">
    </form>

<?php
    if(isset($_POST['uitloggen'])){
        //Knop voor uitloggen is ingedrukt. Er wordt uitgelogd en de pagina wordt opnieuw geladen.
        $_SESSION['login'] =null;

        header("Location: over_ons.php");
    }
}
?>