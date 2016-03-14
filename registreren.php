<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 09/03/2016
 * Time: 09:34
 */

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Silk Road</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
<?php include "php/header.php"?>
<div class="content">
    <article>
<!--
        In Het volgende form kan alle benodigde informatie om een account te registreren.
        De action van dit form brengt je naar een pagina die het registreren verwerkt.
        Daarna wordt je weer teruggestuurd naar deze website.
        In $_SESSION['geregistreerd'] staat of het gelukt is om een account aan te maken.
-->
<form id="registreren" method="post" action="php/verwerkregistreren.php">
    <h1> Account data </h1>
    <label for="registreren">Username:
    <br/>
    <input type="text" name="username">
    </label>
    <br/>
    <label for="registreren">Password:
    <br/>
    <input type="password" name="password">
    </label>
    <br/>
    <label for="registreren">Repeat password:
    <br/>
    <input type="password" name="repeatpassword">
    </label>
    <br/>
    <h1> Billing address </h1>
    <br/>
    <label for="registreren">Title:
    <br/>
    <select name="gender" size=1>
        <option value="M" selected> Man</option>
        <option value="F" > Vrouw</option>
    </select>
    </label>
    <br/>
    <label for="registreren">Email adress:
    <br />
    <input type="text" name = "email">
    </label>
    <br />
    <label for="registreren">Name:
    <br/>
    <input type="text" name="name">
    </label>
    <br/>
    <label for="registreren">Surname prefix:
    <br/>
    <input type="text" name="surnameprefix">
    </label>
    <br/>
    <label for="registreren">Surname:
    <br/>
    <input type="text" name="surname">
    </label>
    <br/>
    <label for="registreren">Street:
    <br/>
    <input type="text" name="streetname">
    </label>
    <br/>
    <label for="registreren">Address:
    <br/>
    <input type="text" name="address">
    </label>
    <br/>
    <label for="registreren">Postal code:
    <br/>
    <input type="text" name="postalcode">
    </label>
    <br/>
    <label for="registreren">City:
    <br/>
    <input type="text" name="city">
    </label>
    <br/>
    <br/>
    Create Account <input type="submit" name="createaccount">
</form>
        <?php
        if(isset($_SESSION['geregistreerd'])&&!$_SESSION['geregistreerd'] ){
            //Er is geen account gemaakt. De foutmelding wordt weergeven.
            echo $_SESSION['foutmeldingr'] ;
            echo '<br />';
            $_SESSION['geregistreerd'] = null;
            $_SESSION['foutmeldingr'] = null;
        }
        if(isset($_SESSION['geregistreerd']) ){
            //Er is succesvol een account aangemaakt.
            echo ' You have succesfully created an Account <br />';
        }
        ?>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>