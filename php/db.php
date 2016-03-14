<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 10/03/2016
 * Time: 10:00
 */

$serverName = '(local)\SQLEXPRESS';
$connectionInfo = array("Database" => "WEBSHOP", "UID" => "sa", "PWD" => "wachtwoord");
$conn = sqlsrv_connect($serverName, $connectionInfo);

?>