<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 08/03/2016
 * Time: 15:17
 */

$productid = $_GET["productid"];

require_once ("html/db.php");
$tsql = "SELECT * FROM PRODUCT WHERE PRODUCTNUMBER = " . $productid;
$result = sqlsrv_query($conn, $tsql, null);

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
        <??>
    </article>
    <?php include "html/aside.html"?>
</div>
<?php include "html/footer.html"?>
</body>
</html>
