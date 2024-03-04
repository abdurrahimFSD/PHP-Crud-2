<?php

require './connectDatabase.php';

// CREATE DATA
function createData($data, $files) {    // $data => $data, $files => $files
    $nisn = $data['nisn'];
    $namaSiswa = $data['namaSiswa'];
    $jenisKelamin = $data['jenisKelamin'];

    $split = explode('.', $files['fotoSiswa']['name']);
    $extension = $split[count($split)-1];
    $fotoSiswa = $nisn.'.'.$extension;
    
    $alamatSiswa = $data['alamatSiswa'];

    $fotoDirectory = "./assets/images/";
    $tmpFile = $files['fotoSiswa']['tmp_name'];

    move_uploaded_file($tmpFile, $fotoDirectory.$fotoSiswa);

    // global $connectDatabase, $query, $sql;
    $query = "INSERT INTO tb_siswa VALUES(null, '$nisn', '$namaSiswa', '$jenisKelamin', '$fotoSiswa', '$alamatSiswa')";
    $sql = mysqli_query($GLOBALS['connectDatabase'], $query);
    
    return true;
}


// UPDATE DATA
function updateData($data, $files) {
    $idSiswa = $data['idSiswa'];
    $nisn = $data['nisn'];
    $namaSiswa = $data['namaSiswa'];
    $jenisKelamin = $data['jenisKelamin'];
    $alamatSiswa = $data['alamatSiswa'];

    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$idSiswa';";
    $sqlShow = mysqli_query($GLOBALS['connectDatabase'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    if ($files['fotoSiswa']['name'] == "") {
        $fotoSiswa = $result['foto_siswa'];
    } else {

        $split = explode('.', $files['fotoSiswa']['name']);
        $extension = $split[count($split)-1];
        
        $fotoSiswa = $result['nisn'].'.'.$extension;
        unlink("./assets/images/".$result['foto_siswa']);
        move_uploaded_file($files['fotoSiswa']['tmp_name'], './assets/images/'.$fotoSiswa);
    }

    $query = "UPDATE tb_siswa SET nisn='$nisn', nama_siswa='$namaSiswa', jenis_kelamin='$jenisKelamin', foto_siswa = '$fotoSiswa',  alamat='$alamatSiswa' WHERE id_siswa = '$idSiswa';";
    $sql = mysqli_query($GLOBALS['connectDatabase'], $query);
    
    return true;
}


// DELETE DATA
function deleteData($data) {
    $idSiswa = $data['delete'];

    $queryShow = "SELECT * FROM tb_siswa WHERE id_siswa = '$idSiswa';";
    $sqlShow = mysqli_query($GLOBALS['connectDatabase'], $queryShow);
    $result = mysqli_fetch_assoc($sqlShow);

    unlink("./assets/images/".$result['foto_siswa']);
    
    $query = "DELETE FROM tb_siswa WHERE id_siswa = '$idSiswa'";
    $sql = mysqli_query($GLOBALS['connectDatabase'], $query);
    
    return true;
}

?>