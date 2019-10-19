<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Daftar User</title>
</head>
<body>
  <a href="inserttable.php">Tambah User</a>
<?php
require "dbconnect.php";

$sql = "select * from user";
$result = mysqli_query($conn, $sql);

$table = "<table border='1'>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Username</th>
              <th>Password</th>
              <th>Action</th>
            </tr>";

if(mysqli_num_rows($result)>0){
  while ($row = mysqli_fetch_assoc($result)){
    $table .=  "<tr>
                  <td>".$row["nama"]."</td>
                  <td>".$row["username"]."</td>
                  <td>".$row["email"]."</td>
                  <td>".$row["password"]."</td>
                  <td><a href='updatetable.php?username=".$row["username"]."'>Edit</a> |
                      <a  href='deletetable.php?username=".$row["username"]."'
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
