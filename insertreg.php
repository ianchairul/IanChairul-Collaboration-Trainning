<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insert User</title>
</head>
<body>
	<form action="insertreg.php" method="post">
    <b>Nama</b><br>
      <input type="text" name="nama"><br>
    <b>Username</b><br>
      <input type="text" name="username"><br>
    <b>Password</b><br>
      <input type="password" name="password"><br>
    <b>Email</b><br>
      <input type="email" name="email"><br>
    <b>Jenis Kelamin</b><br>
      <input type="radio" name="jkelamin" value="Laki-laki">Laki-laki<br>
      <input type="radio" name="jkelamin" value="Perempuan">Perempuan<br>
    <b>Tanggal Lahir</b><br>
      <input type="date" name="tanggal"><br>
    <b>Agama</b><br>
      <select name="agama">
        <option value="">-- Silahkan Pilih --</option>
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Hindu">Hindu</option>
        <option value="Budha">Budha</option>
      </select><br>
    <b>Hobi</b><br>
      <input type="checkbox" name="hobi1" value="Memancing">Memancing<br>
      <input type="checkbox" name="hobi2" value="Sepeda">Bersepeda<br>
      <input type="checkbox" name="hobi3" value="Nonton">Nonton<br>
    <b>Biografi Singkat</b><br>
      <textarea name="biografi" cols="40" rows="5"></textarea>
    <br>
    <input type="submit" name="input" value="Input">
    <input type="reset" value="Reset">
	</form>
</body>
</html>


<?php
require "dbconnect.php";

if (isset($_POST["input"])){
	$nama       = $_POST["nama"];
  $username   = $_POST["username"];
  $password   = $_POST["password"];
	$email      = $_POST["email"];
  $jkelamin   = $_POST["jkelamin"];
  $tlahir     = $_POST["tanggal"];
  $agama      = $_POST["agama"];

  if(isset($_POST["hobi1"])) $hobi1 = $_POST["hobi1"];
  else $hobi1 = "";

  if(isset($_POST["hobi2"])) $hobi2 = $_POST["hobi2"];
  else $hobi1 = "";

  if(isset($_POST["hobi3"])) $hobi3 = $_POST["hobi3"];
  else $hobi3 = "";

  $biografi   = $_POST["biografi"];

	if($nama && $username && $password && $email && $jkelamin && $tlahir && $agama && $biografi){
		$sql = "insert into user_reg value('$nama', '$username', '$password', '$email', '$jkelamin', '$tlahir', '$agama', '$hobi1', '$hobi2', '$hobi3', '$biografi')";

		if (mysqli_query($conn, $sql)){
			mysqli_close($conn);
			header("Location:readreg.php");
		}
		else{
			echo "<br>Tabel gagal disimpan!" .mysqli_error($conn);
		}
	}
  else echo "Harap lengkapi form!";
}
mysqli_close($conn);
?>
