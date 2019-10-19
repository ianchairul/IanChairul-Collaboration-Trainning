<?php
require "dbconnect.php";

$sql = "delete from user where username='".$_GET["username"]."'";

if (mysqli_query($conn, $sql)){
  // echo "<br>Tabel berhasil dihapus!";
  header("Location:readtable.php");
}
else{
  echo "<br>Tabel gagal dihapus!" .mysqli_error($conn);
}

mysqli_close($conn);
?>
