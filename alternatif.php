<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Alternatif");
?>


<body>
    <?php
    createNavbar();

    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="row">
                <h2 class="mb-4 text-capitalize">lahan alternatif</h2>
                <div class=" ml-auto d-flex mb-3 pt-1 pb-1" style="margin-right: 10%;">
                    <a href="tambah_alternatif.php" class="btn btn-warning">Tambah</a>
                </div>
            </div>

            <?php
            if (isset($_GET["status"])) {
                if ($_GET["status"] == "tambah") { ?>
                    <div id="alert" class="alert alert-success" role="alert">
                        Berhasil Menambah Data!
                    </div>
                <?php } else if ($_GET["status"] == "!tambah") { ?>
                    <div id="alert" class="alert alert-success" role="alert">
                        Gagal Menambah Data!
                    </div>
                <?php } else if ($_GET["status"] == "hapus") { ?>
                    <div id="alert" class="alert alert-success" role="alert">
                        Berhasil Menghapus Data!
                    </div>
                <?php } else if ($_GET["status"] == "!hapus") { ?>
                    <div id="alert" class="alert alert-success" role="alert">
                        Gagal Menghapus Data!
                    </div>
            <?php }
            }
            ?>

            <!-- start table -->
            <table class="table table-hover">
                <thead class="text-capitalize">
                    <th>no</th>
                    <th>nama pemilik</th>
                    <th>alamat</th>
                    <th>jenis tanah</th>
                    <th>suhu</th>
                    <th>ketersediaan air</th>
                    <th>PH tanah</th>
                    <th>lapisan olahan</th>
                    <th>aksi</th>
                </thead>
                <tbody>
                    <?php
                    include("db.php");
                    $get_list_kriteria = "SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c3, a.c4, a.c5 FROM alternatif a";
                    $list_kriteria = $conn->query($get_list_kriteria);

                    $get_crips = "SELECT nama FROM crips WHERE id_crips = ";

                    foreach ($list_kriteria as $i => $value) {
                        $c1 = $conn->query($get_crips . $value["c1"]);
                        $c1 = $c1->fetch_array();

                        $c2 = $conn->query($get_crips . $value["c2"]);
                        $c2 = $c2->fetch_array();

                        $c3 = $conn->query($get_crips . $value["c3"]);
                        $c3 = $c3->fetch_array();

                        $c4 = $conn->query($get_crips . $value["c4"]);
                        $c4 = $c4->fetch_array();

                        $c5 = $conn->query($get_crips . $value["c5"]);
                        $c5 = $c5->fetch_array();
                    ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $value["nama_pemilik"] ?></td>
                            <td><?= $value["alamat"] ?></td>
                            <td><?= $c1["nama"] ?></td>
                            <td><?= $c2["nama"] ?></td>
                            <td><?= $c3["nama"] ?></td>
                            <td><?= $c4["nama"] ?></td>
                            <td><?= $c5["nama"] ?></td>
                            <td>
                                <button type="button" class="btn btn-outline-success">Edit</button>
                                <a href="./hapus_alternatif.php?id=<?= $value["id_alternatif"] ?>" class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <!-- end table -->
        <?php };

    createSidebar($body); ?>
        <script>
            setTimeout(() => {
                document.getElementById("alert").remove()
            }, 1000 * 3)
        </script>
</body>

<?php
createFooter();
?>

</html>