<?php
include 'koneksi.php';

header('Content-Type: application/json');

$data = mysqli_query($koneksi, "SELECT * FROM users");

$users = [];

while($d = mysqli_fetch_assoc($data)){
    $users[] = $d;
}

echo json_encode($users, JSON_PRETTY_PRINT);
?>
