<?php
// Melakukan koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");
 
// Check koneksi
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Mendapatkan data yang akan di edit
$npm = $_POST['npm'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
 
// Membuat query untuk mengupdate data
$sql = "UPDATE user_login SET nama='$nama', alamat='$alamat' WHERE npm='$npm'";
 
if (mysqli_query($conn, $sql)) {
    header('Location: userpage.php');
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
 
// Menutup koneksi
mysqli_close($conn);
?>