<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Daftar User</title>
</head>
<body>
  <a href="insertreg.php">Tambah User</a>
<?php
require "dbconnect.php";

$sql = "select * from user_reg";
$result = mysqli_query($conn, $sql);

$table = "<table border='1'>
            <tr>
              <th>Nama</th>
              <th>Username</th>
              <th>Password</th>
              <th>Email</th>
              <th>Jenis Kelamin</th>
              <th>Tanggal Lahir</th>
              <th>Agama</th>
              <th>Hobi1</th>
              <th>Hobi2</th>
              <th>Hobi3</th>
              <th>Biografi</th>
              <th>action</th>
            </tr>";

if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_assoc($result)){
    $table .=  "<tr>
                  <td>".$row["nama"]."</td>
                  <td>".$row["username"]."</td>
                  <td>".$row["password"]."</td>
                  <td>".$row["email"]."</td>
                  <td>".$row["jkelamin"]."</td>
                  <td>".$row["tlahir"]."</td>
                  <td>".$row["agama"]."</td>
                  <td>".$row["hobi1"]."</td>
                  <td>".$row["hobi2"]."</td>
                  <td>".$row["hobi3"]."</td>
                  <td>".$row["biografi"]."</td>
                  <td><a href='updatereg.php?username=".$row["username"]."'>Edit</a> |
                      <a  href='deletereg.php?username=".$row["username"]."'
                          onclick='return confirm(\"Anda yakin akan menghapus ".$row["nama"]."?\")'>Hapus</a></td>
                </tr>";
  }
}
// else{
//   echo "0 Results";
// }

$table .= "</table>";
echo $table;

mysqli_close($conn);
?>

</body>
</html>
