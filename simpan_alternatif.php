<?php
include "db.php";

$nama_pemilik = $_POST["nama_pemilik"];
$alamat = $_POST["alamat"];
$c1 = $_POST["jenis_tanah"];
$c2 = isset($_POST["suhu"]) ? $_POST["suhu"] : 1;
$c3 = $_POST["ketersediaan_air"];
$c4 = isset($_POST["ph_tanah"]) ? $_POST["ph_tanah"] : 1;
$c5 = $_POST["lapisan_olahan"];

// fuzzy
// check susu c2
$suhu = $c2;
$c2 = 0.0;
if (intval($suhu) == 12) {
    $c2 = 1.0;
} else if (intval($suhu) > 12 && intval($suhu) < 32) {
    $c2 = (32 - $suhu) / (32 - 12);
} else if (intval($suhu) >= 32) {
    $c2 = 0;
}
$c2_real = $suhu;

// check ph tanah c4
$ph = floatval($c4);
if (($ph <= 5.0) || ($ph >= 7.0)) {
    $c4 = 0.0;
} else if ($ph <= 6.0) {
    $c4 = floatval(($ph - 5.0) / (6.0 - 5.0));
} else if ($ph > 6.0) {
    $c4 = floatval((6.0 - $ph) / (7.0 - 5.0));
    return;
}
$c4_real = $ph;

$insert = "INSERT INTO alternatif (nama_pemilik, alamat, c1, c2, c2_real, c3, c4, c4_real, c5) VALUES ('$nama_pemilik', '$alamat', '$c1', '$c2', '$c2_real', '$c3', '$c4', '$c4_real', '$c5')";
if ($conn->query($insert)) {
    header("location: alternatif.php?status=tambah");
} else {
    header("location: alternatif.php?status=!tambah");
}
