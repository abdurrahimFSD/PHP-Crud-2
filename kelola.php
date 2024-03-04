<?php
    require './connectDatabase.php';
    
    session_start(); 

    $idSiswa = '';
    $nisn = '';
    $namaSiswa = '';
    $jenisKelamin = '';
    $alamatSiswa = '';
    
    if(isset($_GET['update'])) {
        $idSiswa = $_GET['update'];

        $query = "SELECT * FROM tb_siswa WHERE id_siswa = '$idSiswa'; ";
        $sql = mysqli_query($connectDatabase, $query);
        
        $result = mysqli_fetch_assoc($sql);
        
        $nisn = $result['nisn'];
        $namaSiswa = $result['nama_siswa'];
        $jenisKelamin = $result['jenis_kelamin'];
        $alamatSiswa = $result['alamat'];
        
        // var_dump($result);
        // die();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Data</title>

        <!-- CSS Bootstrap -->
        <link
            rel="stylesheet"
            href="./assets/vendors/bootstrap/bootstrap.min.css"
        />

        <!-- CSS Font Awesome -->
        <link
            rel="stylesheet"
            href="./assets/vendors/fontawesome/all.min.css"
        />
    </head>
    <body>
        <!-- Navbar -->
        <nav class="navbar bg-primary mb-4">
            <div class="container">
                <a class="navbar-brand fw-bold">CRUD - BS-5</a>
            </div>
        </nav>
        <!-- Navbar end -->

        <!--  -->
        <div class="container mb-4">
            <h2>Kelola Data Siswa</h2>
        </div>
        <!--  -->
        
        
        <!-- Form -->
        <div class="container ">
            
            <form action="./proses.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idSiswa" value="<?php echo $idSiswa; ?>">

                <div class="mb-3 row">
                    <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="nisn" name="nisn" value="<?php echo $nisn; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="namaSiswa" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="namaSiswa" name="namaSiswa" value="<?php echo $namaSiswa; ?>" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="jenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jenisKelamin" name="jenisKelamin" required>
                            <option selected>Jenis Kelamin</option>
                            <option <?php if($jenisKelamin == 'Laki-laki') {echo "selected";} ?> value="Laki-laki">Laki-laki</option>
                            <option <?php if($jenisKelamin == 'Perempuan') {echo "selected";} ?> value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fotoSiswa" class="col-sm-2 col-form-label">Foto Siswa</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="fotoSiswa" name="fotoSiswa" accept="image/*" <?php if(!isset($_GET['update'])) {echo "required";} ?> >
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="alamatSiswa" class="form-label col-sm-2">Alamat Siswa</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="alamatSiswa" name="alamatSiswa" rows="3" required><?php echo $alamatSiswa; ?></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <?php
                            if(isset($_GET['update'])) {
                        ?>
                            <button class="btn btn-primary me-3" type="submit" name="action" value="update"> <i class="fa-solid fa-floppy-disk"></i>Update Data</button>
                        <?php
                            } else {
                        ?>
                            <button class="btn btn-primary me-3" type="submit" name="action" value="add"> <i class="fa-solid fa-floppy-disk"></i>Tambah Data</button>
                        <?php
                            }
                        ?>
                    
                        <a href="./index.php" class="btn btn-danger" type="button"> <i class="fa-solid fa-reply"></i> Batal</a>
                    </div>
                </div>
                
            </form>

        </div>
       

        <!-- Form end -->

        

        <!-- JS Bootstrap -->
        <script src="./assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- JS Font Awesome -->
        <script src="./assets/vendors/fontawesome/all.min.js"></script>
    </body>
</html>
