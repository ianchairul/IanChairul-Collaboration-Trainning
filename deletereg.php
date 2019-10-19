<?php
require "dbconnect.php";

$sql = "delete from user_reg where username='".$_GET["username"]."'";

if (mysqli_query($conn, $sql)){
  // echo "<br>Tabel berhasil dihapus!";
  header("Location:readreg.php");
}
else{
  echo "<br>Tabel gagal dihapus!" .mysqli_error($conn);
}

mysqli_close($conn);
?>
