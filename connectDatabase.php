<?php

// Connect Database crud-2
$host = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'crud-2';
$connectDatabase = mysqli_connect($host, $username, $password, $databaseName);

if ($connectDatabase) {
    // echo "Koneksi Berhasil";
} else {
    // die("Koneksi Gagal: " . mysqli_connect_error());
}

// Menggunakan Database
mysqli_select_db($connectDatabase, $databaseName);

?>