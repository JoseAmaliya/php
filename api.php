<?php
include 'koneksi.php';

header('Content-Type: application/json');

$method = $_SERVER['REQUEST_METHOD'];


// ================= GET =================
if($method == 'GET'){

    $data = mysqli_query($koneksi, "SELECT * FROM users");

    $users = [];

    while($d = mysqli_fetch_assoc($data)){
        $users[] = $d;
    }

    echo json_encode($users, JSON_PRETTY_PRINT);
}


// ================= POST =================
elseif($method == 'POST'){

    $data = json_decode(file_get_contents("php://input"), true);

    $nama = $data['nama'];
    $sandi = $data['sandi'];

    $query = mysqli_query($koneksi,
    "INSERT INTO users(nama, sandi)
    VALUES('$nama','$sandi')");

    if($query){
        echo json_encode([
            "status" => "success",
            "message" => "Data berhasil ditambah"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal tambah data"
        ]);
    }
}


// ================= PUT =================
elseif($method == 'PUT'){

    $data = json_decode(file_get_contents("php://input"), true);

    $id = $_GET['id'];
    $nama = $data['nama'];
    $sandi = $data['sandi'];

    $query = mysqli_query($koneksi,
    "UPDATE users
    SET nama='$nama', sandi='$sandi'
    WHERE id='$id'");

    if($query){
        echo json_encode([
            "status" => "success",
            "message" => "Data berhasil diupdate"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal update data"
        ]);
    }
}


// ================= DELETE =================
elseif($method == 'DELETE'){

    $id = $_GET['id'];

    $query = mysqli_query($koneksi,
    "DELETE FROM users WHERE id='$id'");

    if($query){
        echo json_encode([
            "status" => "success",
            "message" => "Data berhasil dihapus"
        ]);
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Gagal hapus data"
        ]);
    }
}
?>
