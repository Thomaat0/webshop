<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 11/03/2016
 * Time: 15:12
 */

session_start();

require_once("php/db.php");

if (isset($_GET['checkout']))   {
    foreach ($_SESSION AS $itemnumber => $itemvalue) {
        $itemnumber = str_replace("'", "", $itemnumber);
        $usql = "UPDATE PRODUCT SET STOCK = STOCK - '$itemvalue' WHERE PRODUCTNUMBER = '$itemnumber'";
        $_SESSION["'" . $itemnumber . "'"] = 0;
        $stmt = sqlsrv_query($conn, $usql, null);
    }
}

if (isset($_POST['delete_button']))   {
    $_SESSION["'" . $_POST['delete_button'] . "'"] = 0;
}

$results = array();
$resultnr = 0;
$resulttoprint = '<div class = "shoppingcart">';
foreach ($_SESSION AS $item => $value) {
    $item = str_replace("'", "", $item);
    $tsql = "SELECT * FROM PRODUCT WHERE PRODUCTNUMBER = '$item'";
    if (sqlsrv_query($conn, $tsql, null) != false) {
        $result = sqlsrv_query($conn, $tsql, null);
    }
    $results[$resultnr] = $result;
    $resultnr ++;
}
foreach ($results AS $subresult) {
    while ($row = sqlsrv_fetch_array($subresult, SQLSRV_FETCH_ASSOC))    {
        if ($_SESSION["'" . $row['PRODUCTNUMBER'] . "'"] > 0) {
            $resulttoprint .= '<div class = "shoppingitem">
            <img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '">
            <div>' . $row['PRODUCTNAME'] . ' amount = ' . $_SESSION["'" . $row['PRODUCTNUMBER'] ."'"] . '<br>
            total price = $' . $row['PRICE'] * $_SESSION["'" . $row['PRODUCTNUMBER'] . "'"] . ',-<br>
            <form method="post"><label>delete product nr : </label>
            <input type="submit" name="delete_button" value="' . $row['PRODUCTNUMBER'] . '"></form></div></div>';
        }
    }
}

$resulttoprint .= '</div>';

function emptyvalue($productnr)   {
    $_SESSION[$productnr] = 0;
}

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
        <?= $resulttoprint;?>
        <form class="checkout">
            <input type="submit" name="checkout" value="proceed to checkout">
        </form>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>