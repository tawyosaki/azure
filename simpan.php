<?php
//panggil file config.php untuk menghubung ke server
include('config.php');

//tangkap data dari form
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$tgllahir = $_POST['tgllahir'];
$goldar = $_POST['goldar'];
$status = $_POST['status'];
$jk = $_POST['jk'];
$about = $_POST['about'];
//simpan data ke database
$query = mysql_query("insert into user values('$username', '$password', '$nama', '$tgllahir', '$goldar', '$status', '$jk', '$about')") or die(mysql_error());

if ($query){
     echo "Sukses menyimpan data
           <a href='view.php'>Lihat Data Karyawan</a>";
} else {
     echo "Terjadi kesalahan";
}
?>
