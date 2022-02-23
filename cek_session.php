<?php
session_start();
if ($SESSION['status'] == "") {
    echo "anda tidak berhak mengakses";
    header("location:Login.php");
}
?>