<?php
include 'config.php';
if (isset($_GET['id'])) {
    $dbh->exec("DELETE FROM diary WHERE id = '$_GET[id]'");
}
header("location:home.php")
?>