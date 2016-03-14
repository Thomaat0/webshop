<?php
/*
 * Dit form verwerkt het registreren.
 * Of het registreren gelukt is wordt opgeslagen in $_SESSION['geregistreerd'].
 * Er wordt een pagina geinclude die nodig is om te verbinden met de database.
 */
session_start();

require_once('db.php');

$_SESSION['foutmeldingr'] = null;
$allesingevuld = true;
    if ($_POST['password'] == $_POST['repeatpassword']) {
//        $serverName = '(local)\SQLEXPRESS';
//        $connectionInfo = array('Database' => 'WEBSHOP', 'UID' => 'SA', 'PWD' => 'wachtwoord');
//        $conn = sqlsrv_connect($serverName, $connectionInfo);
        $gebruikersnaam = $_POST['username'];
        $voornaam = $_POST['name'];
        $tussenvoegsel = $_POST['surnameprefix'];
        $achternaam = $_POST['surname'];
        $straatnaam = $_POST['streetname'];
        $huisnummer = $_POST['address'];
        $postcode = $_POST['postalcode'];
        $woonplaats = $_POST['city'];
        $email = $_POST['email'];
        $sexe = $_POST['gender'];
        $wachtwoord = $_POST['password'];
        $wachtwoord = hash('sha512', $wachtwoord);
        //Maak sql statement aan
        $sql = "INSERT INTO USERS  (
                USERNAME,
                NAME,
                AFFIX,
                SURNAME,
                STREETNAME,
                ADDRESS,
                POSTALCODE,
                RESIDENCE,
                EMAIL,
                GENDER,
                PASSWORD
            ) VALUES('" .
            $gebruikersnaam . "', '" .
            $voornaam . "', '" .
            $tussenvoegsel . "', '" .
            $achternaam . "', '" .
            $straatnaam . "', " .
            $huisnummer . ", '" .
            $postcode . "', '" .
            $woonplaats . "', '" .
            $email . "', '" .
            $sexe . "', '" .
            $wachtwoord . "')";
        $result = sqlsrv_query($conn, $sql, null);
        $preparedsql = sqlsrv_prepare($conn, $sql);
        //Run sql statement.
        sqlsrv_execute($preparedsql);
        if ($result === false) {
            //Registreren is mislukt. Sql querry runt niet.
            print_r(sqlsrv_errors());
            $_SESSION['foutmeldingr'] = "Registration failed.Invalid input.";
            $_SESSION['geregistreerd'] = false;
        } else {
            //Registreren is gelukt :)
            $_SESSION['geregistreerd'] = true;
        }
    } else {
        //Registreren is mislukt. Wachtwoorden komen niet overeen.
        $_SESSION['foutmeldingr'] = "Registration failed. Passwords dont match";
        $_SESSION['geregistreerd'] = false;
    }

header("Location: ../registreren.php");