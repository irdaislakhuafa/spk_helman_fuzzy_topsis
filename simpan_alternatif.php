<?php
$nama_pemilik = $_POST["nama_pemilik"];
$alamat = $_POST["alamat"];
$c1 = $_POST["jenis_tanah"];
$c2 = isset($_POST["suhu"]) ? $_POST["suhu"] : 1;
$c3 = $_POST["ketersediaan_air"];
$c4 = isset($_POST["ph_tanah"]) ? $_POST["ph_tanah"] : 1;
$c5 = $_POST["lapisan_olahan"];

include "db.php";
$insert = "INSERT INTO alternatif (nama_pemilik, alamat, c1, c2, c3, c4, c5) VALUES ('$nama_pemilik', '$alamat', '$c1', '$c2', '$c3', '$c4', '$c5')";
if ($conn->query($insert)) {
    header("location: alternatif.php?status=tambah");
} else {
    header("location: alternatif.php?status=!tambah");
}
