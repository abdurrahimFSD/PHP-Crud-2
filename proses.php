<?php

require './fungsi.php';

session_start();

if (isset($_POST['action'])) {
    if ($_POST['action'] == "add") {
        
        // Panggil Function createData
        $berhasil = createData($_POST, $_FILES);
        
        if($berhasil) {
            // echo "Data Berhasil Ditambahkan  <a href='./index.php'>[Home]</a>";
            $_SESSION['alert'] = "Data Berhasil Ditambahkan";
            header("location: ./index.php");
        } else {
            echo $berhasil;
        }        

    } else if ($_POST['action'] == "update") {
        
        // Panggil Function updateData
        $berhasil = updateData($_POST, $_FILES);

        if($berhasil) {
            // echo "Data Berhasil Diupdate  <a href='./index.php'>[Home]</a>";
            $_SESSION['alert'] = "Data Berhasil Diperbarui";
            header("location: ./index.php");
        } else {
            echo $berhasil;
        }  

        // header("location: ./index.php");

    }    
}

if (isset($_GET['delete'])) {
    
    // Panggil Function deleteData
    $berhasil = deleteData($_GET);
    
    if($berhasil) {
        // echo "Data Berhasil Dihapus  <a href='./index.php'>[Home]</a>";
        $_SESSION['alert'] = "Data Berhasil Dihapus";
        header("location: ./index.php");
    } else {
        echo $berhasil;
    }
    
}

?>