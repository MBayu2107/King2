<?php
    include "koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO label (produk, volume, wkt_minta, expired, no_kantong, suhu, golongan_darah, rhesus, reaktif, no_rmk, nama_pasien, ruangan, hasil, pemeriksa) VALUES ('$_POST[tproduk]', '$_POST[tvolume]', '$_POST[tminta]', '$_POST[texpired]', '$_POST[tkantong]', '$_POST[tsuhu]', '$_POST[tgol]', '$_POST[trhesus]', '$_POST[treaktif]', '$_POST[trmk]', '$_POST[tnama]', '$_POST[truangan]', '$_POST[thasil]', '$_POST[tpemeriksa]')");

        if($create){
            echo "<script>
                    alert('CREATE DATA SUKSES');
                    document.location= 'label.php';
                  </script>";
        } else {
            echo "<script>
                    alert('CREATE DATA GAGAL');
                    document.location= 'label.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE label SET produk = '$_POST[tproduk]', volume = '$_POST[tvolume]', wkt_minta = '$_POST[tminta]', expired = '$_POST[texpired]', no_kantong = '$_POST[tkantong]', suhu = '$_POST[tsuhu]', golongan_darah = '$_POST[tgol]', rhesus = '$_POST[trhesus]', reaktif = '$_POST[treaktif]', no_rmk = '$_POST[trmk]', nama_pasien = '$_POST[tnama]', ruangan = '$_POST[truangan]', hasil = '$_POST[thasil]', pemeriksa = '$_POST[tpemeriksa]' WHERE id_label = '$_POST[id_label]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUKSES');
                    document.location= 'label.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA GAGAL');
                    document.location= 'label.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM label WHERE id_label = '$_POST[id_label]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUKSES');
                    document.location= 'label.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA GAGAL');
                    document.location= 'label.php';
                  </script>";
        }
    }
?>
