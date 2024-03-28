<?php
// session_start();
include('../config/conn.php');
include('../config/function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Form P2H (Pemeliharaan dan Pemeriksaan Harian)</title>
</head>

<body class="bg-light">
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Data p2h-Total-Station " . date("d-m-Y") . ".xls");
    ?>
    <?php
    // $s="select*from users where id='$_SESSION[iduser]'";
    // $qu= mysqli_query($con, $s);
    // $fe=mysqli_fetch_assoc($qu);
    //echo $fe['dep']; 
    // $sau="select*from greencard where dept_terkait='$fe[dep]' AND status='Open' OR dept_terkait='$fe[dep]' AND status='On Progress' ORDER BY `greencard`.`tanggal` DESC" ;            
    ?>

    <div class="container mt-5">
        <div class="row">
            <div>
                <h4>Laporan Kartu P2H Total Station Survey</h4>
                Sebuku Coal Group (Pemeliharaan dan Pemeriksaan Harian)
                <br>
                <table class="table table-bordered">
                    <tr style="background-color:#9DA0A8">
                        <th>id</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Lokasi Kerja</th>
                        <th>Nama Unit</th>
                        <th>No Seri Alat</th>
                        <th>Jadwal Kalibrasi</th>
                        <th>Note Atasan</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th>Box Alat</th>
                        <th>Internal Battery</th>
                        <th>Charger Battery</th>
                        <th>Extension</th>
                        <th>Vertikal</th>
                        <th>Horizontal</th>
                        <th>Obyektif</th>
                        <th>Okuler</th>
                        <th>Pengatur Fokus</th>
                        <th>Clamp Vert & Horiz</th>
                        <th>Penggerak Halus Vert & Horiz</th>
                        <th>Lensa</th>
                        <th>Pengatur Fokus FC</th>
                        <th>Nivo Tabung (Plate Level)</th>
                        <th>Nivo Bulat (Circular Level)</th>
                        <th>Sekrup ABC</th>
                        <th>Tombol - Tombol Keypad</th>
                        <th>Laser</th>
                        <th>Meteran Roll</th>
                        <th>Tripod (Statif)</th>
                        <th>Tribrach APS</th>
                        <th>Stick (Tongkat Pogo)</th>
                        <th>Prisma Topo</th>


                    </tr>
                    <?php
                    error_reporting(0);
                    // $tgl_awal = $_POST['tanggal_awal'];
                    // $tgl_akhir = $_POST['tanggal_akhir'];

                    // // $sau = "select*from total_station ORDER BY tggl DESC";
                    // $sau = "select*from total_station WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";

                    // kondisi untuk export all data total_station
                    if (isset($_POST['export_all'])) {

                        $sau = "SELECT * FROM total_station ORDER BY tggl DESC";
                    }

                    // kondisi untuk export data berdasarkan tanggal yang di pilih
                    if (isset($_POST['export'])) {

                        $tgl_awal = $_POST['tanggal_awal'];
                        $tgl_akhir = $_POST['tanggal_akhir'];
                        $sau = "SELECT * FROM total_station WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";
                    }

                    $qua = mysqli_query($con, $sau);

                    $status_colors = array('gagal' => '#F49C9C', 'NULL' => '#9CB5F4', 'approved' => '#C5EBAA');

                    while ($user_data = mysqli_fetch_array($qua)) {
                        $f3 = $user_data['status'];
                        echo "<tr style=background-color:" . $status_colors[$f3] . ">";
                        echo "<td>" . $user_data['idbarang'] . "</td>";
                        echo "<td>" . $user_data['nama'] . "</td>";
                        echo "<td>" . $user_data['tggl'] . "</td>";
                        echo "<td>" . $user_data['lokasi'] . "</td>";
                        echo "<td>" . $user_data['tipe_alat'] . "</td>";
                        echo "<td>" . $user_data['no_seri'] . "</td>";
                        echo "<td>" . $user_data['wkt_kalibrasi'] . "</td>";
                        echo "<td>" . $user_data['cttn_atasan'] . "</td>";
                        echo "<td>" . $user_data['status'] . "</td>";
                        echo "<td>" . $user_data['keterangan'] . "</td>";
                        echo "<td>" . $user_data['box_alat'] . "</td>";
                        echo "<td>" . $user_data['bt_internal'] . "</td>";
                        echo "<td>" . $user_data['bt_charger'] . "</td>";
                        echo "<td>" . $user_data['extension'] . "</td>";
                        echo "<td>" . $user_data['vertikal'] . "</td>";
                        echo "<td>" . $user_data['horizontal'] . "</td>";
                        echo "<td>" . $user_data['obyektif'] . "</td>";
                        echo "<td>" . $user_data['okuler'] . "</td>";
                        echo "<td>" . $user_data['pengatur_fokus'] . "</td>";
                        echo "<td>" . $user_data['clamp_vh'] . "</td>";
                        echo "<td>" . $user_data['penggerak_halus_vh'] . "</td>";
                        echo "<td>" . $user_data['lensa'] . "</td>";
                        echo "<td>" . $user_data['pengatur_fokus_sc'] . "</td>";
                        echo "<td>" . $user_data['nivo_tabung'] . "</td>";
                        echo "<td>" . $user_data['nivo_bulat'] . "</td>";
                        echo "<td>" . $user_data['sekrup_abc'] . "</td>";
                        echo "<td>" . $user_data['tombol_keypad'] . "</td>";
                        echo "<td>" . $user_data['laser'] . "</td>";
                        echo "<td>" . $user_data['materal_roll'] . "</td>";
                        echo "<td>" . $user_data['tripod_statif'] . "</td>";
                        echo "<td>" . $user_data['tribrach_aps'] . "</td>";
                        echo "<td>" . $user_data['stick'] . "</td>";
                        echo "<td>" . $user_data['prisma_topo'] . "</td>";

                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>