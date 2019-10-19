<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insert User</title>
</head>
<body>
	<form action="inserttable.php" method="post">
		<input type="text" name="nama" placeholder="Nama"><br><br>
		<input type="email" name="email" placeholder="Email"><br><br>
		<input type="text" name="username" placeholder="Username"><br><br>
		<input type="password" name="password" placeholder="password"><br><br>
		<input type="submit" name="simpan" value="Simpan">
	</form>
</body>
</html>


<?php
require "dbconnect.php";

if (isset($_POST["simpan"])){
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$username = $_POST["username"];
	$password = $_POST["password"];

	if($nama && $email && $username && $password){
		$sql = "insert into user value('$nama', '$email', '$username', '$password')";

		if (mysqli_query($conn, $sql)){
			// echo "<br>Tabel berhasil disimpan!";
			mysqli_close($conn);
			header("Location:readtable.php");
		}
		else{
			echo "<br>Tabel gagal disimpan!" .mysqli_error($conn);
		}
	}
}
mysqli_close($conn);
?>
