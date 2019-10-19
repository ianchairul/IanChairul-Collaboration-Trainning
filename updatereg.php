<?php
require "dbconnect.php";

$sql = "select * from user_reg where username='".$_GET["username"]."'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Insert User</title>
</head>
<body>
	<form action="updatereg.php?username=<?php echo $_GET["username"]?>" method="post">
    <b>Nama</b><br>
      <input type="text" name="nama" value="<?php echo $row["nama"]; ?>"><br>
    <b>Username</b><br>
      <input type="text" name="username" value="<?php echo $row["username"]; ?>"><br>
    <b>Password</b><br>
      <input type="password" name="password" value="<?php echo $row["password"]; ?>"><br>
    <b>Email</b><br>
      <input type="email" name="email" value="<?php echo $row["email"]; ?>"><br>
    <b>Jenis Kelamin</b><br>

      <?php
      if($row["jkelamin"]=="Laki-laki")
        echo '<input type="radio" name="jkelamin" value="Laki-laki" checked>Laki-laki<br>';
      else
        echo '<input type="radio" name="jkelamin" value="Laki-laki">Laki-laki<br>';

      if($row["jkelamin"]=="Perempuan")
        echo '<input type="radio" name="jkelamin" value="Perempuan" checked>Perempuan<br>';
      else
        echo '<input type="radio" name="jkelamin" value="Perempuan">Perempuan<br>';
      ?>

    <b>Tanggal Lahir</b><br>
      <input type="date" name="tanggal" value="<?php echo $row["tlahir"]; ?>"><br>
    <b>Agama</b><br>
      <select name="agama">
        <option value="">-- Silahkan Pilih --</option>

        <?php
        if($row["agama"]=="Islam") echo '<option value="Islam" selected>Islam</option>';
        else echo '<option value="Islam">Islam</option>';

        if($row["agama"]=="Kristen") echo '<option value="Kristen" selected>Kristen</option>';
        else echo '<option value="Kristen">Kristen</option>';

        if($row["agama"]=="Hindu") echo '<option value="Hindu" selected>Hindu</option>';
        else echo '<option value="Hindu">Hindu</option>';

        if($row["agama"]=="Budha") echo '<option value="Budha" selected>Budha</option>';
        else echo '<option value="BudhaBudha">Budha</option>';
        ?>

      </select><br>
    <b>Hobi</b><br>

      <?php
      if($row["hobi1"])
        echo '<input type="checkbox" name="hobi1" value="Memancing" checked>Memancing<br>';
      else
        echo '<input type="checkbox" name="hobi1" value="Memancing">Memancing<br>';

      if($row["hobi2"])
        echo '<input type="checkbox" name="hobi2" value="Sepeda" checked>Bersepeda<br>';
      else
        echo '<input type="checkbox" name="hobi2" value="Sepeda">Sepeda<br>';

      if($row["hobi3"])
        echo '<input type="checkbox" name="hobi3" value="Nonton" checked>Nonton<br>';
      else
        echo '<input type="checkbox" name="hobi3" value="Nonton">Nonton<br>';
      ?>

    <b>Biografi Singkat</b><br>
      <textarea name="biografi" cols="40" rows="5"><?php echo $row["biografi"]; ?></textarea>
    <br>
    <input type="submit" name="input" value="Input">
    <input type="reset" value="Reset">
	</form>
</body>
</html>


<?php
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
  else $hobi2 = "";

  if(isset($_POST["hobi3"])) $hobi3 = $_POST["hobi3"];
  else $hobi3 = "";

  $biografi   = $_POST["biografi"];

	if($nama && $username && $password && $email && $jkelamin && $tlahir && $agama && $biografi){
    $sql = "update user_reg set nama='$nama',
                            username='$username',
                            password='$password',
                            email='$email',
                            jkelamin='$jkelamin',
                            tlahir='$tlahir',
                            agama='$agama',
                            hobi1='$hobi1',
                            hobi2='$hobi2',
                            hobi3='$hobi3',
                            biografi='$biografi'
                            where username='".$_GET["username"]."'";

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
