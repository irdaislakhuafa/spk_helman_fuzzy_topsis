<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Fuzzy");
?>


<body>
    <?php
    createNavbar();

    $body = function () { ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Fuzzy</h2>
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
                </thead>
                <tbody>
                    <?php
                    include("db.php");
                    $get_list_alternatif = "SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c3, a.c4, a.c5 FROM alternatif a";
                    $list_alternatif = $conn->query($get_list_alternatif);

                    $get_crips = "SELECT bobot FROM crips WHERE id_crips = ";

                    foreach ($list_alternatif as $i => $value) {
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
                            <td><?= $c1["bobot"] ?></td>
                            <td><?= $c2["bobot"] ?></td>
                            <td><?= $c3["bobot"] ?></td>
                            <td><?= $c4["bobot"] ?></td>
                            <td><?= $c5["bobot"] ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <!-- end table -->
        <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>