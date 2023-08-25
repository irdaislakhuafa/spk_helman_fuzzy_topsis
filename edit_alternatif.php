<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Edit Alternatif");
?>

<body>
    <?php
    createNavbar();
    if (isset($_POST["id_alternatif"])) {
        if ($_POST["id_alternatif"]) {
            include "db.php";
            $id_alternatif = $_POST["id_alternatif"];
            $nama_pemilik = $_POST["nama_pemilik"];
            $alamat = $_POST["alamat"];
            $c1 = $_POST["jenis_tanah"];
            $c2 = isset($_POST["suhu"]) ? $_POST["suhu"] : 1;
            $c3 = $_POST["ketersediaan_air"];
            $c4 = isset($_POST["ph_tanah"]) ? $_POST["ph_tanah"] : 1;
            $c5 = $_POST["lapisan_olahan"];
            $update = "UPDATE alternatif SET nama_pemilik = '$nama_pemilik', alamat = '$alamat', c1 = '$c1', c2 = '$c2', c3 = '$c3', c4 = '$c4', c5 = '$c5' WHERE id_alternatif = $id_alternatif";

            if ($conn->query($update)) {
                header("location: alternatif.php?status=edit");
            } else {
                header("location: alternatif.php?status=!edit");
            }
        }
    }

    $body = function () {
        include "db.php";
        $id = $_GET["id"];
        $alternatif = $conn->query("SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c3, a.c4, a.c5 FROM alternatif a WHERE a.id_alternatif = '$id'")->fetch_assoc();
    ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- <h2 class="mb-4">Tambah Alternatif</h2> -->
            <div class="d-flex justify-content-center">
                <!-- start card -->
                <div class="card shadow rounded-5" style="width: 50rem;">
                    <div class="card-body">
                        <h5 class="card-title">Edit Alternatif</h5>

                        <!-- start form -->
                        <form action="./edit_alternatif.php" method="post">
                            <!-- id alternatif -->
                            <input hidden name="id_alternatif" type="text" class="form-control" id="id_alternatif" required value="<?= $alternatif["id_alternatif"] ?>">

                            <!-- nama pemilik -->
                            <div class="mb-3 row">
                                <label for="nama_pemilik" class="col-sm-2 col-form-label text-capitalize">nama pemilik</label>
                                <div class="col-sm-10">
                                    <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" required value="<?= $alternatif["nama_pemilik"] ?>">
                                </div>
                            </div>

                            <!-- alamat -->
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label text-capitalize">alamat</label>
                                <div class="col-sm-10">
                                    <input name="alamat" type="text" class="form-control" id="alamat" rows="10" required value="<?= $alternatif["alamat"] ?>"> </input>
                                </div>
                            </div>

                            <!-- Jenis Tanah -->
                            <div class="mb-3 row">
                                <label for="jenis_tanah" class="col-sm-2 col-form-label text-capitalize">jenis tanah</label>
                                <div class="col-sm-10">
                                    <select name="jenis_tanah" id="jenis_tanah" required>
                                        <option selected value="">Pilih Jenis Tanah</option>
                                        <?php
                                        include "db.php";
                                        $list_jenis_tanah = $conn->query("SELECT id_crips, nama FROM crips, kriteria WHERE crips.id_kriteria = kriteria.id_kriteria AND kriteria.tipe = 'c1'");
                                        $conn->close();
                                        foreach ($list_jenis_tanah as $i => $v) { ?>
                                            <option value="<?= $v['id_crips'] ?>"><?= $v["nama"] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TODO: added input suhu -->

                            <!-- ketersediaan air -->
                            <div class="mb-3 row">
                                <label for="ketersediaan_air" class="col-sm-2 col-form-label text-capitalize">ketersediaan air</label>
                                <div class="col-sm-10">
                                    <select name="ketersediaan_air" id="ketersediaan_air" required>
                                        <option selected value="">Pilih ketersediaan Air</option>
                                        <?php
                                        include "db.php";
                                        $list_ketersediaan_air = $conn->query("SELECT id_crips, nama FROM crips, kriteria WHERE crips.id_kriteria = kriteria.id_kriteria AND kriteria.tipe = 'c3'");
                                        $conn->close();
                                        foreach ($list_ketersediaan_air as $i => $v) { ?>
                                            <option value="<?= $v['id_crips'] ?>"><?= $v["nama"] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <!-- TODO: added input PH tanah -->

                            <!-- lapisan olahan -->
                            <div class="mb-3 row">
                                <label for="lapisan_olahan" class="col-sm-2 col-form-label text-capitalize">lapisan olahan</label>
                                <div class="col-sm-10">
                                    <select name="lapisan_olahan" id="lapisan_olahan" required>
                                        <option selected value="">Lapisan Olahan</option>
                                        <?php
                                        include "db.php";
                                        $list_lapisan_olahan = $conn->query("SELECT id_crips, nama FROM crips, kriteria WHERE crips.id_kriteria = kriteria.id_kriteria AND kriteria.tipe = 'c5'");
                                        $conn->close();
                                        foreach ($list_lapisan_olahan as $i => $v) { ?>
                                            <option value="<?= $v['id_crips'] ?>"><?= $v["nama"] ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="row d-flex justify-content-between">
                                <a href="alternatif.php" type="button" class="btn btn-outline-warning">Kembali</a>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
            </div>
            <!-- end card -->
        <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>