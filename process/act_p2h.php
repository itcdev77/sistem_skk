<?php

session_start();
include('../config/conn.php');
include('../config/function.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require_once "library/PHPMailer.php";
require_once "library/Exception.php";
require_once "library/OAuth.php";
require_once "library/POP3.php";
require_once "library/SMTP.php";


//Untuk kirim data form TOTAL STATION kedalam database

if (isset($_POST['input_total_station'])) {

    // $b = $fe['name'];

    // $d = $fe['dep'];

    $c = $_POST['nama'];

    $e = $_POST['tanggal'];

    $f = $_POST['lokasi_kerja'];

    $g = $_POST['pilih_total_station'];

    $h = $_POST['no_seri'];

    $i = $_POST['j_kalibrasi'];



    $b1 = $_POST['box_alat'];

    $ket1 = $_POST['ket1'];

    $a1 = $b1 . $ket1;



    $b2 = $_POST['internal_battery'];

    $ket2 = $_POST['ket2'];

    $a2 = $b2 . $ket2;



    $b3 = $_POST['charger_battery'];

    $ket3 = $_POST['ket3'];

    $a3 = $b3 . $ket3;
    
    //anomali..
    $b3b = $_POST['extension'];

    $ket3B = $_POST['ket3B'];

    $a3b = $b3b . $ket3b;



    $b4 = $_POST['sumbuh_vertikal'];

    $ket4 = $_POST['ket4'];

    $a4 = $b4 . $ket4;



    $b5 = $_POST['sumbuh_horizontal'];

    $ket5 = $_POST['ket5'];

    $a5 = $b5 . $ket5;



    $b6 = $_POST['lensa_obyektif'];

    $ket6 = $_POST['ket6'];

    $a6 = $b6 . $ket6;



    $b7 = $_POST['lensa_okuler'];

    $ket7 = $_POST['ket7'];

    $a7 = $b7 . $ket7;



    $b8 = $_POST['p_fokus'];

    $ket8 = $_POST['ket8'];

    $a8 = $b8 . $ket8;



    $b9 = $_POST['c_v&h'];

    $ket9 = $_POST['ket9'];

    $a9 = $b9 . $ket9;



    $b10 = $_POST['ph_v&h'];

    $ket10 = $_POST['ket10'];

    $a10 = $b10 . $ket10;



    $b11 = $_POST['sc_lensa'];

    $ket11 = $_POST['ket11'];

    $a11 = $b11 . $ket11;



    $b12 = $_POST['sc_pf'];

    $ket12 = $_POST['ket12'];

    $a12 = $b12 . $ket12;



    $b13 = $_POST['nt_pl'];

    $ket13 = $_POST['ket13'];

    $a13 = $b13 . $ket13;



    $b14 = $_POST['nb_cl'];

    $ket14 = $_POST['ket14'];

    $a14 = $b14 . $ket14;



    $b15 = $_POST['s_abc'];

    $ket15 = $_POST['ket15'];

    $a15 = $b15 . $ket15;



    $b16 = $_POST['t_keypad'];

    $ket16 = $_POST['ket16'];

    $a16 = $b16 . $ket16;



    $b17 = $_POST['laser'];

    $ket17 = $_POST['ket17'];

    $a17 = $b17 . $ket17;



    $b18 = $_POST['m_roll'];

    $ket18 = $_POST['ket18'];

    $a18 = $b18 . $ket18;



    $b19 = $_POST['t_statif'];

    $ket19 = $_POST['ket19'];

    $a19 = $b19 . $ket19;



    $b20 = $_POST['t_aps'];

    $ket20 = $_POST['ket20'];

    $a20 = $b20 . $ket20;



    $b21 = $_POST['stick_pogo'];

    $ket21 = $_POST['ket21'];

    $a21 = $b21 . $ket21;



    $b22 = $_POST['prisma_topo'];

    $ket22 = $_POST['ket22'];

    $a22 = $b22 . $ket22;


    $j = $_POST['catatan'];

    // $insert = mysqli_query($con, "INSERT INTO total_station (nama,tggl,lokasi,tipe_alat,no_seri,wkt_kalibrasi,
    
    // box_alat,bt_internal,bt_charger,extension,vertikal,horizontal,obyektif,okuler,pengatur_fokus,clamp_vh,penggerak_halus_vh,lensa,pengatur_fokus_sc,nivo_tabung,nivo_bulat,sekrup_abc,tombol_keypad,laser,materal_roll,tripod_statif,tribrach_aps,stick,prisma_topo,keterangan) VALUES ('$c','$e','$f','$g','$h','$i','$a1','$a2','$a3','$a3b','$a4','$a5','$a6' ,'$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15'

    // ,'$a16','$a17','$a18','$a19','$a20','$a21','$a22','$j')") or die(mysqli_error($con));

    // if ($insert) {
    //     $success = 'Berhasil menambahkan data barang';
    // } else {
    //     $error = 'Gagal menambahkan data barang';
    // }

    // Mengecek apakah data sudah ada di database
    
    $sql_check = "SELECT * FROM total_station WHERE nama = '$c' AND tggl = '$e' AND lokasi = '$f' AND tipe_alat = '$g' AND no_seri = '$h'";
    $result_check = $con->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Data sudah ada, tidak perlu dimasukkan lagi
        echo "Data sudah ada di database.";
    } else {
        // Data belum ada, lakukan operasi insert
        $sql_insert = "INSERT INTO total_station (nama,tggl,lokasi,tipe_alat,no_seri,wkt_kalibrasi,box_alat,bt_internal,bt_charger,extension,vertikal,horizontal,obyektif,okuler,pengatur_fokus,clamp_vh,penggerak_halus_vh,lensa,pengatur_fokus_sc,nivo_tabung,nivo_bulat,sekrup_abc,tombol_keypad,laser,materal_roll,tripod_statif,tribrach_aps,stick,prisma_topo,keterangan) 
        VALUES ('$c','$e','$f','$g','$h','$i','$a1','$a2','$a3','$a3b','$a4','$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$j')";

        if ($con->query($sql_insert) === TRUE) {
            echo "Data berhasil dimasukkan.";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $con->error;
        }
    }

    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;

    $mail = new PHPMailer;



    //Enable SMTP debugging. 

    $mail->SMTPDebug = 3;

    //Set PHPMailer to use SMTP.

    $mail->isSMTP();

    //Set SMTP host name                          

    $mail->Host = "smtp.gmail.com"; //host mail server


    $mail->SMTPAuth = true;

    //Provide username and password     
    $mail->Username = "sebuku.itc@gmail.com";   //nama-email smtp          


    //$mail->Password = "vifeifksikzqnitf";           //password email smtp
    $mail->Password = "crclkejjaqlpwjyk";           //password email smtp

    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 

    $mail->Port = 465;
    //$mail->Port = 26;                                                    



    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (P2H-Total Station SURVEY)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Laporan P2H Unit Total Station"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama</b></td><td>:</td><td>$c</td>
    
    </tr>
    
    <tr>
    
        <td><b>Tanggal</b></td><td>:</td><td>$e</td>
    
    </tr>
    
    <tr>
    
        <td><b>Lokasi Kerja</b></td><td>:</td><td>$f</td>
    
    </tr>
    
    <tr>
    
        <td><b>Total Station</b></td><td>:</td><td>$g</td>
    
    </tr>
    
    <tr>
    
        <td><b>No Seri</b></td><td>:</td><td>$h</td>
    
    </tr>
    
    <tr>
    
        <td><b>Jadwal Kalibrasi</b></td><td>:</td><td>$i</td>
    
    </tr>
    
    <tr> 
    
        <td><b>Status</b></td><td>:</td>
    
        <td>
    
            Menunggu Persetujuan
    
        </td>
    
    </tr>
    
    </table>
    
    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Kondisi Alat :</font></u></h4></td>
    
    </tr>
    
    <table>
    
    <tr><td><h4>TOTAL STATION</h4></td></tr>
    
    <tr><td><b>1. Box Alat</b></td><td>:</td><td>$a1</td></tr>

    <tr><td><h4>BATTERY : </h4></td></tr>
    
    <tr><td><b>2. Internal Battery</b></td><td>:</td><td>$a2</td></tr>
    
    <tr><td><b>3. Charger Battery</b></td><td>:</td><td>$a3</td></tr>

    <tr><td><h4>SUMBUH PUTAR : </h4></td></tr>
    
    <tr><td><b>4. Vertikal</b></td><td>:</td><td>$a4</td></tr>
    
    <tr><td><b>5. Horizontal</b></td><td>:</td><td>$a5</td></tr>

    <tr><td><h4>LENSA : </h4></td></tr>
    
    <tr><td><b>6. Obyektif</b></td><td>:</td><td>$a6</td></tr>
    
    <tr><td><b>7. Okuler</b></td><td>:</td><td>$a7</td></tr>

    <tr><td><h4>------- </h4></td></tr>
    
    <tr><td><b>8. Pengatur Fokus</b></td><td>:</td><td>$a8</td></tr>
    
    <tr><td><b>9. Clamp Vert & Horiz</b></td><td>:</td><td>$a9</td></tr>
    
    <tr><td><b>10. Penggerak Halus Vert & Horiz</b></td><td>:</td><td>$a10</td></tr>

    <tr><td><h4>SISTEM CENTERING : </h4></td></tr>
    
    <tr><td><b>11. Lensa</b></td><td>:</td><td>$a11</td></tr>
    
    <tr><td><b>12. Pengatur Fokus</b></td><td>:</td><td>$a12</td></tr>

    <tr><td><h4>SISTEM LEVELLING : </h4></td></tr>
    
    <tr><td><b>13. Nivo Tabung(Plate Level)</b></td><td>:</td><td>$a13</td></tr>
    
    <tr><td><b>14. Nivo Bulat(Circular Level)</b></td><td>:</td><td>$a14</td></tr>

    <tr><td><h4>------- </h4></td></tr>
    
    <tr><td><b>15. Sekrup ABC</b></td><td>:</td><td>$a15</td></tr>
    
    <tr><td><b>16. Tombol Keypad</b></td><td>:</td><td>$a16</td></tr>
    
    <tr><td><b>17. Laser</b></td><td>:</td><td>$a17</td></tr>
    
    <tr><td><b>18. Meteran Roll</b></td><td>:</td><td>$a18</td></tr>

    <tr><td><h4>------- </h4></td></tr>
    
    <tr><td><b><h4>19. Tripod(Statif)</h4></b></td><td>:</td><td>$a19</td></tr>
    
    <tr><td><b><h4>20. Tibrach APS</b></h4></td><td>:</td><td>$a20</td></tr>
    
    <tr><td><b><h4>21. Stick(Tongkat Pogo)</h4></b></td><td>:</td><td>$a21</td></tr>
    
    <tr><td><b><h4>22. Prisma Topo</h4></b></td><td>:</td><td>$a22</td></tr>
    
    </table>  <br>
    
<br><br>

            Note : Mohon dapat segera melakukan Approval mengenai laporan p2h total station tsb. <br>

            URL Aplikasi : http://employee.sebukucoalgroup.com/p2h/p2hreport.php

            <br>
            <br>-------------------------------------<br>
            Perhatian :<br>
            Email ini dihasilkan secara otomatis oleh sistem dan bersifat informasi,<br>
            dimohon untuk tidak membalas email ini.<br>


            <br>Terima kasih.<br>

            <br>

            Best Regards,<br>

            System IT Employee (P2H)



    ";

    $mail->Body    = $Body; //isi email

    $mail->IsHTML(true);

    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
    } else {
    }

    // }
    header("Location:../?r_total_station");
}
// }



// -----------------------------------


// Action untuk input data GPS Geodetic
if (isset($_POST['input_gps'])) {

    // $b = $fe['name'];

    // $d = $fe['dep'];

    $c = $_POST['nama'];

    $e = $_POST['tanggal'];

    $f = $_POST['lokasi_kerja'];

    $g = $_POST['pilih_gps'];

    $h = $_POST['no_seri'];

    $i = $_POST['j_kalibrasi'];



    $b1 = $_POST['b_reciever'];

    $ket1 = $_POST['ket1'];

    $a1 = $b1 . $ket1;



    $b2 = $_POST['led_jaringan'];

    $ket2 = $_POST['ket2'];

    $a2 = $b2 . $ket2;



    $b3 = $_POST['r_antena'];

    $ket3 = $_POST['ket3'];

    $a3 = $b3 . $ket3;



    $b4 = $_POST['extension'];

    $ket4 = $_POST['ket4'];

    $a4 = $b4 . $ket4;



    $b5 = $_POST['i_battery'];

    $ket5 = $_POST['ket5'];

    $a5 = $b5 . $ket5;



    $b6 = $_POST['c_battery'];

    $ket6 = $_POST['ket6'];

    $a6 = $b6 . $ket6;



    $b7 = $_POST['t_power'];

    $ket7 = $_POST['ket7'];

    $a7 = $b7 . $ket7;



    $b8 = $_POST['p_battery'];

    $ket8 = $_POST['ket8'];

    $a8 = $b8 . $ket8;



    $b9 = $_POST['t_port_usb'];

    $ket9 = $_POST['ket9'];

    $a9 = $b9 . $ket9;



    $b10 = $_POST['p_usb'];

    $ket10 = $_POST['ket10'];

    $a10 = $b10 . $ket10;



    $b11 = $_POST['b_slot'];

    $ket11 = $_POST['ket11'];

    $a11 = $b11 . $ket11;



    $b12 = $_POST['t_adapter'];

    $ket12 = $_POST['ket12'];

    $a12 = $b12 . $ket12;



    $b13 = $_POST['tmbl_adapter'];

    $ket13 = $_POST['ket13'];

    $a13 = $b13 . $ket13;



    $b14 = $_POST['b_remote'];

    $ket14 = $_POST['ket14'];

    $a14 = $b14 . $ket14;



    $b15 = $_POST['ld_remote'];

    $ket15 = $_POST['ket15'];

    $a15 = $b15 . $ket15;



    $b16 = $_POST['rc_ib'];

    $ket16 = $_POST['ket16'];

    $a16 = $b16 . $ket16;



    $b17 = $_POST['pen_remote'];

    $ket17 = $_POST['ket17'];

    $a17 = $b17 . $ket17;



    $b18 = $_POST['tk_remote'];

    $ket18 = $_POST['ket18'];

    $a18 = $b18 . $ket18;



    $b19 = $_POST['sf_controller'];

    $ket19 = $_POST['ket19'];

    $a19 = $b19 . $ket19;



    $b20 = $_POST['skrp_remote'];

    $ket20 = $_POST['ket20'];

    $a20 = $b20 . $ket20;



    $b21 = $_POST['rc_mikro_usb'];

    $ket21 = $_POST['ket21'];

    $a21 = $b21 . $ket21;



    $b22 = $_POST['rc_usb'];

    $ket22 = $_POST['ket22'];

    $a22 = $b22 . $ket22;


    $b23 = $_POST['rc_memory_card'];
    $ket23 = $_POST['ket23'];
    $a23 = $b23 . $ket23;

    $b24 = $_POST['rc_charger'];
    $ket24 = $_POST['ket24'];
    $a24 = $b24 . $ket24;

    $b25 = $_POST['tribach'];
    $ket25 = $_POST['ket25'];
    $a25 = $b25 . $ket25;

    $b26 = $_POST['sekrup_abc'];
    $ket26 = $_POST['ket26'];
    $a26 = $b26 . $ket26;

    $b27 = $_POST['clamp_pengunci'];
    $ket27 = $_POST['ket27'];
    $a27 = $b27 . $ket27;

    $b28 = $_POST['tribach_adptor'];
    $ket28 = $_POST['ket28'];
    $a28 = $b28 . $ket28;

    $b29 = $_POST['tb_nv_bulat'];
    $ket29 = $_POST['ket29'];
    $a29 = $b29 . $ket29;

    $b30 = $_POST['stick'];
    $ket30 = $_POST['ket30'];
    $a30 = $b30 . $ket30;

    $j = $_POST['catatan'];

    $insert = mysqli_query($con, "INSERT INTO gps_geodetic (nama,tggl,lokasi,tipe_alat,no_seri,jadwal_kalibrasi,
    
    b_reciever,led_jaringan,r_antena,extension,b_internal,b_charger,t_power,t_port_battery,
    t_port_usb,usb,b_slot,ttp_adapter,tmbl_adapter,body_remote,ld_remote,rc_internal_battery,pen_remote,t_keypad_remote,s_controller,skrup_remote,p_mikro_usb,p_usb,p_memory_card,p_ci_battery,tribach,sekrup_abc,
    clamp,t_adaptor,t_nivo_bulat,stick,keterangan) VALUES ('$c','$e','$f','$g','$h','$i','$a1','$a2','$a3','$a4','$a5','$a6' ,'$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15'

    ,'$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23', '$a24', '$a25', '$a26', '$a27', '$a28', '$a29', '$a30', '$j')") or die(mysqli_error($con));

    if ($insert) {
        $success = 'Berhasil menambahkan data barang';
    } else {
        $error = 'Gagal menambahkan data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;

    $mail = new PHPMailer;



    //Enable SMTP debugging. 

    $mail->SMTPDebug = 3;

    //Set PHPMailer to use SMTP.

    $mail->isSMTP();

    //Set SMTP host name                          

    $mail->Host = "smtp.gmail.com"; //host mail server


    $mail->SMTPAuth = true;

    //Provide username and password     
    $mail->Username = "sebuku.itc@gmail.com";   //nama-email smtp          


    //$mail->Password = "vifeifksikzqnitf";           //password email smtp
    $mail->Password = "crclkejjaqlpwjyk";           //password email smtp

    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 

    $mail->Port = 465;
    //$mail->Port = 26;                                                    



    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (P2H-GPS Geodetic SURVEY)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Laporan P2H Unit GPS Geodetic"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama</b></td><td>:</td><td>$c</td>
    
    </tr>
    
    <tr>
    
        <td><b>Tanggal</b></td><td>:</td><td>$e</td>
    
    </tr>
    
    <tr>
    
        <td><b>Lokasi Kerja</b></td><td>:</td><td>$f</td>
    
    </tr>
    
    <tr>
    
        <td><b>GPS Geodetic</b></td><td>:</td><td>$g</td>
    
    </tr>
    
    <tr>
    
        <td><b>No Seri</b></td><td>:</td><td>$h</td>
    
    </tr>
    
    <tr>
    
        <td><b>Jadwal Kalibrasi</b></td><td>:</td><td>$i</td>
    
    </tr>
    
    <tr> 
    
        <td><b>Status</b></td><td>:</td>
    
        <td>
    
            Menunggu Persetujuan
    
        </td>
    
    </tr>
    
    </table>
    
    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Kondisi Alat :</font></u></h4></td>
    
    </tr>
    
    <table>
    
    <tr><td><h2>Reciever GR5</h2></td></tr>
    
    <tr><td><b>1. Body Reciever</b></td><td>:</td><td>$a1</td></tr>
    
    <tr><td><b>2. LED Jaringan</b></td><td>:</td><td>$a2</td></tr>
    
    <tr><td><b>3. Radio Antena</b></td><td>:</td><td>$a3</td></tr>
    
    <tr><td><b>4. Extension</b></td><td>:</td><td>$a4</td></tr>
    
    <tr><td><b>5. Internal Battery</b></td><td>:</td><td>$a5</td></tr>
    
    <tr><td><b>6. Charger Battery</b></td><td>:</td><td>$a6</td></tr>
    
    <tr><td><h4>Tombol </h4></td></tr>
    
    <tr><td><b>7. Power</b></td><td>:</td><td>$a7</td></tr>
 
    <tr><td><b>8. Port Battery</b></td><td>:</td><td>$a8</td></tr>
    
    <tr><td><h4>Port </h4></td></tr>
    
    <tr><td><b>9. Tutup Port USB</b></td><td>:</td><td>$a9</td></tr>
    
    <tr><td><b>10. USB</b></td><td>:</td><td>$a10</td></tr>
    
    <tr><td><b>11. Battery Slot</b></td><td>:</td><td>$a11</td></tr>
    
    <tr><td><h4>Quick Release Adapter </h4></td></tr>
    
    <tr><td><b>12. Tutup Adapter</b></td><td>:</td><td>$a12</td></tr>
    
    <tr><td><b>13. Tombol Adapter</b></td><td>:</td><td>$a13</td></tr>

    <tr><td><h2>Remote Controller</h2></td></tr>
    
    <tr><td><b>14. Body Remote</b></td><td>:</td><td>$a14</td></tr>
    
    <tr><td><b>15. Layar Display Remote</b></td><td>:</td><td>$a15</td></tr>
    
    <tr><td><b>16. Internal Battery</b></td><td>:</td><td>$a16</td></tr>
    
    <tr><td><b>17. Pen Remote</b></td><td>:</td><td>$a17</td></tr>
    
    <tr><td><b>18. Tombol Keypad Remote</b></td><td>:</td><td>$a18</td></tr>
    
    <tr><td><b><h4>19. Software Controller</h4></b></td><td>:</td><td>$a19</td></tr>
    
    <tr><td><b><h4>20. Sekrup Remote</b></h4></td><td>:</td><td>$a20</td></tr>
    
    <tr><td><h4>Port </h4></td></tr>

    <tr><td><b><h4>21. Mikro USB</h4></b></td><td>:</td><td>$a21</td></tr>
    
    <tr><td><b><h4>22. USB</h4></b></td><td>:</td><td>$a22</td></tr>
    
    <tr><td><b><h4>23. Memory Card</h4></b></td><td>:</td><td>$a23</td></tr>
   
    <tr><td><b><h4>24. Charger Internal Battery</h4></b></td><td>:</td><td>$a24</td></tr>

    <tr><td><h2>Tribach</h2></td></tr>
    
    <tr><td><b><h4>25. Tribach</h4></b></td><td>:</td><td>$a25</td></tr>
    
    <tr><td><b><h4>26. Sekrup ABC</h4></b></td><td>:</td><td>$a26</td></tr>
    
    <tr><td><b><h4>27. Clamp/Pengunci</h4></b></td><td>:</td><td>$a27</td></tr>
    
    <tr><td><b><h4>28. Adaptor</h4></b></td><td>:</td><td>$a28</td></tr>
    
    <tr><td><b><h4>29. Nivo Bulat</h4></b></td><td>:</td><td>$a29</td></tr>
    
    <tr><td><b><h3>30. Stick</h3></b></td><td>:</td><td>$a30</td></tr>
    
    </table>  <br>
    
<br><br>

            Note : Mohon dapat segera melakukan Approval mengenai laporan p2h total station tsb. <br>

            URL Aplikasi : http://employee.sebukucoalgroup.com/p2h/p2hreport.php

            <br>
            <br>-------------------------------------<br>
            Perhatian :<br>
            Email ini dihasilkan secara otomatis oleh sistem dan bersifat informasi,<br>
            dimohon untuk tidak membalas email ini.<br>


            <br>Terima kasih.<br>

            <br>

            Best Regards,<br>

            System IT Employee (P2H)



    ";

    $mail->Body    = $Body; //isi email

    $mail->IsHTML(true);

    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
    } else {
    }

    // }
    header("Location:../?r_gps");
}
// }



// Action untuk input data Drone
if (isset($_POST['input_drone'])) {

    // $b = $fe['name'];

    // $d = $fe['dep'];

    $c = $_POST['nama'];

    $e = $_POST['tanggal'];

    $f = $_POST['lokasi_kerja'];

    $g = $_POST['pilih_drone'];

    $h = $_POST['no_seri'];


    $b1 = $_POST['antena_drone'];

    $ket1 = $_POST['ket1'];

    $a1 = $b1 . $ket1;



    $b2 = $_POST['penyangga_ponsel'];

    $ket2 = $_POST['ket2'];

    $a2 = $b2 . $ket2;



    $b3 = $_POST['tuas_kendali'];

    $ket3 = $_POST['ket3'];

    $a3 = $b3 . $ket3;



    $b4 = $_POST['tuas_kanan'];

    $ket4 = $_POST['ket4'];

    $a4 = $b4 . $ket4;



    $b5 = $_POST['tuas_kiri'];

    $ket5 = $_POST['ket5'];

    $a5 = $b5 . $ket5;



    $b6 = $_POST['stts_led'];

    $ket6 = $_POST['ket6'];

    $a6 = $b6 . $ket6;



    $b7 = $_POST['led_rth'];

    $ket7 = $_POST['ket7'];

    $a7 = $b7 . $ket7;



    $b8 = $_POST['t_power'];

    $ket8 = $_POST['ket8'];

    $a8 = $b8 . $ket8;



    $b9 = $_POST['t_rth'];

    $ket9 = $_POST['ket9'];

    $a9 = $b9 . $ket9;



    $b10 = $_POST['t_perekan_vidio'];

    $ket10 = $_POST['ket10'];

    $a10 = $b10 . $ket10;



    $b11 = $_POST['shutter'];

    $ket11 = $_POST['ket11'];

    $a11 = $b11 . $ket11;



    $b12 = $_POST['m_penerbangan'];

    $ket12 = $_POST['ket12'];

    $a12 = $b12 . $ket12;



    $b13 = $_POST['pmt'];

    $ket13 = $_POST['ket13'];

    $a13 = $b13 . $ket13;



    $b14 = $_POST['p_kamera'];

    $ket14 = $_POST['ket14'];

    $a14 = $b14 . $ket14;



    $b15 = $_POST['p_kemiringan'];

    $ket15 = $_POST['ket15'];

    $a15 = $b15 . $ket15;



    $b16 = $_POST['mikro_usb'];

    $ket16 = $_POST['ket16'];

    $a16 = $b16 . $ket16;



    $b17 = $_POST['p_usb'];

    $ket17 = $_POST['ket17'];

    $a17 = $b17 . $ket17;



    $b18 = $_POST['pengisi_daya'];

    $ket18 = $_POST['ket18'];

    $a18 = $b18 . $ket18;



    $b19 = $_POST['b_pesawat'];

    $ket19 = $_POST['ket19'];

    $a19 = $b19 . $ket19;



    $b20 = $_POST['penyangga_p'];

    $ket20 = $_POST['ket20'];

    $a20 = $b20 . $ket20;



    $b21 = $_POST['ib_pesawat'];

    $ket21 = $_POST['ket21'];

    $a21 = $b21 . $ket21;



    $b22 = $_POST['tp_pesawat'];

    $ket22 = $_POST['ket22'];

    $a22 = $b22 . $ket22;


    $b23 = $_POST['battry_indicator'];
    $ket23 = $_POST['ket23'];
    $a23 = $b23 . $ket23;

    $b24 = $_POST['mesin_props'];
    $ket24 = $_POST['ket24'];
    $a24 = $b24 . $ket24;

    $b25 = $_POST['Pengait_props'];
    $ket25 = $_POST['ket25'];
    $a25 = $b25 . $ket25;

    $b26 = $_POST['sekrup_props'];
    $ket26 = $_POST['ket26'];
    $a26 = $b26 . $ket26;

    $b27 = $_POST['per_baling_baling'];
    $ket27 = $_POST['ket27'];
    $a27 = $b27 . $ket27;

    $b28 = $_POST['baling_baling'];
    $ket28 = $_POST['ket28'];
    $a28 = $b28 . $ket28;

    $b29 = $_POST['gimbal'];
    $ket29 = $_POST['ket29'];
    $a29 = $b29 . $ket29;

    $b30 = $_POST['kbl_gimbal'];
    $ket30 = $_POST['ket30'];
    $a30 = $b30 . $ket30;

    $b31 = $_POST['k_lensa'];
    $ket31 = $_POST['ket31'];
    $a31 = $b31 . $ket31;

    $b32 = $_POST['pld_kamera'];
    $ket32 = $_POST['ket32'];
    $a32 = $b32 . $ket32;

    $b33 = $_POST['mikro_usb_pesawat'];
    $ket33 = $_POST['ket33'];
    $a33 = $b33 . $ket33;

    $b34 = $_POST['memory_pesawat'];
    $ket34 = $_POST['ket34'];
    $a34 = $b34 . $ket34;

    $b35 = $_POST['charger_pesawat'];
    $ket35 = $_POST['ket35'];
    $a35 = $b35 . $ket35;

    $b36 = $_POST['layar_display'];
    $ket36 = $_POST['ket36'];
    $a36 = $b36 . $ket36;

    $b37 = $_POST['charger_tab'];
    $ket37 = $_POST['ket37'];
    $a37 = $b37 . $ket37;

    $b38 = $_POST['dji_go'];
    $ket38 = $_POST['ket38'];
    $a38 = $b38 . $ket38;



    $j = $_POST['catatan'];

    $insert = mysqli_query($con, "INSERT INTO drone (nama,tggl,lokasi_kerja,nama_drone,sn_alat,
    
    rc_antena,rc_penyangga_ponsel,tk_tuas_kendali,tk_tuas_kanan,tk_tuas_kiri,stts_led_daya_bt,led_rth,t_power,t_rth,perekam_vidio,t_shutter,t_mode_terbang,t_stop_mt,pengaturan_kamera,p_kemiringan,port_mikro_usb,p_usb,pengisi_daya,body_pesawat,penyangga_pesawat,pesawat_ib,pesawat_tp,pesawat_led_bt_indicator,mesin_props,pengait_props,sekrup_props,per_baling2,balling2,gimbal,kabel_gimbal,lensa,pelingdung_kam,mikro_usb_pesawat,memory_card_pesawat,ci_battery_pesawat,layar_display,charger_tab,dji_go,keterangan) VALUES ('$c','$e','$f','$g','$h','$a1','$a2','$a3','$a4','$a5','$a6' ,'$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15'

    ,'$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23', '$a24', '$a25', '$a26', '$a27', '$a28', '$a29', '$a30','$a31','$a32', '$a33','$a34','$a35','$a36','$a37','$a38', '$j')") or die(mysqli_error($con));

    if ($insert) {
        $success = 'Berhasil menambahkan data barang';
    } else {
        $error = 'Gagal menambahkan data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;

    $mail = new PHPMailer;



    //Enable SMTP debugging. 

    $mail->SMTPDebug = 3;

    //Set PHPMailer to use SMTP.

    $mail->isSMTP();

    //Set SMTP host name                          

    $mail->Host = "smtp.gmail.com"; //host mail server


    $mail->SMTPAuth = true;

    //Provide username and password     
    $mail->Username = "sebuku.itc@gmail.com";   //nama-email smtp          


    //$mail->Password = "vifeifksikzqnitf";           //password email smtp
    $mail->Password = "crclkejjaqlpwjyk";           //password email smtp

    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 

    $mail->Port = 465;
    //$mail->Port = 26;                                                    



    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (P2H-Drone SURVEY)"; //nama pengirim

    //email penerima
    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Laporan P2H Unit Drone"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama</b></td><td>:</td><td>$c</td>
    
    </tr>
    
    <tr>
    
        <td><b>Tanggal</b></td><td>:</td><td>$e</td>
    
    </tr>
    
    <tr>
    
        <td><b>Lokasi Kerja</b></td><td>:</td><td>$f</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Drone</b></td><td>:</td><td>$g</td>
    
    </tr>
    
    <tr>
    
        <td><b>No Seri</b></td><td>:</td><td>$h</td>
    
    </tr>
    
    <tr> 
    
        <td><b>Status</b></td><td>:</td>
    
        <td>
    
            Menunggu Persetujuan
    
        </td>
    
    </tr>
    
    </table>
    
    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Kondisi Alat :</font></u></h4></td>
    
    </tr>
    
    <table>
    
    <tr><td><h2>Remote Control</h2></td></tr>
    
    <tr><td><b>1. Antena</b></td><td>:</td><td>$a1</td></tr>
    
    <tr><td><b>2. Penyanggan Ponsel</b></td><td>:</td><td>$a2</td></tr>

    <tr><td><h4>Tuas Kendali: </h4></td></tr>
    
    <tr><td><b>3. Tuas Kendali</b></td><td>:</td><td>$a3</td></tr>
    
    <tr><td><b>4. Tuas Kanan</b></td><td>:</td><td>$a4</td></tr>
    
    <tr><td><b>5. Tuas Kiri</b></td><td>:</td><td>$a5</td></tr>

    <tr><td><h4>LED: </h4></td></tr>
    
    <tr><td><b>6. Status LED & Daya Baterai</b></td><td>:</td><td>$a6</td></tr>
    
    <tr><td><b>7. LED Rturn to Home (RTH)</b></td><td>:</td><td>$a7</td></tr>
 
    <tr><td><h4>Tombol: </h4></td></tr>
 
    <tr><td><b>8. Power</b></td><td>:</td><td>$a8</td></tr>
    
    <tr><td><b>9. Rerutn to Home (RTH)</b></td><td>:</td><td>$a9</td></tr>
    
    <tr><td><b>10. Prekam Vidio</b></td><td>:</td><td>$a10</td></tr>
    
    <tr><td><b>11. Shutter/Pengambil Foto</b></td><td>:</td><td>$a11</td></tr>
    
    <tr><td><b>12. Mode Penerbangan</b></td><td>:</td><td>$a12</td></tr>
    
    <tr><td><b>13. Penghenti Mode Terbang</b></td><td>:</td><td>$a13</td></tr>
    
    <tr><td><b>14. Pengaturan Kamera</b></td><td>:</td><td>$a14</td></tr>
    
    <tr><td><b>15. Pengaturan Kemiringan</b></td><td>:</td><td>$a15</td></tr>
    
    <tr><td><h4>Port: </h4></td></tr>
    
    <tr><td><b>16. Mikro USB</b></td><td>:</td><td>$a16</td></tr>
    
    <tr><td><b>17. USB</b></td><td>:</td><td>$a17</td></tr>
    
    <tr><td><b>18. Pengisi Daya</b></td><td>:</td><td>$a18</td></tr>
    
    <tr><td><h2>Pesawat</h2></td></tr>
    
    <tr><td><b><h4>19. Body Pesawat</h4></b></td><td>:</td><td>$a19</td></tr>
    
    <tr><td><b><h4>20. Penyangga Pesawat</b></h4></td><td>:</td><td>$a20</td></tr>

    <tr><td><b><h4>21. Internal Battery</h4></b></td><td>:</td><td>$a21</td></tr>
    
    <tr><td><b><h4>22. Tombol Power</h4></b></td><td>:</td><td>$a22</td></tr>
    
    <tr><td><b><h4>23. LED Battery Indicator</h4></b></td><td>:</td><td>$a23</td></tr>

    <tr><td><h4>Baling - Baling (Propeller):</h4></td></tr>
   
    <tr><td><b><h4>24. Mesin Props</h4></b></td><td>:</td><td>$a24</td></tr>
    
    <tr><td><b><h4>25. Pengait Props</h4></b></td><td>:</td><td>$a25</td></tr>
    
    <tr><td><b><h4>26. Sekrup/Baut Props</h4></b></td><td>:</td><td>$a26</td></tr>
    
    <tr><td><b><h4>27. Per Baling - Baling</h4></b></td><td>:</td><td>$a27</td></tr>
    
    <tr><td><b><h4>28. Baling - Baling (Propeller)</h4></b></td><td>:</td><td>$a28</td></tr>

    <tr><td><h4>-------</h4></td></tr>
    
    <tr><td><b><h4>29. Gimbal</h4></b></td><td>:</td><td>$a29</td></tr>
    
    <tr><td><b><h3>30. Kabel Gimbal</h3></b></td><td>:</td><td>$a30</td></tr>
   
    <tr><td><h4>Kamera:</h4></td></tr>
   
    <tr><td><b><h3>31. Mikro USB</h3></b></td><td>:</td><td>$a31</td></tr>
    
    <tr><td><b><h3>32. Memory Card</h3></b></td><td>:</td><td>$a32</td></tr>

    <tr><td><h4>Port:</h4></td></tr>

    <tr><td><b><h3>33. Mikro USB</h3></b></td><td>:</td><td>$a33</td></tr>
    
    <tr><td><b><h3>34. Memory Card</h3></b></td><td>:</td><td>$a34</td></tr>

    <tr><td><h4>-------</h4></td></tr>

    <tr><td><b><h3>35. Charger Internal Battery</h3></b></td><td>:</td><td>$a35</td></tr>

    <tr><td><h2>Tab / Layar</h2></td></tr>

    <tr><td><b><h3>36. Layar Display</h3></b></td><td>:</td><td>$a36</td></tr>
    
    <tr><td><b><h3>37. Charger Tab</h3></b></td><td>:</td><td>$a37</td></tr>
   
    <tr><td><b><h3>38. Program Aplikasi DJI GO</h3></b></td><td>:</td><td>$a38</td></tr>


    
    </table>  <br>
    
<br><br>

            Note : Mohon dapat segera melakukan Approval mengenai laporan p2h drone tsb. <br>

            URL Aplikasi : http://employee.sebukucoalgroup.com/p2h/p2hreport.php

            <br>
            <br>-------------------------------------<br>
            Perhatian :<br>
            Email ini dihasilkan secara otomatis oleh sistem dan bersifat informasi,<br>
            dimohon untuk tidak membalas email ini.<br>


            <br>Terima kasih.<br>

            <br>

            Best Regards,<br>

            System IT Employee (P2H)



    ";

    $mail->Body    = $Body; //isi email

    $mail->IsHTML(true);

    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
    } else {
    }

    // }
    header("Location:../?r_drone");
}
// }






// Action untuk input data Drone RTK.....
if (isset($_POST['input_drone_rtk'])) {

    // $b = $fe['name'];

    // $d = $fe['dep'];

    $c = $_POST['nama'];

    $e = $_POST['tanggal'];

    $f = $_POST['lokasi_kerja'];

    $g = $_POST['pilih_drone'];

    $h = $_POST['no_seri'];


    $b1 = $_POST['antena_drone'];

    $ket1 = $_POST['ket1'];

    $a1 = $b1 . $ket1;



    $b2 = $_POST['penyangga_ponsel'];

    $ket2 = $_POST['ket2'];

    $a2 = $b2 . $ket2;



    $b3 = $_POST['tuas_kendali'];

    $ket3 = $_POST['ket3'];

    $a3 = $b3 . $ket3;



    $b4 = $_POST['tuas_kanan'];

    $ket4 = $_POST['ket4'];

    $a4 = $b4 . $ket4;



    $b5 = $_POST['tuas_kiri'];

    $ket5 = $_POST['ket5'];

    $a5 = $b5 . $ket5;



    $b6 = $_POST['stts_led'];

    $ket6 = $_POST['ket6'];

    $a6 = $b6 . $ket6;



    $b7 = $_POST['led_rth'];

    $ket7 = $_POST['ket7'];

    $a7 = $b7 . $ket7;



    $b8 = $_POST['t_power'];

    $ket8 = $_POST['ket8'];

    $a8 = $b8 . $ket8;



    $b9 = $_POST['t_rth'];

    $ket9 = $_POST['ket9'];

    $a9 = $b9 . $ket9;



    $b10 = $_POST['t_perekan_vidio'];

    $ket10 = $_POST['ket10'];

    $a10 = $b10 . $ket10;



    $b11 = $_POST['shutter'];

    $ket11 = $_POST['ket11'];

    $a11 = $b11 . $ket11;



    $b12 = $_POST['m_penerbangan'];

    $ket12 = $_POST['ket12'];

    $a12 = $b12 . $ket12;



    $b13 = $_POST['pmt'];

    $ket13 = $_POST['ket13'];

    $a13 = $b13 . $ket13;



    $b14 = $_POST['p_kamera'];

    $ket14 = $_POST['ket14'];

    $a14 = $b14 . $ket14;



    $b15 = $_POST['p_kemiringan'];

    $ket15 = $_POST['ket15'];

    $a15 = $b15 . $ket15;



    $b16 = $_POST['mikro_usb'];

    $ket16 = $_POST['ket16'];

    $a16 = $b16 . $ket16;



    $b17 = $_POST['p_usb'];

    $ket17 = $_POST['ket17'];

    $a17 = $b17 . $ket17;



    $b18 = $_POST['pengisi_daya'];

    $ket18 = $_POST['ket18'];

    $a18 = $b18 . $ket18;



    $b19 = $_POST['b_pesawat'];

    $ket19 = $_POST['ket19'];

    $a19 = $b19 . $ket19;



    $b20 = $_POST['penyangga_p'];

    $ket20 = $_POST['ket20'];

    $a20 = $b20 . $ket20;



    $b21 = $_POST['ib_pesawat'];

    $ket21 = $_POST['ket21'];

    $a21 = $b21 . $ket21;



    $b22 = $_POST['tp_pesawat'];

    $ket22 = $_POST['ket22'];

    $a22 = $b22 . $ket22;


    $b23 = $_POST['battry_indicator'];
    $ket23 = $_POST['ket23'];
    $a23 = $b23 . $ket23;

    $b24 = $_POST['mesin_props'];
    $ket24 = $_POST['ket24'];
    $a24 = $b24 . $ket24;

    $b25 = $_POST['Pengait_props'];
    $ket25 = $_POST['ket25'];
    $a25 = $b25 . $ket25;

    $b26 = $_POST['sekrup_props'];
    $ket26 = $_POST['ket26'];
    $a26 = $b26 . $ket26;

    $b27 = $_POST['per_baling_baling'];
    $ket27 = $_POST['ket27'];
    $a27 = $b27 . $ket27;

    $b28 = $_POST['baling_baling'];
    $ket28 = $_POST['ket28'];
    $a28 = $b28 . $ket28;

    $b29 = $_POST['gimbal'];
    $ket29 = $_POST['ket29'];
    $a29 = $b29 . $ket29;

    $b30 = $_POST['kbl_gimbal'];
    $ket30 = $_POST['ket30'];
    $a30 = $b30 . $ket30;

    $b31 = $_POST['k_lensa'];
    $ket31 = $_POST['ket31'];
    $a31 = $b31 . $ket31;

    $b32 = $_POST['pld_kamera'];
    $ket32 = $_POST['ket32'];
    $a32 = $b32 . $ket32;

    $b33 = $_POST['mikro_usb_pesawat'];
    $ket33 = $_POST['ket33'];
    $a33 = $b33 . $ket33;

    $b34 = $_POST['memory_pesawat'];
    $ket34 = $_POST['ket34'];
    $a34 = $b34 . $ket34;

    $b35 = $_POST['charger_pesawat'];
    $ket35 = $_POST['ket35'];
    $a35 = $b35 . $ket35;

    $b36 = $_POST['layar_display'];
    $ket36 = $_POST['ket36'];
    $a36 = $b36 . $ket36;

    $b37 = $_POST['charger_tab'];
    $ket37 = $_POST['ket37'];
    $a37 = $b37 . $ket37;

    $b38 = $_POST['dji_go'];
    $ket38 = $_POST['ket38'];
    $a38 = $b38 . $ket38;

    $b39 = $_POST['ib_reciever'];
    $ket39 = $_POST['ket39'];
    $a39 = $b39 . $ket39;

    $b40 = $_POST['reciever_tripod'];
    $ket40 = $_POST['ket40'];
    $a40 = $b40 . $ket40;

    $b41 = $_POST['reviever_tribach'];
    $ket41 = $_POST['ket41'];
    $a41 = $b41 . $ket41;

    $b42 = $_POST['reviever_cb'];
    $ket42 = $_POST['ket42'];
    $a42 = $b42 . $ket42;

    $j = $_POST['catatan'];

    //harus perbaiki database dulu sebelum input variable..
    $insert = mysqli_query($con, "INSERT INTO drone_rtk (nama,tggl,lokasi_kerja,nama_drone,sn_alat,
    
    rc_antena,rc_penyangga_ponsel,tk_tuas_kendali,tk_tuas_kanan,tk_tuas_kiri,stts_led_daya_bt,led_rth,t_power,t_rth,perekam_vidio,t_shutter,t_mode_terbang,t_stop_mt,pengaturan_kamera,p_kemiringan,port_mikro_usb,p_usb,pengisi_daya,body_pesawat,penyangga_pesawat,pesawat_ib,pesawat_tp,pesawat_led_bt_indicator,mesin_props,pengait_props,sekrup_props,per_baling2,balling2,gimbal,kabel_gimbal,lensa,pelingdung_kam,mikro_usb_pesawat,memory_card_pesawat,ci_battery_pesawat,layar_display,charger_tab,dji_go,ib_reciever,reciever_tripod,reviever_tribach,reviever_cb,keterangan) VALUES ('$c','$e','$f','$g','$h','$a1','$a2','$a3','$a4','$a5','$a6' ,'$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15'

    ,'$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23', '$a24', '$a25', '$a26', '$a27', '$a28', '$a29', '$a30','$a31','$a32', '$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40','$a41','$a42', '$j')") or die(mysqli_error($con));

    if ($insert) {
        $success = 'Berhasil menambahkan data barang';
    } else {
        $error = 'Gagal menambahkan data barang';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;

    $mail = new PHPMailer;



    //Enable SMTP debugging. 

    $mail->SMTPDebug = 3;

    //Set PHPMailer to use SMTP.

    $mail->isSMTP();

    //Set SMTP host name                          

    $mail->Host = "smtp.gmail.com"; //host mail server


    $mail->SMTPAuth = true;

    //Provide username and password     
    $mail->Username = "sebuku.itc@gmail.com";   //nama-email smtp          


    //$mail->Password = "vifeifksikzqnitf";           //password email smtp
    $mail->Password = "crclkejjaqlpwjyk";           //password email smtp

    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 

    $mail->Port = 465;
    //$mail->Port = 26;                                                    



    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (P2H-Drone SURVEY)"; //nama pengirim

    //email penerima
    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Laporan P2H Unit Drone RTK"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama</b></td><td>:</td><td>$c</td>
    
    </tr>
    
    <tr>
    
        <td><b>Tanggal</b></td><td>:</td><td>$e</td>
    
    </tr>
    
    <tr>
    
        <td><b>Lokasi Kerja</b></td><td>:</td><td>$f</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Drone</b></td><td>:</td><td>$g</td>
    
    </tr>
    
    <tr>
    
        <td><b>No Seri</b></td><td>:</td><td>$h</td>
    
    </tr>
    
    <tr> 
    
        <td><b>Status</b></td><td>:</td>
    
        <td>
    
            Menunggu Persetujuan
    
        </td>
    
    </tr>
    
    </table>
    
    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Kondisi Alat :</font></u></h4></td>
    
    </tr>
    
    <table>
    
    <tr><td><h2>Remote Control</h2></td></tr>
    
    <tr><td><b>1. Antena</b></td><td>:</td><td>$a1</td></tr>
    
    <tr><td><b>2. Penyanggan Ponsel</b></td><td>:</td><td>$a2</td></tr>

    <tr><td><h4>Tuas Kendali: </h4></td></tr>
    
    <tr><td><b>3. Tuas Kendali</b></td><td>:</td><td>$a3</td></tr>
    
    <tr><td><b>4. Tuas Kanan</b></td><td>:</td><td>$a4</td></tr>
    
    <tr><td><b>5. Tuas Kiri</b></td><td>:</td><td>$a5</td></tr>

    <tr><td><h4>LED: </h4></td></tr>
    
    <tr><td><b>6. Status LED & Daya Baterai</b></td><td>:</td><td>$a6</td></tr>
    
    <tr><td><b>7. LED Rturn to Home (RTH)</b></td><td>:</td><td>$a7</td></tr>
 
    <tr><td><h4>Tombol: </h4></td></tr>
 
    <tr><td><b>8. Power</b></td><td>:</td><td>$a8</td></tr>
    
    <tr><td><b>9. Rerutn to Home (RTH)</b></td><td>:</td><td>$a9</td></tr>
    
    <tr><td><b>10. Prekam Vidio</b></td><td>:</td><td>$a10</td></tr>
    
    <tr><td><b>11. Shutter/Pengambil Foto</b></td><td>:</td><td>$a11</td></tr>
    
    <tr><td><b>12. Mode Penerbangan</b></td><td>:</td><td>$a12</td></tr>
    
    <tr><td><b>13. Penghenti Mode Terbang</b></td><td>:</td><td>$a13</td></tr>
    
    <tr><td><b>14. Pengaturan Kamera</b></td><td>:</td><td>$a14</td></tr>
    
    <tr><td><b>15. Pengaturan Kemiringan</b></td><td>:</td><td>$a15</td></tr>
    
    <tr><td><h4>Port: </h4></td></tr>
    
    <tr><td><b>16. Mikro USB</b></td><td>:</td><td>$a16</td></tr>
    
    <tr><td><b>17. USB</b></td><td>:</td><td>$a17</td></tr>
    
    <tr><td><b>18. Pengisi Daya</b></td><td>:</td><td>$a18</td></tr>
    
    <tr><td><h2>Pesawat</h2></td></tr>
    
    <tr><td><b><h4>19. Body Pesawat</h4></b></td><td>:</td><td>$a19</td></tr>
    
    <tr><td><b><h4>20. Penyangga Pesawat</b></h4></td><td>:</td><td>$a20</td></tr>

    <tr><td><b><h4>21. Internal Battery</h4></b></td><td>:</td><td>$a21</td></tr>
    
    <tr><td><b><h4>22. Tombol Power</h4></b></td><td>:</td><td>$a22</td></tr>
    
    <tr><td><b><h4>23. LED Battery Indicator</h4></b></td><td>:</td><td>$a23</td></tr>

    <tr><td><h4>Baling - Baling (Propeller):</h4></td></tr>
   
    <tr><td><b><h4>24. Mesin Props</h4></b></td><td>:</td><td>$a24</td></tr>
    
    <tr><td><b><h4>25. Pengait Props</h4></b></td><td>:</td><td>$a25</td></tr>
    
    <tr><td><b><h4>26. Sekrup/Baut Props</h4></b></td><td>:</td><td>$a26</td></tr>
    
    <tr><td><b><h4>27. Per Baling - Baling</h4></b></td><td>:</td><td>$a27</td></tr>
    
    <tr><td><b><h4>28. Baling - Baling (Propeller)</h4></b></td><td>:</td><td>$a28</td></tr>

    <tr><td><h4>-------</h4></td></tr>
    
    <tr><td><b><h4>29. Gimbal</h4></b></td><td>:</td><td>$a29</td></tr>
    
    <tr><td><b><h3>30. Kabel Gimbal</h3></b></td><td>:</td><td>$a30</td></tr>
   
    <tr><td><h4>Kamera:</h4></td></tr>
   
    <tr><td><b><h3>31. Mikro USB</h3></b></td><td>:</td><td>$a31</td></tr>
    
    <tr><td><b><h3>32. Memory Card</h3></b></td><td>:</td><td>$a32</td></tr>

    <tr><td><h4>Port:</h4></td></tr>

    <tr><td><b><h3>33. Mikro USB</h3></b></td><td>:</td><td>$a33</td></tr>
    
    <tr><td><b><h3>34. Memory Card</h3></b></td><td>:</td><td>$a34</td></tr>

    <tr><td><h4>-------</h4></td></tr>

    <tr><td><b><h3>35. Charger Internal Battery</h3></b></td><td>:</td><td>$a35</td></tr>

    <tr><td><h2>Tab / Layar</h2></td></tr>

    <tr><td><b><h3>36. Layar Display</h3></b></td><td>:</td><td>$a36</td></tr>
    
    <tr><td><b><h3>37. Charger Tab</h3></b></td><td>:</td><td>$a37</td></tr>
   
    <tr><td><b><h3>38. Program Aplikasi DJI GO</h3></b></td><td>:</td><td>$a38</td></tr>

    <tr><td><h2>Reciever</h2></td></tr>

    <tr><td><b><h3>39. Internal Battery</h3></b></td><td>:</td><td>$a39</td></tr>
    
    <tr><td><b><h3>40. Tripod</h3></b></td><td>:</td><td>$a40</td></tr>
   
    <tr><td><b><h3>41. Tribach APS</h3></b></td><td>:</td><td>$a41</td></tr>
    
    <tr><td><b><h3>42. Charger Battry</h3></b></td><td>:</td><td>$a42</td></tr>


    
    </table>  <br>
    
<br><br>

            Note : Mohon dapat segera melakukan Approval mengenai laporan p2h drone tsb. <br>

            URL Aplikasi : http://employee.sebukucoalgroup.com/p2h/p2hreport.php

            <br>
            <br>-------------------------------------<br>
            Perhatian :<br>
            Email ini dihasilkan secara otomatis oleh sistem dan bersifat informasi,<br>
            dimohon untuk tidak membalas email ini.<br>


            <br>Terima kasih.<br>

            <br>

            Best Regards,<br>

            System IT Employee (P2H)



    ";

    $mail->Body    = $Body; //isi email

    $mail->IsHTML(true);

    $mail->AltBody = "PHP mailer"; //body email (optional)

    if (!$mail->send()) {
    } else {
    }

    // }
    header("Location:../?r_drone_rtk");
}
// }
