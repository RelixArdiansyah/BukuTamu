<?php
// Melakukan koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");
 
// Check koneksi
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Mendapatkan id yang akan di edit 
$npm = $_REQUEST['npm'];
 
// Mencari data yang akan di edit
$sql = "SELECT * FROM user_login WHERE npm = '$npm'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
// Membuat variabel untuk menyimpan data
$nama = $row['nama'];
$alamat = $row['alamat'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <style type="text/css">
        fieldset {
            margin: auto;
            margin-top: 100px;
            width: 50%;
        }

        table tr th {
            padding-top: 20px;
        }
    </style>
</head>
<body>

<fieldset>
    <legend>Edit Data</legend>

    <form action="edit_aksi.php" method="post">
        <table cellspacing="0" cellpadding="0">
            <tr>
                <th>Nama</th>
                <td><input type="hidden" name="id" value="<?php echo $id ?>"><input type="text" name="nama" value="<?php echo $nama ?>" required /></td>
            </tr>     
            <tr>
                <th>Alamat</th>
                <td><input type="text" name="alamat"  value="<?php echo $alamat ?>" required /></td>
            </tr>
            <tr>
                <td><button type="submit">Simpan</button></td>
                <td><a href="index.php"><button type="button">Kembali</button></a></td>
            </tr>
        </table>
    </form>

</fieldset>

</body>
</html>