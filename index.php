<?php
require './connectDatabase.php';

session_start();

$query = "SELECT * FROM tb_siswa;";
$sql = mysqli_query($connectDatabase, $query);
$no = 0;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Home Crud</title>

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

        <!-- CSS Data Tables -->
        <link rel="stylesheet" href="./assets/vendors/DataTables/datatables.css">
    </head>
    
    <body>
        <!-- Navbar -->
        <nav class="navbar bg-primary mb-3 table">
            <div class="container">
                <a class="navbar-brand fw-bold">CRUD - BS-5</a>
            </div>
        </nav>
        <!-- Navbar end -->

        
        <!-- Judul -->
        <div class="container">
            <h1>Data Siswa</h1>
            <figure>
                <blockquote class="blockquote">
                    <p>Berisi data yang telah disimpan di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                    CRUD
                    <cite title="Source Title">Create Read Update Delete</cite>
                </figcaption>
            </figure>

            <a href="./kelola.php" type="button" class="btn btn-primary my-3">
                <i class="fa-solid fa-plus"></i>
                Create Data
            </a>
            
            <?php 
                if(isset($_SESSION['alert'])) {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>
                            <?php
                                echo $_SESSION['alert'].".";
                            ?>
                        </strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php
                    session_destroy();
                }
            ?>
            <div class="table-responsive table-striped">
                <table id="dataTables" class="table align-middle table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">No.</th>
                            <th>NISN</th>
                            <th>Nama Siswa</th>
                            <th>Jenis Kelamin</th>
                            <th>Foto Siswa</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            while($result = mysqli_fetch_assoc($sql)):
                        ?>

                                <tr>
                                    <td class="text-center">
                                        <?php
                                            echo ++$no;
                                        ?>.
                                    </td>
                                    <td>
                                        <?php
                                            echo $result['nisn'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result['nama_siswa'];
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            echo $result['jenis_kelamin'];
                                        ?>
                                    </td>
                                    <td>
                                        <img
                                            src="./assets/images/<?php echo $result['foto_siswa']; ?>"
                                            alt="foto"
                                            width="50px"
                                        />
                                    </td>
                                    <td>
                                        <?php
                                            echo $result['alamat'];
                                        ?>
                                    </td>
                                    <td>
                                        <a  href="./kelola.php?update=<?php echo $result['id_siswa']; ?>"
                                            type="button"
                                            class="btn btn-success btn-sm"
                                        >
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            Update
                                        </a>
                                        <a
                                            href="./proses.php?delete=<?php echo $result['id_siswa']; ?>"
                                            type="button"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data tersebut..?')"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                        <?php
                            endwhile;
                        ?>

                        
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mb-5"></div>

        
        <!-- JS Bootstrap -->
        <script src="./assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
        
        <!-- JS Font Awesome -->
        <script src="./assets/vendors/fontawesome/all.min.js"></script>

        <!-- JS Data Tables -->
        <script src="./assets/vendors/DataTables/datatables.js"></script>
        
        <!-- JS Script -->
        <script src="./assets/scripts/script.js"></script>
    </body>
</html>
