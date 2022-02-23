<?php
include 'koneksi.php';

$Username = $_POST['Username'];
$Password = md5($_POST['Password']);
$login = mysqli_query($konek, "SELECT * FROM admin where Username='$Username' and Password='$Password' ");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	session_start();
	$_SESSION['Username']
	$_SESSION['status'] = "Login";
	header("location:index.php");
}else{
	header("location:Login.php?Username=$Username&Password=$Password");
}
?>