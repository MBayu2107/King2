<?php
    include "koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO pendonor (tanggal, nama_pendonor, golongan_darah, kategori_donor) VALUES ('$_POST[ttgl]', '$_POST[tnama]', '$_POST[tgol]', '$_POST[tkategori]')");

        if($create){
            echo "<script>
                    alert('CREATE DATA SUKSES');
                    document.location= 'pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('CREATE DATA GAGAL');
                    document.location= 'pendonor.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE pendonor SET tanggal = '$_POST[ttgl]', nama_pendonor = '$_POST[tnama]', golongan_darah = '$_POST[tgol]', kategori_donor = '$_POST[tkategori]' WHERE id_pendonor = '$_POST[id_pendonor]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUKSES');
                    document.location= 'pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA GAGAL');
                    document.location= 'pendonor.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM pendonor WHERE id_pendonor = '$_POST[id_pendonor]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUKSES');
                    document.location= 'pendonor.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA GAGAL');
                    document.location= 'pendonor.php';
                  </script>";
        }
    }
?>
