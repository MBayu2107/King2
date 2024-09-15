<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>AdminHub</title>
</head>
<body>
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-home'></i>
            <span class="text">UTD RSUD ULIN</span>
        </a>
        <ul class="side-menu top">
            <li class="active">
                <a href="home.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="golongandarah.php">
                    <i class='bx bxs-droplet'></i>
                    <span class="text">Golongan Darah</span>
                </a>
            </li>
            <li>
                <a href="blanko.php">
                    <i class='bx bxs-file-blank'></i>
                    <span class="text">Blanko Darah</span>
                </a>
            </li>
            <li>
                <a href="label.php">
                    <i class='bx bxs-file'></i>
                    <span class="text">Label Darah</span>
                </a>
            </li>
            <li>
                <a href="pendonor.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Pendonor</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-trash-alt'></i>
                    <span class="text">Pemusnahan Darah</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="text">Setting</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

    <section id="content">
        <nav>
            <i class="bx bx-menu"></i>
            <a href="#" class="nav-link">Categories</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class="bx bx-search"></i></button>
                </div>
            </form>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">8</span>
            </a>
            <a href="#" class="profile">
                <img src="img/utdrs.png" alt="">
            </a>
        </nav>
        <div class="container-fluid">
            <h2 class="text-center mt-3"><b>PEMUSNAHAN DARAH</b></h2>
            <button type="button" class="btn btn-outline-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#FormCreate">
                <i class="bi bi-plus-square-fill"></i>
                Create New
            </button>
            <table class="table table-condensed table-striped table-hover text-center w-100%" style="font-size: 12px; max-width: 100%;">
                <thead class="table-dark ">
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Ruangan</th>
                        <th>Nomor</th>
                        <th>Tanggal Pemusnahan</th>
                        <th>Tempat Pemusnahan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM pemusnahan ORDER BY id_pemusnahan DESC");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tbody class="border-dark">
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data ['nama'] ?></td>
                        <td><?= $data ['jabatan'] ?></td>
                        <td><?= $data ['ruangan'] ?></td>
                        <td><?= $data ['nomor'] ?></td>
                        <td><?= $data ['tanggal'] ?></td>
                        <td><?= $data ['tempat'] ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FormEdit<?= $no ?> "><i class="bi bi-pencil-fill" style="font-size: 12px;"></i></a>
                            <a href="#" class="btn btn-outline-success"><i class="bi bi-printer-fill" style="font-size: 12px;"></i></a>
                            <a href="#" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#FormDelete<?= $no ?> "><i class="bi bi-trash-fill" style="font-size: 12px;"></i></i></a>
                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="FormEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Edit Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crudpemusnahan.php">
                                <input type="hidden" name="id_pemusnahan" value="<?= $data['id_pemusnahan']?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" name="tjabatan" value="<?= $data['jabatan'] ?>" placeholder="Masukkan Jabatan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ruangan</label>
                                        <input type="text" class="form-control" name="truangan" value="<?= $data['ruangan'] ?>" placeholder="Masukkan Ruangan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nomor</label>
                                        <input type="text" class="form-control" name="tnomor" value="<?= $data['nomor'] ?>" placeholder="Masukkan Nomor">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Pemusnahan</label>
                                        <input type="date" class="form-control" name="ttgl" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal Pemusnahan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Tempat Pemusnahan</label>
                                        <input type="text" class="form-control" name="ttmp" value="<?= $data['tempat'] ?>" placeholder="Masukkan Tempat Pemusnahan">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                        <button type="submit" class="btn btn-outline-success" name="bedit"><i class="bi bi-check-square-fill"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="FormDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="aksi_crudpemusnahan.php">
                                <input type="hidden" name="id_pemusnahan" value="<?= $data['id_pemusnahan']?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <br>
                                        <span class="text-danger"><?= $data['nomor'] ?> - <?= $data['tanggal'] ?> </span>
                                    </h5>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal" >Batal</button>
                                    <button type="submit" class="btn btn-primary" name="bdelete">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </table>
            <div class="modal fade" id="FormCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-tittle fs-5" id="staticBackdropLabel">Create New Data</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="aksi_crudpemusnahan.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control" name="tjabatan" placeholder="Masukkan Jabatan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" name="truangan" placeholder="Masukkan Ruangan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor</label>
                                    <input type="text" class="form-control" name="tnomor" placeholder="Masukkan Nomor">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Pemusnahan</label>
                                    <input type="date" class="form-control" name="ttgl" placeholder="Masukkan Tanggal Pemusnahan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempat Pemusnahan</label>
                                    <input type="text" class="form-control" name="ttmp" placeholder="Masukkan Tempat Pemusnahan">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" ><i class="bi bi-x-square-fill"></i></button>
                                    <button type="submit" class="btn btn-outline-success" name="bcreate"><i class="bi bi-check-square-fill"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>