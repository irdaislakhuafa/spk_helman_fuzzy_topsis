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
        $global_crips_distribution = [];
        $global_nilai_terbobot = [];
        $global_calculation_parameters = [];
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
                    // get all alternatif from table alternatif and foreeach loop of this
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
                    $global_crips_distribution = [
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
                            <td><?= ($global_crips_distribution["c1"] == 0 ? 0 : $c1["bobot"] / $global_crips_distribution["c1"]) ?></td>
                            <td><?= ($global_crips_distribution["c2"] == 0 ? 0 : $value["c2"] / $global_crips_distribution["c2"]) ?></td>
                            <td><?= ($global_crips_distribution["c3"] == 0 ? 0 : $c3["bobot"] / $global_crips_distribution["c3"]) ?></td>
                            <td><?= ($global_crips_distribution["c4"] == 0 ? 0 : $value["c4"] / $global_crips_distribution["c4"]) ?></td>
                            <td><?= ($global_crips_distribution["c5"] == 0 ? 0 : $c5["bobot"] / $global_crips_distribution["c5"]) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end matriks ternormalisasi -->

            <!-- start nilai terbobot -->
            <h3 class="mb-4 text-center text-capitalize">nilai terbobot</h3>
            <table class="table table-hover shadow">
                <thead class="text-capitalize">
                    <?php
                    $list_nilai_terbobot = $conn->query("SELECT tipe, nilai FROM nilai_terbobot ORDER BY id_nilai_terbobot ASC");
                    foreach ($list_nilai_terbobot as $v) { ?>
                        <th><?= $v["tipe"] ?></th>
                    <?php }
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($list_nilai_terbobot as $v) { ?>
                            <td><?= $v["nilai"] ?></td>
                        <?php }

                        // set global variable of nilai_terbobot
                        foreach ($list_nilai_terbobot as $v) {
                            $global_nilai_terbobot[$v["tipe"]] = $v["nilai"];
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
            <!-- end nilai terbobot -->

            <!-- start bahan perhitungan -->
            <h3 class="mb-4 text-center text-capitalize">Bahan Perhitungan</h3>
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
                        $c5 = $c5->fetch_array();

                        $parameter = [
                            "c1" => ($global_crips_distribution["c1"] == 0 ? 0 : ($global_nilai_terbobot["c1"] * ($c1["bobot"] / $global_crips_distribution["c1"]))),
                            "c2" => ($global_crips_distribution["c2"] == 0 ? 0 : ($global_nilai_terbobot["c2"] * ($value["c2"] / $global_crips_distribution["c2"]))),
                            "c3" => ($global_crips_distribution["c3"] == 0 ? 0 : ($global_nilai_terbobot["c3"] * ($c3["bobot"] / $global_crips_distribution["c3"]))),
                            "c4" => ($global_crips_distribution["c4"] == 0 ? 0 : ($global_nilai_terbobot["c4"] * ($value["c4"] / $global_crips_distribution["c4"]))),
                            "c5" => ($global_crips_distribution["c5"] == 0 ? 0 : ($global_nilai_terbobot["c5"] * ($c5["bobot"] / $global_crips_distribution["c5"]))),
                        ];

                        array_push($global_calculation_parameters, $parameter);

                    ?>
                        <tr>
                            <td><?= ($i + 1) ?></td>
                            <td><?= $value["nama_pemilik"] ?></td>
                            <td><?= $value["alamat"] ?></td>
                            <td><?= $parameter["c1"] ?></td>
                            <td><?= $parameter["c2"] ?></td>
                            <td><?= $parameter["c3"] ?></td>
                            <td><?= $parameter["c4"] ?></td>
                            <td><?= $parameter["c5"] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <!-- end bahan perhitungan -->

            <!-- start solusi ideal positif dan negatif -->
            <h3 class="mb-4 text-center text-capitalize">solusi ideal positif dan negatif</h3>
            <table class="table table-hover shadow">
                <thead class="text-capitalize">
                    <?php
                    $list_nilai_terbobot = $conn->query("SELECT tipe, nilai FROM nilai_terbobot ORDER BY id_nilai_terbobot ASC");
                    foreach ($list_nilai_terbobot as $v) { ?>
                        <th><?= $v["tipe"] ?></th>
                    <?php }

                    $benefit_cost = [
                        "c1" => "benefit",
                        "c2" => "cost",
                        "c3" => "benefit",
                        "c4" => "benefit",
                        "c5" => "benefit",
                    ];
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($benefit_cost as $v) { ?>
                            <td><?= $v ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <!-- end solusi ideal positif dan negatif -->


            <!-- start solusi ideal positif -->
            <h3 class="mb-4 text-center text-capitalize">solusi ideal positif A+ </h3>
            <table class="table table-hover shadow">
                <thead class="text-capitalize">
                    <?php
                    $list_nilai_terbobot = $conn->query("SELECT tipe, nilai FROM nilai_terbobot ORDER BY id_nilai_terbobot ASC");
                    foreach ($list_nilai_terbobot as $v) { ?>
                        <th><?= $v["tipe"] ?></th>
                    <?php }

                    $benefit_cost = [
                        "c1" => "benefit",
                        "c2" => "cost",
                        "c3" => "benefit",
                        "c4" => "benefit",
                        "c5" => "benefit",
                    ];

                    $result_max_min = [];
                    foreach ($benefit_cost as $c => $v) {
                        if ($v == "benefit") {
                            $max = 0.0;
                            foreach ($global_calculation_parameters as $gcp) {
                                if ($gcp[$c] > $max) {
                                    $max = $gcp[$c];
                                }
                            }
                            $result_max_min[$c] = $max;
                        } else if ($v == "cost") {
                            $min = PHP_FLOAT_MAX;
                            foreach ($global_calculation_parameters as $gcp) {
                                if ($gcp[$c] < $min) {
                                    $min = $gcp[$c];
                                }
                            }
                            $result_max_min[$c] = $min;
                        }
                    }
                    ?>
                </thead>
                <tbody>
                    <tr>
                        <?php foreach ($result_max_min as $v) { ?>
                            <td><?= $v ?></td>
                        <?php } ?>
                    </tr>
                </tbody>
            </table>
            <!-- end solusi ideal positif dan negatif -->
        <?php };

    createSidebar($body); ?>
</body>

<?php
createFooter();
?>

</html>