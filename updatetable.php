<?php
require "dbconnect.php";

$sql = "select * from user where username='".$_GET["username"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Update User</title>
</head>
<body>
	<form action="updatetable.php?username=<?php echo $_GET["username"]?>" method="post">
		<input type="text" name="nama" placeholder="Nama" value="<?php echo $row["nama"] ?>"><br><br>
		<input type="email" name="email" placeholder="Email" value="<?php echo $row["email"] ?>"><br><br>
		<input type="text" name="username" placeholder="Username" value="<?php echo $row["username"] ?>" readonly><br><br>
		<input type="password" name="password" placeholder="password" value="<?php echo $row["password"] ?>"><br><br>
		<input type="submit" name="simpan" value="Simpan">
	</form>
</body>
</html>


<?php
if (isset($_POST["simpan"])){
	$nama = $_POST["nama"];
	$email = $_POST["email"];
	$username = $_GET["username"];
	$password = $_POST["password"];

	if($nama && $email && $username && $password){
		$sql = "update user set nama='$nama',
                            email='$email',
                            username='$username',
                            password='$password'
                            where username='".$_GET["username"]."'";

		if (mysqli_query($conn, $sql)){
			// echo "<br>Tabel berhasil disimpan!";
			header("Location:readtable.php");
		}
		else{
			echo "<br>Tabel gagal disimpan!" .mysqli_error($conn);
		}
	}
}

mysqli_close($conn);
?>
