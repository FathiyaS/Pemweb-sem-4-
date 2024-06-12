<style type="text/css">
    .header{
        background-color: cyan;
    }
</style>
<?php

include_once("config.php");


$result = mysqli_query($mysqli, "SELECT * FROM alat ORDER BY id ASC");
?>

<html>
<head>
    <title>Sim Rs</title>
</head>

<body>
<b>Data Alat Elektromedis</b><br>
<a href="add.php">Tambah Alat</a><br/><br/>

<table width='80%' border=1>

    <tr class="header">
        <th>No</th><th>Nama Alat</th><th>Kode Alat</th><th>Jenis Alat</th><th>Tahun</th> <th>Merek</th><th>Lokasi</th><th>Deskripsi</th><th>Aksi</th>
    </tr>
    <?php
    $i=1;
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$user_data['nama_alat']."</td>";
        echo "<td>".$user_data['kode']."</td>";
        echo "<td>".$user_data['jenis']."</td>";
        echo "<td>".$user_data['tahun']."</td>";
        echo "<td>".$user_data['merek']."</td>";
        echo "<td>".$user_data['lokasi']."</td>";
        echo "<td>".$user_data['desk']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";
        $i++;
    }
    ?>
</table>
</body>

</html>