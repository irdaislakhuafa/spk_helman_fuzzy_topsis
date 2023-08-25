<?php
include "db.php";
$id = $_GET["id"];
$delete = "DELETE FROM alternatif WHERE id_alternatif = '$id'";
if ($conn->query($delete)) {
    header("location: alternatif.php?status=hapus");
} else {
    header("location: alternatif.php?status=!hapus");
}
