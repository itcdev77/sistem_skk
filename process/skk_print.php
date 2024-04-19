<?php
// session_start();
include('../config/conn.php');
include('../config/function.php');
?>

<html>

<head>
    <title>Print SKK</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    if (isset($_POST['print_user'])) {

        $id = $_POST['id_user'];



        // Perbaiki sintaks SQL dengan menggunakan tanda kutip yang benar
        $sau = "SELECT * FROM tbl_skk WHERE iduser = '$id' ORDER BY iduser DESC";

        $qua = mysqli_query($con, $sau);

        while ($user_data = mysqli_fetch_array($qua)) {

            $f3 = $user_data['status'];
            // echo "<tr style=background-color:" . $status_colors[$f3] . ">";
            echo "<td>" . $user_data['iduser'] . "</td>";
            echo "<td>" . $user_data['nama_pengemudi'] . "</td>";
            echo "<td>" . $user_data['tggl_berangkat'] . "</td>";


            echo "</tr>";
        }
    }

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
                            <td colspan=2></td>
                            <td>
                                <p style="text-align:right">(di isi oleh IT)</p>
                            </td>
                        </tr>
                        <tr style="height: 10mm;">
                            <td>Diminta Oleh</td>
                            <td></td>
                            <td>Departement / Unit </td>
                            <td></td>
                        </tr>
                        <tr style="height: 10mm;">
                            <td>Jabatan</td>
                            <td></td>
                            <td>Tgl permohonan</td>
                            <td></td>
                        </tr>
                        <tr style="height: 15mm;">
                            <td>Permintaan perangkat <br>IT untuk</td>
                            <td>
                                <table>
                                    <tr>
                                        <td>
                                            <div class="box">
                                                <!-- <p style="margin: 2mm;">
                                                        <?php if ($kondisi == "Permintaan Baru") {
                                                            echo '√';
                                                        } ?></p> -->
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
                                                <!-- <p style="margin: 2mm;"><?php if ($kondisi == "Penggantian") {
                                                                                    echo '√';
                                                                                } ?>
                                                    </p> -->
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
                                                <!-- <p style="margin: 2mm;">
                                                        <?php if ($kondisi == "Aplikasi/Lisensi") {
                                                            echo '√';
                                                        } ?></p> -->
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
                                                <!-- <p style="margin: 2mm;"><?php if ($remark == "New Order") {
                                                                                    echo '√';
                                                                                } ?></p> -->
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
                                                <!-- <p style="margin: 2mm;">
                                                        <?php if ($remark == "Existing/Stock") {
                                                            echo '√';
                                                        } ?></p> -->
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
                                                <!-- <p style="margin: 2mm;"><?php if ($remark == "Lain-lain") {
                                                                                    echo '√';
                                                                                } ?></p> -->
                                            </div>
                                        </td>
                                        <td>Lain-Lain</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>Penjelasan (Perangkat) :<br>
                                <p></p>
                                <br><br><br><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=4>
                                Benefit-Kelebihan ( value edit ) terhadap perusahaan :<br>
                                <p><b></b></p>
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

                            <!-- <?php if ($status == "Open") { ?>
                                <td><br><img height=60mm src="../core/ttd/.png"><br><br><br></td>
                            <?php } ?>


                            <?php if ($status == "Review(IT)") { ?>
                                <td><br><img height=60mm src="../core/ttd/.png"><br><br><br></td>
                                <td><img height=60mm src="../core/ttd/.png"> </td>
                            <?php } ?>

                            <?php if ($status == "On Progress") { ?>
                                <td><br><img height=60mm src="../core/ttd/.png"><br><br><br></td>
                                <td><img height=60mm src="../core/ttd/.png"> </td>
                                <td><img height=60mm src="../core/ttd/Jimmy Ishak PL.png"> </td>
                            <?php } ?>

                            <?php if ($status == "Setuju") { ?>
                                <td><br><img height=60mm src="../core/ttd/.png"><br><br><br></td>
                                <td><img height=60mm src="../core/ttd/.png"> </td>
                                <td><img height=60mm src="../core/ttd/Jimmy Ishak PL.png"> </td>
                                <td><img height=60mm src="../core/ttd/Lukas Hendry.png"> </td>
                            <?php } ?> -->


                        </tr>
                        <tr>
                            <td>()</td>
                            <td>() </td>
                            <td>(Jimmy Ishak PL) </td>
                            <td>(Lukas Hendri)</td>
                        </tr>
                        <tr>
                            <td>Admin</td>
                            <td></td>
                            <td>IT Supervisor</td>
                            <td>Head of IT</td>
                        </tr>
                    </table>

                </center>
            </td>
        </tr>
    </table>



    <!-- <p>test page</p> -->


    <!-- -->
    <script>
        window.print();
    </script>






</body>

</html>