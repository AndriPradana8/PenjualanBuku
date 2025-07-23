<?php
    include "../koneksi.php";

    $nama_user = $_POST['nama_user'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO 14_tabel_user(nama_user,
                                        kelas,
                                        jurusan,
                                        username,
                                        password)
                            VALUES ('$nama_user',
                                    '$kelas',
                                    '$jurusan',
                                    '$username',
                                    '$password'
                            )";

    $result = $conn->query($query);

    if ($result) {
        header("Location: ../admin/kelola_user.php");
        exit();
    } else {
        echo "Gagal menyimpan data. Silahkan diulangi lagi.";
        echo "Error SQL: " . $conn->error . "<br>";
        echo "<a href = '../admin/tambah_user.php'>Input Ulang</a>";
    }
?>