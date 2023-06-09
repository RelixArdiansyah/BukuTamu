<?php
session_start();
include "koneksi.php"
// include "upload.php"

?>

<form action="" method="POST" enctype="multipart/form-data">
    <table align="center">
<tr>
            <th colspan="2" heigt="40"> Register</th>
</tr>
<tr>
            <th width="100"> NPM </th>
            <td><input type="int" name="npm"></td>
</tr>
<tr>
            <th width="100"> nama </th>
            <td><input type="text" name="nama"></td>
</tr>
<tr>
            <th width="100"> alamat </th>
            <td><input type="text" name="alamat"></td>
</tr>
<tr>
            <th width="100"> email </th>
            <td><input type="text" name="email"></td>
</tr>
<tr>
            <th width="100"> Image </th>
            <td><input type="file" name="foto"></td>
</tr>
<tr>
            <th width="100"> komentar </th>
            <td><input type="text" name="komentar"></td>
</tr>
<tr>
            <th width="100"> password </th>
            <td><input type="password" name="password"></td>
</tr>
<tr>
    <td></td>
    <td><input type="submit" value="simpan" name="proses"></td>
</tr>
</table>
</form>


<?php
if(isset($_POST['proses'])){
    $foto = $_FILES['foto']['name'];
	$file_tmp = $_FILES['foto']['tmp_name'] ;
	$nama = $_POST['nama'] ;
	move_uploaded_file($file_tmp, 'images/'.$foto) ;

    mysqli_query($koneksi "insert into user set
    npm = '$_POST[npm]',
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    email = '$_POST[email]',
    file = '$foto',
    komentar = '$_POST[komentar]',
    password = '$_POST[password]'") or die(mysqli_error($koneksi));
    
    echo "<script> alert('data telah tersimpan')</script>";
    }
?>