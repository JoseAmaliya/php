<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD Railway</title>
</head>
<body>

<h2>Tambah Data</h2>

<form method="POST" action="tambah.php">
    <input type="text" name="nama" placeholder="Nama">
    <input type="password" name="sandi" placeholder="Sandi">
    <button type="submit">Simpan</button>
</form>

<h2>Data Users</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Sandi</th>
    </tr>

<?php
$data = mysqli_query($koneksi, "SELECT * FROM users");

while($d = mysqli_fetch_assoc($data)){
?>

<tr>
    <td><?php echo $d['id']; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['sandi']; ?></td>
</tr>

<?php } ?>

</table>

</body>
</html>
