<?php
    include "koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO pemusnahan (nama, jabatan, ruangan, nomor, tanggal, tempat) VALUES ('$_POST[tnama]', '$_POST[tjabatan]', '$_POST[truangan]', '$_POST[tnomor]', '$_POST[ttgl]', '$_POST[ttmp]')");

        if($create){
            echo "<script>
                    alert('CREATE DATA SUKSES');
                    document.location= 'pemusnahan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('CREATE DATA GAGAL');
                    document.location= 'pemusnahan.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE pemusnahan SET nama = '$_POST[tnama]', jabatan = '$_POST[tjabatan]', ruangan = '$_POST[truangan]', ruangan = '$_POST[truangan]', tanggal = '$_POST[ttgl]', tempat = '$_POST[ttmp]' WHERE id_pemusnahan = '$_POST[id_pemusnahan]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUKSES');
                    document.location= 'pemusnahan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA GAGAL');
                    document.location= 'pemusnahan.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM pemusnahan WHERE id_pemusnahan = '$_POST[id_pemusnahan]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUKSES');
                    document.location= 'pemusnahan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA GAGAL');
                    document.location= 'pemusnahan.php';
                  </script>";
        }
    }
?>
