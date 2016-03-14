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

        <h2> Over ons</h2>
        <div class="informatie">
            <div class="WieZijnWij">
                <div id="bedrijfsinformatie" class="bedrijfsinformatie">
                    <h2>
                        Who are behind Silk Road?
                    </h2>
                    <p>
                        This is dank kush boi. Insert lorem upsum here: "Lorem ipsum dolor sit amet, consectetur
                        adipiscing
                        elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                        nostrud
                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="bedrijfsinformatie " id="bedrijfsafbeelding">
                    <img src="img/silk_road.png" alt="man riding a camel" id="imagebedrijf">
                </div>

            </div>
            <div id="routebeschrijving">
                <div id="tekstroutebeschrijving" class="routebeschrijving">
                    <br><br>
                    <h2>
                        How to find us
                    </h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.
                    </p>
                </div>
                <div id="googlemaps" class="routebeschrijving">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d312163.85463186115!2d4.7520598943850185!3d52.319990568915756!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x47c63fb5949a7755%3A0x6600fd4cb7c0af8d!2sAmsterdam!3m2!1d52.370215699999996!2d4.8951679!4m5!1s0x47c5ef6c60e1e9fb%3A0x8ae15680b8a17e39!2sHaarlem!3m2!1d52.3873878!2d4.6462194!5e0!3m2!1snl!2snl!4v1455787181944"
                        width="400" height="300" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>
