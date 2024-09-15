<?php
    include "koneksi.php";


    if(isset($_POST['bcreate'])) {
        $create = mysqli_query($koneksi, "INSERT INTO goldarah (nama, tempat_lahir, tanggal_lahir, alamat, telepon, golongan_darah) VALUES ('$_POST[tnama]', '$_POST[ttmpt]', '$_POST[ttgl]', '$_POST[talamat]', '$_POST[ttlp]', '$_POST[tgol]')");

        if($create){
            echo "<script>
                    alert('CREATE DATA SUKSES');
                    document.location= 'golongandarah.php';
                  </script>";
        } else {
            echo "<script>
                    alert('CREATE DATA GAGAL');
                    document.location= 'golongandarah.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bedit'])) {
        $edit = mysqli_query($koneksi, "UPDATE goldarah SET nama = '$_POST[tnama]', tempat_lahir = '$_POST[ttmpt]',tanggal_lahir = '$_POST[ttgl]', alamat = '$_POST[talamat]', telepon = '$_POST[ttlp]', golongan_darah = '$_POST[tgol]' WHERE id_goldarah = '$_POST[id_goldarah]'");

        if($edit){
            echo "<script>
                    alert('EDIT DATA SUKSES');
                    document.location= 'golongandarah.php';
                  </script>";
        } else {
            echo "<script>
                    alert('EDIT DATA GAGAL');
                    document.location= 'golongandarah.php';
                  </script>";
        }
    }
?>

<?php
    include "koneksi.php";

    if(isset($_POST['bdelete'])) {
        $delete = mysqli_query($koneksi, "DELETE FROM goldarah WHERE id_goldarah = '$_POST[id_goldarah]'");

        if($delete){
            echo "<script>
                    alert('DELETE DATA SUKSES');
                    document.location= 'golongandarah.php';
                  </script>";
        } else {
            echo "<script>
                    alert('DELETE DATA GAGAL');
                    document.location= 'golongandarah.php';
                  </script>";
        }
    }
?>
