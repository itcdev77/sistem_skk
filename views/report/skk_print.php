<?php hakAkses(['admin', 'user', 'GA', 'HOS', 'GARDA']);
?>

<?php
// include database connection file
include '../connect.php';
// Check if form is submitted for user update, then redirect to homepage after update
$id = $_GET['id'];
$s = "select*from user where id='$_SESSION[id]'";
$qu = mysqli_query($con, $s);
$fe = mysqli_fetch_assoc($qu);
// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM fit1 WHERE id=$id");
while ($user_data = mysqli_fetch_assoc($result)) {
    $nama_pelapor = $user_data['diminta'];
    $date = $user_data['tanggal'];
    $tgl = date_create($date);
    $tanggal = date_format($tgl, 'd-m-Y h:i a');
    $dept = $user_data['dept'];
    $lok_area = $user_data['jabatan'];
    $kondisi = $user_data['untuk'];
    $rekomendasi = $user_data['penjelasan'];
    $catatan = $user_data['benefit'];
    $status = $user_data['status'];
    $remark = $user_data['it_remark'];
    $nomor = $user_data['nomor'];
    $atasan = $user_data['atasan'];
    $jab_atasan = $user_data['jab_atasan'];
    $pembuat = $user_data['pembuat'];
}
?>
<html>

<head>
    <title>Form Permohonan Perangkat IT</title>
    <link rel="icon" type="image/x-icon" href="../core/favicon.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>



    <style>
        .box {
            width: 7mm;
            height: 7mm;
            border: 1px solid black;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php
    if (isset($_SESSION['id'])) {
    ?>

        <table>
            <tr>
                <td style="width: 210mm;">
                    <p style="text-align:right"> FIT-01<br>
                        Revisi</p>
                    <center>
                        <table>
                            <tr>
                                <td><img src="logo.png" width="100"></td>
                                <td>
                                    <center>
                                        <p style="font-size:30px;">SEBUKU COAL GROUP</p>
                                        IT Tools Registration Form
                                    </center>
                            </tr>
                        </table><br>
                        <table>
                            <tr>
                                <td style="width: 170mm;">
                                    <hr>
                                    <b>
                                        <center>FORMULIR PERMOHONAN PERANGKAT IT<center>
                                    </b>
                                    <hr>
                                </td>
                            </tr>
                        </table>
                        <table border=1 style="width: 170mm; border: 1px solid black; border-collapse: collapse;">
                            <tr style="height: 10mm;">
                                <td>
                                    Nomor Formulir</td>
                                <td colspan=2><?php echo $nomor; ?></td>
                                <td>
                                    <p style="text-align:right">(di isi oleh IT)</p>
                                </td>
                            </tr>
                            <tr style="height: 10mm;">
                                <td>Diminta Oleh</td>
                                <td><?php echo $nama_pelapor; ?></td>
                                <td>Departement / Unit </td>
                                <td><?php echo $dept; ?></td>
                            </tr>
                            <tr style="height: 10mm;">
                                <td>Jabatan</td>
                                <td><?php echo $lok_area; ?></td>
                                <td>Tgl permohonan</td>
                                <td><?php echo $tanggal; ?></td>
                            </tr>
                            <tr style="height: 15mm;">
                                <td>Permintaan perangkat <br>IT untuk</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;">
                                                        <?php if ($kondisi == "Permintaan Baru") {
                                                            echo '√';
                                                        } ?></p>
                                                </div>
                                            </td>
                                            <td>Permintaan Baru</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;"><?php if ($kondisi == "Penggantian") {
                                                                                echo '√';
                                                                            } ?>
                                                    </p>
                                                </div>
                                            </td>
                                            <td>Penggantian</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;">
                                                        <?php if ($kondisi == "Aplikasi/Lisensi") {
                                                            echo '√';
                                                        } ?></p>
                                                </div>
                                            </td>
                                            <td>Aplikasi/Lisensi</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr style="height: 15mm;">
                                <td>
                                    Bagian ini di isi oleh IT</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;"><?php if ($remark == "New Order") {
                                                                                echo '√';
                                                                            } ?></p>
                                                </div>
                                            </td>
                                            <td>New Order</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;">
                                                        <?php if ($remark == "Existing/Stock") {
                                                            echo '√';
                                                        } ?></p>
                                                </div>
                                            </td>
                                            <td>Existing/Stock</td>
                                        </tr>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="box">
                                                    <p style="margin: 2mm;"><?php if ($remark == "Lain-lain") {
                                                                                echo '√';
                                                                            } ?></p>
                                                </div>
                                            </td>
                                            <td>Lain-Lain</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4>Penjelasan (Perangkat) :<br>
                                    <p><?= $rekomendasi; ?></p>
                                    <br><br><br><br><br>
                                </td>
                            </tr>
                            <tr>
                                <td colspan=4>
                                    Benefit-Kelebihan ( value edit ) terhadap perusahaan :<br>
                                    <p><b><?php echo $catatan; ?></b></p>
                                    <br><br>
                                </td>
                            </tr>
                        </table>
                    </center>
                    <br><br><br>
                    <center>
                        <table style="width: 160mm;">
                            <tr>
                                <td>
                                    Pemohon </td>
                                <td>Mengetahui </td>
                                <td>Verifikasi </td>
                                <td>Menyetujui</td>
                            </tr>
                            <tr>

                                <?php if ($status == "Open") { ?>
                                    <td><br><img height=60mm src="../core/ttd/<?php echo $nama_pelapor; ?>.png"><br><br><br></td>
                                <?php } ?>


                                <?php if ($status == "Review(IT)") { ?>
                                    <td><br><img height=60mm src="../core/ttd/<?php echo $nama_pelapor; ?>.png"><br><br><br></td>
                                    <td><img height=60mm src="../core/ttd/<?php echo $atasan; ?>.png"> </td>
                                <?php } ?>

                                <?php if ($status == "On Progress") { ?>
                                    <td><br><img height=60mm src="../core/ttd/<?php echo $nama_pelapor; ?>.png"><br><br><br></td>
                                    <td><img height=60mm src="../core/ttd/<?php echo $atasan; ?>.png"> </td>
                                    <td><img height=60mm src="../core/ttd/Jimmy Ishak PL.png"> </td>
                                <?php } ?>

                                <?php if ($status == "Setuju") { ?>
                                    <td><br><img height=60mm src="../core/ttd/<?php echo $nama_pelapor; ?>.png"><br><br><br></td>
                                    <td><img height=60mm src="../core/ttd/<?php echo $atasan; ?>.png"> </td>
                                    <td><img height=60mm src="../core/ttd/Jimmy Ishak PL.png"> </td>
                                    <td><img height=60mm src="../core/ttd/Lukas Hendry.png"> </td>
                                <?php } ?>


                            </tr>
                            <tr>
                                <td>(<?php echo $nama_pelapor; ?>)</td>
                                <td>(<?php echo $atasan; ?>) </td>
                                <td>(Jimmy Ishak PL) </td>
                                <td>(Lukas Hendri)</td>
                            </tr>
                            <tr>
                                <td>Admin</td>
                                <td><?php echo $jab_atasan; ?></td>
                                <td>IT Supervisor</td>
                                <td>Head of IT</td>
                            </tr>
                        </table>

                    </center>
                </td>
            </tr>
        </table>
    <?php
    } else {
        $link = "http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
        header('Location: ../login.php?link=' . $link);
    }
    ?>

    <!-- -->
    <script>
        window.print();
    </script>






</body>

</html>