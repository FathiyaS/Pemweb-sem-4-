<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama_alat= $_POST['nama_alat'];
    $kode = $_POST['kode'];
    $jenis=$_POST['jenis'];
    $tahun = $_POST['tahun'];
    $merek= $_POST['merek'];
    $lokasi = $_POST['lokasi'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE alat SET nama_alat='$nama_alat',kode='$kode',jenis='$jenis',tahun='$tahun',merek='$merek',lokasi='$lokasi' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM alat WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $nama_alat = $user_data['nama_alat'];
    $kode = $user_data['kode'];
    $jenis=$user_data['jenis'];
    $tahun = $user_data['tahun'];
    $merek= $user_data['merek'];
    $lokasi = $user_data['lokasi'];
}
?>
<html>
<head>
    <title>Edit User Data</title>
</head>

<body>
<a href="index.php">Home</a>
<br/><br/>

<form name="update_user" method="post" action="edit.php">
    <table border="0">
        <tr>
            <td>Nama Alat</td>
            <td><input type="text" name="nama_alat" value=<?php echo $nama_alat;?>></td>
        </tr>
        <tr>
            <td>Kode Alat</td>
            <td><input type="text" name="kode" value=<?php echo $kode;?>></td>
        </tr>
        <tr>
            <td>Jenis Alat</td>
            <td>
                <input type="radio" name="jenis" value="Peralatan Radiologi" <?php echo $jenis;?>> Peralatan Radiologi <br>
                <input type="radio" name="jenis" value="Peralatan Diagnostik" <?php echo $jenis;?>> Peralatan Diagnostik<br>
                <input type="radio" name="jenis" value="Peralatan TerapI" <?php echo $jenis;?>> Peralatan Terapi<br>
                <input type="radio" name="jenis" value="Peralatan Bedah dan Anestesi" <?php echo $jenis;?>> Peralatan Bedah dan Anestesi<br>
                <input type="radio" name="jenis" value="Peralatan Laboratorium Klinik" <?php echo $jenis;?>> Peralatan Laboratorium Klinik<br>
                <input type="radio" name="jenis" value="Peralatan Life Suport" <?php echo $jenis;?>> Peralatan Life Suport<br>
            </td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td><input type="text" name="tahun" value=<?php echo $tahun;?>></td>
        </tr>
        <tr>
            <td>Merek</td>
            <td><input type="text" name="merek" value=<?php echo $merek;?>></td>
        </tr>
        <tr>
            <td>Lokasi</td>
            <td>    
            <select name="lokasi">
                <option value="1">====Pilih Ruangan====</option>
                <option value="Ruang A1" <?php echo $lokasi;?>>Ruang A1</option>
                <option value="Ruang A2" <?php echo $lokasi;?>>Ruang A2</option>
                <option value="Ruang B7" <?php echo $lokasi;?>>Ruang B7</option>
                <option value="Ruang B8" <?php echo $lokasi;?>>Ruang B8</option>
                <option value="Ruang C7" <?php echo $lokasi;?>>Ruang C7</option>
                <option value="Ruang D1" <?php echo $lokasi;?>>Ruang D1</option>
                <option value="Ruang D2" <?php echo $lokasi;?>>Ruang D2</option>
            </select>
            </td>
        </tr>
        <tr>
            <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            <td><input type="submit" name="update" value="Update"></td>
        </tr>
    </table>
</form>
</body>
</html>