<?php
    include "koneksi.php";
?>
<h2>MENAMPILKAN DATA </h2>
<table border="1">
    <tr><td>No</td>
        <td>NPM</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Email</td>
        <td>Foto</td>
        <td>Komentar</td>
    </tr>
    <?php

        $tampil = mysqli_query($mysqli, "select * from user_login");
        $no = 1;
        while($hasil = mysqli_fetch_array($tampil)){
    ?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $hasil['npm']; ?></td>
        <td><?php echo $hasil['nama']; ?></td>
        <td><?php echo $hasil['alamat']; ?></td>
        <td><?php echo $hasil['email']; ?></td>
        <td><?php echo $hasil['foto']; ?></td>
        <td><?php echo $hasil['komentar']; ?></td>
        </td>
    </tr>
    <?php
        }
    ?>
</table>