<html>
<head>
    <title>Add Alat</title>
</head>

<body>
<a href="index.php">Go to Home</a>
<br/><br/>

<form action="add.php" method="post" name="form1">
    <table width="50%" border="0">
        <tr>
            <td>Nama Alat</td>
            <td><input type="text" name="nama_alat"></td>
        </tr>
        <tr>
            <td>Kode alat</td>
            <td><input type="text" name="kode"></td>
        </tr>
        <tr>
            <td>Jenis Alat</td>
            <td>
                <input type="radio" name="jenis" value="Peralatan Radiologi" > Peralatan Radiologi <br>
                <input type="radio" name="jenis" value="Peralatan Diagnostik" > Peralatan Diagnostik<br>
                <input type="radio" name="jenis" value="Peralatan Terap" > Peralatan Terapi<br>
                <input type="radio" name="jenis" value="Peralatan Bedah dan Anestesi" > Peralatan Bedah dan Anestesi<br>
                <input type="radio" name="jenis" value="Peralatan Laboratorium Klinik" > Peralatan Laboratorium Klinik<br>
                <input type="radio" name="jenis" value="Peralatan Life Suport" > Peralatan Life Suport<br>
            </td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td><input type="text" name="tahun"></td>
        </tr>
        <tr>
            <td>Merek</td>
            <td><input type="text" name="merek"></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td>
            <select name="lokasi">
                <option value="1">====Pilih Ruangan====</option>
                <option value="Ruang A1">Ruang A1</option>
                <option value="Ruang A2">Ruang A2</option>
                <option value="Ruang B7">Ruang B7</option>
                <option value="Ruang B8">Ruang B8</option>
                <option value="Ruang C7">Ruang C7</option>
                <option value="Ruang D1">Ruang D1</option>
                <option value="Ruang D2">Ruang D2</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="desk" rows="8" col="200"></textarea>
            <br><br></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>

<?php

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
    $nama_alat= $_POST['nama_alat'];
    $kode=$_POST['kode'];
    $jenis=$_POST['jenis'];
    $tahun = $_POST['tahun'];
    $merek= $_POST['merek'];
    $lokasi = $_POST['lokasi'];
    $desk = $_POST['desk'];

    // include database connection file
    include_once("config.php");

    // Insert user data into table
    $result = mysqli_query($mysqli, "INSERT INTO alat(nama_alat,kode,jenis,tahun,merek,lokasi,desk) VALUES('$nama_alat','$kode','$jenis','$tahun','$merek','$lokasi','$desk')");

    // Show message when user added
    echo "User added successfully. <a href='index.php'>View Alat</a>";
}
?>
</body>
</html>