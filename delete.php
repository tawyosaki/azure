<?php

include "config.php";
$tgl = ['tgl'];
$sql = "DELETE FROM catatan WHERE tgl='$tgl'";
$result = mysql_query($sql);
  
if ($result){
     echo "Sukses menghapus data <br />
           <a href='home.php'>home</a>";
} else {
     echo "Terjadi kesalahan";
}
?>