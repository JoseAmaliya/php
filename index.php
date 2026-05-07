<?php
include 'koneksi.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET'){

    $data = mysqli_query($koneksi, "SELECT * FROM users");

    $users = [];

    while($d = mysqli_fetch_assoc($data)){
        $users[] = $d;
    }

    echo json_encode($users, JSON_PRETTY_PRINT);
}

elseif($method == 'POST'){

    $nama = $_POST['nama'];
    $sandi = $_POST['sandi'];

    $query = mysqli_query($koneksi,
    "INSERT INTO users(nama, sandi)
    VALUES('$nama','$sandi')");

    if($query){
        echo json_encode([
            "message" => "Data berhasil ditambah"
        ]);
    } else {
        echo json_encode([
            "message" => "Gagal tambah data"
        ]);
    }
}
?>
