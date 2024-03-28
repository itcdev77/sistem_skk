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
    header("Content-Disposition: attachment; filename=Data p2h-drone-rtk " . date("d-m-Y") . ".xls");
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
                <h4>Laporan Kartu P2H Drone RTK Survey</h4>
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
                        <th>Note Atasan</th>
                        <th>Status</th>
                        <th>Keterangan</th>

                        <th>Antena</th>
                        <th>Penyanggan Ponsel</th>
                        <th>Tuas Kendali</th>
                        <th>Tuas Kanan</th>
                        <th>Tuas Kiri</th>
                        <th>Status LED & Daya Baterai</th>
                        <th>LED Rturn to Home (RTH)</th>
                        <th>Power</th>
                        <th>Rerutn to Home (RTH) </th>
                        <th>Prekam Vidio</th>
                        <th>Shutter/Pengambil Foto</th>
                        <th>Mode Penerbangan</th>
                        <th>Penghenti Mode Terbang</th>
                        <th>Pengaturan Kamera</th>
                        <th>Pengaturan Kemiringan</th>
                        <th>Mikro USB</th>
                        <th>USB</th>
                        <th>Pengisi Daya</th>
                        <th>Body Pesawat</th>
                        <th>Penyangga Pesawat</th>
                        <th>Internal Battery</th>
                        <th>Tombol Power</th>
                        <th>LED Battery Indicator</th>
                        <th>Mesin Props</th>
                        <th>Pengait Props</th>
                        <th>Sekrup/Baut Props</th>
                        <th>Per Baling - Baling</th>
                        <th>Baling - Baling (Propeller)</th>
                        <th>Gimbal</th>
                        <th>Kabel Gimbal</th>
                        <th>Lensa</th>
                        <th>Pelindung Kamera</th>
                        <th>Mikro USB</th>
                        <th>Memory Card</th>
                        <th>Charger Internal Battery</th>
                        <th>Layar Display</th>
                        <th>Charger Tab</th>
                        <th>Program Aplikasi DJI GO</th>
                        <th>Internal Battery</th>
                        <th>Tripod</th>
                        <th>Tribach APS</th>
                        <th>Charger Battry</th>



                    </tr>
                    <?php
                    error_reporting(0);
                    // $tgl_awal = $_POST['tanggal_awal'];
                    // $tgl_akhir = $_POST['tanggal_akhir'];

                    // // $sau = "select*from total_station ORDER BY tggl DESC";
                    // $sau = "select*from total_station WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";

                    // kondisi untuk export all data total_station
                    if (isset($_POST['export_all'])) {

                        $sau = "SELECT * FROM drone_rtk ORDER BY tggl DESC";
                    }

                    // kondisi untuk export data berdasarkan tanggal yang di pilih
                    if (isset($_POST['export'])) {

                        $tgl_awal = $_POST['tanggal_awal'];
                        $tgl_akhir = $_POST['tanggal_akhir'];
                        $sau = "SELECT * FROM drone_rtk WHERE tggl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tggl DESC";
                    }

                    $qua = mysqli_query($con, $sau);

                    $status_colors = array('gagal' => '#F49C9C', 'NULL' => '#9CB5F4', 'approved' => '#C5EBAA');

                    while ($user_data = mysqli_fetch_array($qua)) {
                        $f3 = $user_data['status'];
                        echo "<tr style=background-color:" . $status_colors[$f3] . ">";
                        echo "<td>" . $user_data['idbarang'] . "</td>";
                        echo "<td>" . $user_data['nama'] . "</td>";
                        echo "<td>" . $user_data['tggl'] . "</td>";
                        echo "<td>" . $user_data['lokasi_kerja'] . "</td>";
                        echo "<td>" . $user_data['nama_drone'] . "</td>";
                        echo "<td>" . $user_data['sn_alat'] . "</td>";
                        echo "<td>" . $user_data['cttn_atasan'] . "</td>";
                        echo "<td>" . $user_data['status'] . "</td>";
                        echo "<td>" . $user_data['keterangan'] . "</td>";

                        echo "<td>" . $user_data['rc_antena'] . "</td>";
                        echo "<td>" . $user_data['rc_penyangga_ponsel'] . "</td>";
                        echo "<td>" . $user_data['tk_tuas_kendali'] . "</td>";
                        echo "<td>" . $user_data['tk_tuas_kanan'] . "</td>";
                        echo "<td>" . $user_data['tk_tuas_kiri'] . "</td>";
                        echo "<td>" . $user_data['stts_led_daya_bt'] . "</td>";
                        echo "<td>" . $user_data['led_rth'] . "</td>";
                        echo "<td>" . $user_data['t_power'] . "</td>";
                        echo "<td>" . $user_data['t_rth'] . "</td>";
                        echo "<td>" . $user_data['perekam_vidio'] . "</td>";
                        echo "<td>" . $user_data['t_shutter'] . "</td>";
                        echo "<td>" . $user_data['t_mode_terbang'] . "</td>";
                        echo "<td>" . $user_data['t_stop_mt'] . "</td>";
                        echo "<td>" . $user_data['pengaturan_kamera'] . "</td>";
                        echo "<td>" . $user_data['p_kemiringan'] . "</td>";
                        echo "<td>" . $user_data['port_mikro_usb'] . "</td>";
                        echo "<td>" . $user_data['p_usb'] . "</td>";
                        echo "<td>" . $user_data['pengisi_daya'] . "</td>";
                        echo "<td>" . $user_data['body_pesawat'] . "</td>";
                        echo "<td>" . $user_data['penyangga_pesawat'] . "</td>";
                        echo "<td>" . $user_data['pesawat_ib'] . "</td>";
                        echo "<td>" . $user_data['pesawat_tp'] . "</td>";
                        echo "<td>" . $user_data['pesawat_led_bt_indicator'] . "</td>";
                        echo "<td>" . $user_data['mesin_props'] . "</td>";
                        echo "<td>" . $user_data['pengait_props'] . "</td>";
                        echo "<td>" . $user_data['sekrup_props'] . "</td>";
                        echo "<td>" . $user_data['per_baling2'] . "</td>";
                        echo "<td>" . $user_data['balling2'] . "</td>";
                        echo "<td>" . $user_data['gimbal'] . "</td>";
                        echo "<td>" . $user_data['kabel_gimbal'] . "</td>";
                        echo "<td>" . $user_data['lensa'] . "</td>";
                        echo "<td>" . $user_data['pelingdung_kam'] . "</td>";
                        echo "<td>" . $user_data['mikro_usb_pesawat'] . "</td>";
                        echo "<td>" . $user_data['memory_card_pesawat'] . "</td>";
                        echo "<td>" . $user_data['ci_battery_pesawat'] . "</td>";
                        echo "<td>" . $user_data['layar_display'] . "</td>";
                        echo "<td>" . $user_data['charger_tab'] . "</td>";
                        echo "<td>" . $user_data['dji_go'] . "</td>";
                        echo "<td>" . $user_data['ib_reciever'] . "</td>";
                        echo "<td>" . $user_data['reciever_tripod'] . "</td>";
                        echo "<td>" . $user_data['reviever_tribach'] . "</td>";
                        echo "<td>" . $user_data['reviever_cb'] . "</td>";


                        echo "</tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>