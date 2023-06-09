<?php
// Melakukan koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "bukutamu");
 
// Mendapatkan id yang akan di hapus 
$npm = $_REQUEST['npm'];
 
// Menghapus data
$sql = "DELETE FROM user_login WHERE npm='$npm'";
 
if (mysqli_query($conn, $sql)) {
    header('Location: userpage.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
 
// Menutup koneksi
mysqli_close($conn);
?>