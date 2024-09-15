<?php
    include "koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO blanko (tanggal, no_rmk, nama_pasien, ruangan, golongan_darah, rhesus, cross_test, kantong_darah, jenis_darah, hasil, reaksi, keterangan, pemeriksa) VALUES ('$_POST[ttgl]', '$_POST[trmk]', '$_POST[tnama]', '$_POST[truangan]', '$_POST[tgol]', '$_POST[trhesus]', '$_POST[tcross]', '$_POST[tkantong]', '$_POST[tjenis]', '$_POST[thasil]', '$_POST[treaksi]', '$_POST[tket]', '$_POST[tpemeriksa]')");

        if($create){
            echo "<script>
                    alert('CREATE DATA SUKSES');
                    document.location= 'blanko.php';
                  </script>";
        } else {
            echo "<script>
                    alert('CREATE DATA GAGAL');
                    document.location= 'blanko.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE blanko SET tanggal = '$_POST[ttgl]', no_rmk = '$_POST[trmk]',nama_pasien = '$_POST[tnama]', ruangan = '$_POST[truangan]', golongan_darah = '$_POST[tgol]', rhesus = '$_POST[trhesus]', cross_test = '$_POST[tcross]', kantong_darah = '$_POST[tkantong]', jenis_darah = '$_POST[tjenis]', hasil = '$_POST[thasil]', reaksi = '$_POST[treaksi]', keterangan = '$_POST[tket]', pemeriksa = '$_POST[tpemeriksa]' WHERE id_blanko = '$_POST[id_blanko]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUKSES');
                    document.location= 'blanko.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA GAGAL');
                    document.location= 'blanko.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM blanko WHERE id_blanko = '$_POST[id_blanko]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUKSES');
                    document.location= 'blanko.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA GAGAL');
                    document.location= 'delete.php';
                  </script>";
        }
    }
?>
