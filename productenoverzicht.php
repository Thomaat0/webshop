<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 09/03/2016
 * Time: 09:36
 */

require_once ("html/db.php");
$tsql = "SELECT * FROM PRODUCT WHERE STOCK > 0";
$result = sqlsrv_query($conn, $tsql, null);

$products = array();
$productnr = 0;
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))   {
    $product = '<div class = "product_small_child"><a href="productpagina.php?productid=' . $row['PRODUCTNUMBER'] . '"><img src="' . $row['PRODUCT_IMAGE'] . '" alt="' . $row['PRODUCTNAME'] . '"></a>' . '<br>' . $row['PRODUCTNAME'] . '<br>' . $row['PRICE'] . '</div>';

    $products[$productnr] = $product;
    $productnr ++;
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
<?php include "html/header.html"?>
<div class="content">
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
