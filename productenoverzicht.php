<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 09/03/2016
 * Time: 09:36
 */

session_start();

require_once ("php/db.php");

if (isset($_GET['category']))   {
    $tsql = "SELECT * FROM PRODUCT WHERE STOCK > 0 AND CATEGORY = '" . urldecode($_GET['category']) . "'";
    echo $tsql;
    $result = sqlsrv_query($conn, $tsql, null);
    if ($result != false) {
        $products = array();
        $productnr = 0;
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $product = '<div class = "product_small_child"><a href="productpagina.php?productid=' . $row['PRODUCTNUMBER'] . '"><img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '"></a>' . '<br>' . $row['PRODUCTNAME'] . '<br>$' . $row['PRICE'] . '</div>';

            $products[$productnr] = $product;
            $productnr++;
        }
    }
}

else {
    $tsql = "SELECT * FROM PRODUCT WHERE STOCK > 0";
    $result = sqlsrv_query($conn, $tsql, null);

    $products = array();
    $productnr = 0;
    if ($result != false) {
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            $product = '<div class = "product_small_child"><a href="productpagina.php?productid=' . $row['PRODUCTNUMBER'] . '"><img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '"></a>' . '<br>' . $row['PRODUCTNAME'] . '<br>$' . $row['PRICE'] . '</div>';

            $products[$productnr] = $product;
            $productnr++;
        }
}
}


$usql = "SELECT CATEGORY FROM PRODUCT GROUP BY CATEGORY";
$uresult = sqlsrv_query($conn, $usql, null);

$categories = '';
while ($row = sqlsrv_fetch_array($uresult, SQLSRV_FETCH_ASSOC)) {
    $encodedcategory = urlencode($row['CATEGORY']);
    $categories .= '<br><a href="productenoverzicht.php?category=' . $encodedcategory . '">' . $row['CATEGORY'] . '</a><br>';
}

sqlsrv_free_stmt($result);
sqlsrv_close($conn);
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
    <aside class="left">
        <?= $categories?>
    </aside>
    <article>
        <div class = "product_small">
        <?php
            for ($i = 0; $i < count($products); $i++)  {
                echo $products[$i];
            }
        ?>
        </div>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>
