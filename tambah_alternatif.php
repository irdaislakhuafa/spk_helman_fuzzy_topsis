<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Tambah Alternatif");
?>


<body>
    <?php
    createNavbar();
    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <!-- <h2 class="mb-4">Tambah Alternatif</h2> -->
            <div class="d-flex justify-content-center">
                <!-- start card -->
                <div class="card shadow rounded-5" style="width: 50rem;">
                    <div class="card-body">
                        <h5 class="card-title">Tambah Alternatif</h5>

                        <!-- start form -->
                        <form action="simpan_alternatif.php" method="post">
                            <!-- nama pemilik -->
                            <div class="mb-3 row">
                                <label for="nama_pemilik" class="col-sm-2 col-form-label text-capitalize">nama pemilik</label>
                                <div class="col-sm-10 btn-outline">
                                    <input name="nama_pemilik" type="text" class="form-control" id="nama_pemilik" required>
                                </div>
                            </div>

                            <!-- alamat -->
                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-2 col-form-label text-capitalize">alamat</label>
                                <div class="col-sm-10">
                                    <input name="alamat" type="text" class="form-control" id="alamat" rows="10" required> </input>
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

                            <!-- suhu -->
                            <div class="mb-3 row">
                                <label for="suhu" class="col-sm-2 col-form-label text-capitalize">suhu ℃</label>
                                <div class="col-sm-10">
                                    <input name="suhu" type="number" class="form-control" id="suhu" required> </input>
                                </div>
                            </div>


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

                            <!-- ph_tanah -->
                            <div class="mb-3 row">
                                <label for="ph_tanah" class="col-sm-2 col-form-label text-capitalize">PH Tanah</label>
                                <div class="col-sm-10">
                                    <input name="ph_tanah" type="text" class="form-control" id="ph_tanah" required> </input>
                                </div>
                            </div>

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