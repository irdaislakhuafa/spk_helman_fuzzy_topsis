<!DOCTYPE html>
<html lang="en">
<?php
include("basic.php");
createHeader("Topsis");
?>


<body>
    <?php
    createNavbar();

    $body = function () {
        include("db.php");
        $crips_global = [];
    ?>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <h2 class="mb-4">Topsis</h2>

            <!-- start nilai bobot -->
            <h3 class="mb-4 text-center text-capitalize">nilai bobot</h3>
            <table class="table table-hover shadow">
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
                    $get_list_alternatif = "SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c2_real, a.c3, a.c4, a.c4_real, a.c5 FROM alternatif a";
                    $list_alternatif = $conn->query($get_list_alternatif);

                    $get_crips = "SELECT bobot FROM crips WHERE id_crips = ";

                    foreach ($list_alternatif as $i => $value) {
                        $c1 = $conn->query($get_crips . $value["c1"]);
                        $c1 = $c1->fetch_array();

                        // $c2 = $conn->query($get_crips . $value["c2"]);
                        // $c2 = $c2->fetch_array();

                        $c3 = $conn->query($get_crips . $value["c3"]);
                        $c3 = $c3->fetch_array();

                        // $c4 = $conn->query($get_crips . $value["c4"]);
                        // $c4 = $c4->fetch_array();

                        $c5 = $conn->query($get_crips . $value["c5"]);
                        $c5 = $c5->fetch_array(); ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $value["nama_pemilik"] ?></td>
                            <td><?= $value["alamat"] ?></td>
                            <td><?= $c1["bobot"] ?></td>
                            <td><?= $value["c2"] ?></td>
                            <td><?= $c3["bobot"] ?></td>
                            <td><?= $value["c4"] ?></td>
                            <td><?= $c5["bobot"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end nilai bobot -->

            <!-- start pembagian -->
            <h3 class="mb-4 text-center text-capitalize">pembagian</h3>
            <table class="table table-hover shadow">
                <thead class="text-capitalize">
                    <th>c1</th>
                    <th>c2</th>
                    <th>c3</th>
                    <th>c4</th>
                    <th>c5</th>
                </thead>
                <tbody>
                    <?php


                    // TODO: get all alternatif from table alternatif and foreeach loop of this
                    $get_list_alternatif = "SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c2_real, a.c3, a.c4, a.c4_real, a.c5 FROM alternatif a";
                    $list_alternatif = $conn->query($get_list_alternatif);

                    $get_crips = "SELECT bobot FROM crips WHERE id_crips = ";

                    $result = [];

                    // C1
                    $c1 = 0.0;
                    foreach ($list_alternatif as $i => $v) {
                        $c1_temp = $conn->query($get_crips . $v["c1"])->fetch_assoc();
                        $c1 += pow(floatval($c1_temp["bobot"]), 2);
                    }

                    // C2
                    $c2 = 0.0;
                    foreach ($list_alternatif as $i => $v) {
                        $c2 += pow(floatval($v["c2"]), 2);
                    }

                    // C3
                    $c3 = 0.0;
                    foreach ($list_alternatif as $i => $v) {
                        $c3_temp = $conn->query($get_crips . $v["c3"])->fetch_assoc();
                        $c3 += pow(floatval($c3_temp["bobot"]), 2);
                    }

                    // C4
                    $c4 = 0.0;
                    foreach ($list_alternatif as $i => $v) {
                        $c4 += pow(floatval($v["c4"]), 2);
                    }

                    // C5
                    $c5 = 0.0;
                    foreach ($list_alternatif as $i => $v) {
                        $c5_temp = $conn->query($get_crips . $v["c5"])->fetch_assoc();
                        $c5 += pow(floatval($c5_temp["bobot"]), 2);
                    }

                    // set all crips to global variable
                    $crips_global = [
                        "c1" => $c1,
                        "c2" => $c2,
                        "c3" => $c3,
                        "c4" => $c4,
                        "c5" => $c5,
                    ];
                    ?>
                    <tr>
                        <td><?= $c1 ?></td>
                        <td><?= $c2 ?></td>
                        <td><?= $c3 ?></td>
                        <td><?= $c4 ?></td>
                        <td><?= $c5 ?></td>
                    </tr>
                </tbody>
            </table>
            <!-- start pembagian -->

            <!-- start matriks ternormalisasi -->
            <h3 class="mb-4 text-center text-capitalize">matriks ternormalisasi</h3>
            <table class="table table-hover shadow">
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
                    $get_list_alternatif = "SELECT a.id_alternatif, a.nama_pemilik, alamat, a.c1, a.c2, a.c2_real, a.c3, a.c4, a.c4_real, a.c5 FROM alternatif a";
                    $list_alternatif = $conn->query($get_list_alternatif);
                    $get_crips = "SELECT bobot FROM crips WHERE id_crips = ";

                    foreach ($list_alternatif as $i => $value) {
                        $c1 = $conn->query($get_crips . $value["c1"]);
                        $c1 = $c1->fetch_array();

                        // $c2 = $conn->query($get_crips . $value["c2"]);
                        // $c2 = $c2->fetch_array();

                        $c3 = $conn->query($get_crips . $value["c3"]);
                        $c3 = $c3->fetch_array();

                        // $c4 = $conn->query($get_crips . $value["c4"]);
                        // $c4 = $c4->fetch_array();

                        $c5 = $conn->query($get_crips . $value["c5"]);
                        $c5 = $c5->fetch_array(); ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $value["nama_pemilik"] ?></td>
                            <td><?= $value["alamat"] ?></td>
                            <td><?= ($crips_global["c1"] == 0 ? 0 : $c1["bobot"] / $crips_global["c1"]) ?></td>
                            <td><?= ($crips_global["c2"] == 0 ? 0 : $value["c2"] / $crips_global["c2"]) ?></td>
                            <td><?= ($crips_global["c3"] == 0 ? 0 : $c3["bobot"] / $crips_global["c3"]) ?></td>
                            <td><?= ($crips_global["c4"] == 0 ? 0 : $value["c4"] / $crips_global["c4"]) ?></td>
                            <td><?= ($crips_global["c5"] == 0 ? 0 : $c5["bobot"] / $crips_global["c5"]) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end matriks ternormalisasi -->
        <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>