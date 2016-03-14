<?php session_start();
/*
 * Eerst wordt de pagina geinclude waar de functie in staat om te verbinden met de database.
 * Vervolgens wordt de function login aangemaaktt.
 * In $_SESSION['login'] staat welke user er is ingelogd. Indien er geen user is ingelogd staat in deze variable: null
 * Vervolgens wordt er in  $_SESSION['login'] de returnwaarde van de login functie gestopt (zie login functie).
 * Aan het einde stuurt de website je terug naar header.php
 */
require_once("db.php");
/*
 * login():
 * In deze functie wordt er een string van de ingelogde user, of een null waarde geretourneerd.
 * In deze methode wordt er verbonden met de database en wordt gegekeken of de ingevulde username en password overeenkomen
 * met de gebruikersnaam en wachtwoord in de database.
 * Er is hier gebruik gemaakt van hashing van het wachtwoord.
 * Indien er iets fout gaat met het inloggen wordt er basis van wat er fout een foutmelding gezet in $_SESSION['foutmelding']
 */
function login($conn)
{
    $_SESSION['foutmelding'] = null ;
    session_start();
    $ingelogd = null;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash('sha512' , $password);

    $tsql = "SELECT USERNAME, PASSWORD FROM USERS";
        $result = sqlsrv_query($conn, $tsql, null);
    if (!$result)    {
        //Er kan geen verbinding worden gemaakt met de database.
        $_SESSION['foutmelding'] = 'Cant connect to database.';
    }
        //Ga door alle usernames en wachtwoorden heen om te controleren of de ingevulde gegevens overeen komen.
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $checkusername = $row['USERNAME'];
            $checkpassword = $row['PASSWORD'];
            //check of er een username overeen komt
            if ($username == $checkusername) {
                //check of het wachtwoord overeen komt
                if ($password == $checkpassword) {
                    $_SESSION['foutmelding'] = null;
                    $ingelogd = $username;
                    break;
                } else {
                    //Wachtwoord past niet bij de ingevulde username
                    $_SESSION['foutmelding'] = 'Incorrect username/password combination.';
                }
            }
                else {
                    //Username is niet gevonden in de database
                    $_SESSION['foutmelding'] = 'Incorrect username/password combination.';
                }
            }
    return $ingelogd;
}

    $_SESSION['login'] = login($conn);

header("Location: ../over_ons.php");
?>


