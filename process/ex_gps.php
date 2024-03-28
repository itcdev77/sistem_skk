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
    header("Content-Disposition: attachment; filename=Data p2h-gps-geodetic " . date("d-m-Y") . ".xls");
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
                <h4>Laporan Kartu P2H GPS Geodetic Survey</h4>
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

                        <th>Body Reciever</th>
                        <th>LED Jaringan</th>
                        <th>Radio Antena</th>
                        <th>Extension</th>
                        <th>Internal Battery</th>
                        <th>Charger Battery</th>
                        <th>Power</th>
                        <th>Port Battery</th>
                        <th>Tutup Port USB</th>
                        <th>USB</th>
                        <th>Battery Slot</th>
                        <th>Tutup Adapter</th>
                        <th>Tombol Adapter</th>
                        <th>Body Remote</th>
                        <th>Layar Display Remote</th>
                        <th>Internal Battery</th>
                        <th>Pen Remote</th>
                        <th>Tombol Keypad Remote</th>
                        <th>Software Controller</th>
                        <th>Sekrup Remote</th>
                        <th>Mikro USB</th>
                        <th>Port USB RC</th>
                        <th>Memory Card</th>
                        <th>Charger Internal Battery</th>
                        <th>Tribach</th>
                        <th>Sekrup ABC</th>
                        <th>Clamp / Pengunci</th>
                        <th>Adaptor</th>
                        <th>Nivo Bulat</th>
                        <th>Stick</th>




                    </tr>
                    <?php
                    error_reporting(0);
                    // $tgl_awal = $_POST['tanggal_awal'];
                    // $tgl_akhir = $_POST['tanggal_akhir'];

                    // // $sau = "select*from total_station ORDER BY tggl DESC";
                    // $sau = "select*from total_station WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";

                    // kondisi untuk export all data total_station
                    if (isset($_POST['export_all'])) {

                        $sau = "SELECT * FROM gps_geodetic ORDER BY tggl DESC";
                    }

                    // kondisi untuk export data berdasarkan tanggal yang di pilih
                    if (isset($_POST['export'])) {

                        $tgl_awal = $_POST['tanggal_awal'];
                        $tgl_akhir = $_POST['tanggal_akhir'];
                        $sau = "SELECT * FROM gps_geodetic WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";
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
                        echo "<td>" . $user_data['jadwal_kalibrasi'] . "</td>";
                        echo "<td>" . $user_data['cttn_atasan'] . "</td>";
                        echo "<td>" . $user_data['status'] . "</td>";
                        echo "<td>" . $user_data['keterangan'] . "</td>";

                        echo "<td>" . $user_data['b_reciever'] . "</td>";
                        echo "<td>" . $user_data['led_jaringan'] . "</td>";
                        echo "<td>" . $user_data['r_antena'] . "</td>";
                        echo "<td>" . $user_data['extension'] . "</td>";
                        echo "<td>" . $user_data['b_internal'] . "</td>";
                        echo "<td>" . $user_data['b_charger'] . "</td>";
                        echo "<td>" . $user_data['t_power'] . "</td>";
                        echo "<td>" . $user_data['t_port_battery'] . "</td>";
                        echo "<td>" . $user_data['t_port_usb'] . "</td>";
                        echo "<td>" . $user_data['usb'] . "</td>";
                        echo "<td>" . $user_data['b_slot'] . "</td>";
                        echo "<td>" . $user_data['ttp_adapter'] . "</td>";
                        echo "<td>" . $user_data['tmbl_adapter'] . "</td>";
                        echo "<td>" . $user_data['body_remote'] . "</td>";
                        echo "<td>" . $user_data['ld_remote'] . "</td>";
                        echo "<td>" . $user_data['rc_internal_battery'] . "</td>";
                        echo "<td>" . $user_data['pen_remote'] . "</td>";
                        echo "<td>" . $user_data['t_keypad_remote'] . "</td>";
                        echo "<td>" . $user_data['s_controller'] . "</td>";
                        echo "<td>" . $user_data['skrup_remote'] . "</td>";
                        echo "<td>" . $user_data['p_mikro_usb'] . "</td>";
                        echo "<td>" . $user_data['p_usb'] . "</td>";
                        echo "<td>" . $user_data['p_memory_card'] . "</td>";
                        echo "<td>" . $user_data['p_ci_battery'] . "</td>";
                        echo "<td>" . $user_data['tribach'] . "</td>";
                        echo "<td>" . $user_data['sekrup_abc'] . "</td>";
                        echo "<td>" . $user_data['clamp'] . "</td>";
                        echo "<td>" . $user_data['t_adaptor'] . "</td>";
                        echo "<td>" . $user_data['t_nivo_bulat'] . "</td>";
                        echo "<td>" . $user_data['stick'] . "</td>";


                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>