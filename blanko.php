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
                <a href="#">
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
                <a href="pemusnahan.php">
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
            <h2 class="text-center mt-3"><b>BLANKO DARAH</b></h2>
            <button type="button" class="btn btn-outline-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#FormCreate">
                <i class="bi bi-plus-square-fill"></i>
                Create New
            </button>
            <table class="table table-condensed table-striped table-hover text-center w-100%" style="font-size: 12px; max-width: 100%;">
                <thead class="table-dark ">
                    <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>NO. RMK</th>
                        <th>Nama</th>
                        <th>Ruangan</th>
                        <th>Golongan Darah</th>
                        <th>Rhesus</th>
                        <th>NO. Cross Test</th>
                        <th>NO. Kantong Darah</th>
                        <th>Jenis Darah</th>
                        <th>Hasil Pemeriksaan</th>
                        <th>Reaksi Transfusi</th>
                        <th>Keterangan</th>
                        <th>Pemeriksa</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                    $no = 1;
                    $tampil = mysqli_query($koneksi, "SELECT * FROM blanko ORDER BY id_blanko DESC");
                    while($data = mysqli_fetch_array($tampil)) :
                ?>
                <tbody class="border-dark">
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data ['tanggal'] ?></td>
                        <td><?= $data ['no_rmk'] ?></td>
                        <td><?= $data ['nama_pasien'] ?></td>
                        <td><?= $data ['ruangan'] ?></td>
                        <td><?= $data ['golongan_darah'] ?></td>
                        <td><?= $data ['rhesus'] ?></td>
                        <td><?= $data ['cross_test'] ?></td>
                        <td><?= $data ['kantong_darah'] ?></td>
                        <td><?= $data ['jenis_darah'] ?></td>
                        <td><?= $data ['hasil'] ?></td>
                        <td><?= $data ['reaksi'] ?></td>
                        <td><?= $data ['keterangan'] ?></td>
                        <td><?= $data ['pemeriksa'] ?></td>
                        <td>
                            <a href="#" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#FormEdit<?= $no ?> "><i class="bi bi-pencil-fill" style="font-size: 12px;"></i></a>
                            <a href="cetak_blanko.php" class="btn btn-outline-success"><i class="bi bi-printer-fill" style="font-size: 12px;"></i></a>
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
                            <form method="POST" action="aksi_crudblanko.php">
                                <input type="hidden" name="id_blanko" value="<?= $data['id_blanko']?>">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" name="ttgl" value="<?= $data['tanggal'] ?>" placeholder="Masukkan Tanggal">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NO. RMK</label>
                                        <input type="text" class="form-control" name="trmk" value="<?= $data['no_rmk'] ?>" placeholder="Masukkan NO. RMK">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="tnama" value="<?= $data['nama_pasien'] ?>" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ruangan</label>
                                        <input type="text" class="form-control" name="truangan" value="<?= $data['ruangan'] ?>" placeholder="Masukkan Ruangan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Golongan Darah</label>
                                        <select class="form-select" name="tgol" id="">
                                            <option value="<?= $data['golongan_darah'] ?>"><?= $data['golongan_darah'] ?></option>
                                            <option value="AB">AB</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rhesus</label>
                                        <select class="form-select" name="trhesus" id="">
                                            <option value="<?= $data['rhesus'] ?>"><?= $data['rhesus'] ?></option>
                                            <option value="Positif (+)">Positif (+)</option>
                                            <option value="Negatif (-)">Negatif (-)</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NO Cross Test</label>
                                        <input type="text" class="form-control" name="tcross" value="<?= $data['cross_test'] ?>" placeholder="Masukkan NO. Cross Test">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">NO. Kantong Darah</label>
                                        <input type="text" class="form-control" name="tkantong" value="<?= $data['kantong_darah'] ?>" placeholder="Masukkan NO. Kantong Darah">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jenis Darah</label>
                                        <select class="form-select" name="tjenis" id="">
                                            <option value="<?= $data['jenis_darah'] ?>"><?= $data['jenis_darah'] ?></option>
                                            <option value="WB">WB</option>
                                            <option value="PRC">PRC</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Hasil Pemeriksaan</label>
                                        <input type="text" class="form-control" name="thasil" value="<?= $data['hasil'] ?>" placeholder="Masukkan NO. Hasil Pemeriksaan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Reaksi Transfusi</label>
                                        <input type="text" class="form-control" name="treaksi" value="<?= $data['reaksi'] ?>" placeholder="Masukkan Reaksi Transfusi">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" name="tket" value="<?= $data['keterangan'] ?>" placeholder="Masukkan Keterangan">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Pemeriksa</label>
                                        <select class="form-select" name="tpemeriksa" id="">
                                            <option value="<?= $data['pemeriksa'] ?>"><?= $data['pemeriksa'] ?></option>
                                            <option value="Rahmani">Rahmani</option>
                                            <option value="Taufik">Taufik</option>
                                        </select>
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
                            <form method="POST" action="aksi_crudblanko.php">
                                <input type="hidden" name="id_blanko" value="<?= $data['id_blanko']?>">
                                <div class="modal-body">
                                    <h5 class="text-center">Apakah Anda Yakin Akan Menghapus Data Ini ?
                                        <br>
                                        <span class="text-danger"><?= $data['nama_pasien'] ?> - Golongan Darah <?= $data['golongan_darah'] ?> </span>
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
                        <form method="POST" action="aksi_crudblanko.php">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" name="ttgl" placeholder="Masukkan Tanggal">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO. RMK</label>
                                    <input type="text" class="form-control" name="trmk" placeholder="Masukkan NO. RMK">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" name="truangan" placeholder="Masukkan Ruangan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Golongan Darah</label>
                                    <select class="form-select" name="tgol" id="">
                                        <option value=""></option>
                                        <option value="AB">AB</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Rhesus</label>
                                    <select class="form-select" name="trhesus" id="">
                                        <option value=""></option>
                                        <option value="Positif (+)">Positif (+)</option>
                                        <option value="Negatif (-)">Negatif (-)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO Cross Test</label>
                                    <input type="text" class="form-control" name="tcross" placeholder="Masukkan NO. Cross Test">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">NO. Kantong Darah</label>
                                    <input type="text" class="form-control" name="tkantong" placeholder="Masukkan NO. Kantong Darah">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Darah</label>
                                    <select class="form-select" name="tjenis" id="">
                                        <option value=""></option>
                                        <option value="WB">WB</option>
                                        <option value="PRC">PRC</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hasil Pemeriksaan</label>
                                    <input type="text" class="form-control" name="thasil" placeholder="Masukkan NO. Hasil Pemeriksaan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Reaksi Transfusi</label>
                                    <input type="text" class="form-control" name="treaksi" placeholder="Masukkan Reaksi Transfusi">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" name="tket" placeholder="Masukkan Keterangan">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pemeriksa</label>
                                    <select class="form-select" name="tpemeriksa" id="">
                                        <option value=""></option>
                                        <option value="Rahmani">Rahmani</option>
                                        <option value="Taufik">Taufik</option>
                                    </select>
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