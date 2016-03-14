<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 08/03/2016
 * Time: 15:17
 */

session_start();

$productid = $_GET["productid"];

require_once ("php/db.php");
$tsql = "SELECT * FROM PRODUCT WHERE PRODUCTNUMBER = '$productid'";
$result = sqlsrv_query($conn, $tsql, null);

while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))  {
    $showproduct = '<img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '"><br>' .
        $row['PRODUCTNAME'] . '<br><br>' .
        $row['DESCRIPTION'] . '<br><br>' .
        $row['STOCK'] . ' in stock<br><br>$' .
        $row['PRICE'] .
        '<form method="post" action="productpagina.php?productid=' . $productid . '">
            <input type="number" name="' . $productid . '" class="stock">
            <input type="submit" name="Add to cart" value="Add to cart">
        </form>';
    $largeproductnr = $row['PRODUCTNUMBER'];
    $category = $row['CATEGORY'];
    $stock = $row['STOCK'];
}

$usql = "SELECT * FROM PRODUCT WHERE CATEGORY = '$category' AND PRODUCTNUMBER != '$largeproductnr'";
$uresult = sqlsrv_query($conn, $usql, null);

$productarray = array();
$productnr = 0;
while ($row = sqlsrv_fetch_array($uresult, SQLSRV_FETCH_ASSOC)) {
    $product = '<div class = "product_small_child"><a href="productpagina.php?productid=' . $row['PRODUCTNUMBER'] . '"><img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '"></a>' . '<br>' . $row['PRODUCTNAME'] . '<br>$' . $row['PRICE'] . '</div>';

    $productarray[$productnr] =$product;
    $productnr ++;
}

function shoppingcart($productid, $stock)  {
    if (!isset($_SESSION["'" . $productid . "'"]))  {
        $_SESSION["'" . $productid . "'"] = 0;
    }
    if (isset($_POST[$productid]))  {
        if ($_SESSION["'" . $productid . "'"] + $_POST[$productid] <= $stock)   {
            $_SESSION["'" . $productid . "'"] = $_SESSION["'" . $productid . "'"] + $_POST[$productid];
        }
        else    {
            echo 'You can&#39;t buy more than we have in stock.<br>';
        }
    }
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
        <div class = "product_large">
            <?= $showproduct?>
        </div>
        <?= shoppingcart($productid, $stock);?>
        <div class = "product_small">
        <?php
        foreach ($productarray AS $product) {
            echo $product;
        }
        ?>
        </div>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>
