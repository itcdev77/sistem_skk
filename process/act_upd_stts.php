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


//Email dari atasan ke bawahan..
if (isset($_POST['ubah_stts_drone_rtk'])) {
    $id = $_POST['idbarang'];
    $status = $_POST['status'];
    $tggl = $_POST['tggl'];
    $nama_drone = $_POST['nama_drone'];
    $nama = $_POST['nama'];
    $cttn_atasan = $_POST['cttn_atasan'];

    //untuk update di table departement terkait
    $update = mysqli_query($con, "UPDATE drone_rtk SET status='$status', cttn_atasan='$cttn_atasan' WHERE idbarang='$id'") or die("Error: " . mysqli_error($con));

    if ($update) {
        $success = 'Berhasil mengubah data P2H';
    } else {
        $error = 'Gagal mengubah data P2H';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;


    // email

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

    $mail->FromName = "System IT Employee (P2H-Drone RTK)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Review Atasan P2H Unit Drone RTK"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    
    <tr>
    
        <td><b>Nama Anggota</b></td><td>:</td><td>$nama</td>
    
    </tr>

    <tr>
    
        <td><b>Status</b></td><td>:</td><td>$status</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Drone RTK</b></td><td>:</td><td>$nama_drone</td>
    
    </tr>
   
    <tr>
    
        <td><b>Waktu Input</b></td><td>:</td><td>$tggl</td>
    
    </tr>
    <tr>
    
        <td><b>Note Atasan</b></td><td>:</td><td>$cttn_atasan</td>
    
    </tr>
    
   
    
    </table>  <br>
    
<br><br>

            Note : Jika status approved maka unit bisa digunakan, tapi jika gagal maka unit tidak bisa digunakan. <br>

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

    // end of email
    header('Location:../?r_drone_rtk');
}


//email atasan untuk drone
if (isset($_POST['ubah_stts_drone'])) {
    $id = $_POST['idbarang'];
    $status = $_POST['status'];
    $tggl = $_POST['tggl'];
    $nama_drone = $_POST['nama_drone'];
    $nama = $_POST['nama'];
    $cttn_atasan = $_POST['cttn_atasan'];

    //untuk update di table departement terkait
    $update = mysqli_query($con, "UPDATE drone SET status='$status', cttn_atasan='$cttn_atasan' WHERE idbarang='$id'") or die("Error: " . mysqli_error($con));

    if ($update) {
        $success = 'Berhasil mengubah data P2H';
    } else {
        $error = 'Gagal mengubah data P2H';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;


    // email

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

    $mail->FromName = "System IT Employee (P2H-Drone)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Review Atasan P2H Unit Drone"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    
    <tr>
    
        <td><b>Nama Anggota</b></td><td>:</td><td>$nama</td>
    
    </tr>

    <tr>
    
        <td><b>Status</b></td><td>:</td><td>$status</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Drone</b></td><td>:</td><td>$nama_drone</td>
    
    </tr>
   
    <tr>
    
        <td><b>Waktu Input</b></td><td>:</td><td>$tggl</td>
    
    </tr>
    <tr>
    
        <td><b>Note Atasan</b></td><td>:</td><td>$cttn_atasan</td>
    
    </tr>
    
   
    
    </table>  <br>
    
<br><br>

            Note : Jika status approved maka unit bisa digunakan, tapi jika gagal maka unit tidak bisa digunakan. <br>

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

    // end of email
    header('Location:../?r_drone');
}



//email atasan untuk GPS Geodetic
if (isset($_POST['ubah_stts_gps'])) {
    $id = $_POST['idbarang'];
    $status = $_POST['status'];
    $tggl = $_POST['tggl'];
    $tipe_alat = $_POST['tipe_alat'];
    $nama = $_POST['nama'];
    $cttn_atasan = $_POST['cttn_atasan'];

    //untuk update di table departement terkait
    $update = mysqli_query($con, "UPDATE gps_geodetic SET status='$status', cttn_atasan='$cttn_atasan' WHERE idbarang='$id'") or die("Error: " . mysqli_error($con));

    if ($update) {
        $success = 'Berhasil mengubah data P2H';
    } else {
        $error = 'Gagal mengubah data P2H';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;


    // email

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

    $mail->FromName = "System IT Employee (P2H-GPS Geodetic)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Review Atasan P2H Unit GPS Geodetic"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    
    <tr>
    
        <td><b>Nama Anggota</b></td><td>:</td><td>$nama</td>
    
    </tr>

    <tr>
    
        <td><b>Status</b></td><td>:</td><td>$status</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Gps</b></td><td>:</td><td>$tipe_alat</td>
    
    </tr>
   
    <tr>
    
        <td><b>Waktu Input</b></td><td>:</td><td>$tggl</td>
    
    </tr>
    <tr>
    
        <td><b>Note Atasan</b></td><td>:</td><td>$cttn_atasan</td>
    
    </tr>
    
   
    
    </table>  <br>
    
<br><br>

            Note : Jika status approved maka unit bisa digunakan, tapi jika gagal maka unit tidak bisa digunakan. <br>

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

    // end of email
    header('Location:../?r_gps');
}



//email atasan untuk Total Station..
if (isset($_POST['ubah_stts_total_station'])) {
    $id = $_POST['idbarang'];
    $status = $_POST['status'];
    $tggl = $_POST['tggl'];
    $tipe_alat = $_POST['tipe_alat'];
    $nama = $_POST['nama'];
    $cttn_atasan = $_POST['cttn_atasan'];

    //untuk update di table departement terkait
    $update = mysqli_query($con, "UPDATE total_station SET status='$status', cttn_atasan='$cttn_atasan' WHERE idbarang='$id'") or die("Error: " . mysqli_error($con));

    if ($update) {
        $success = 'Berhasil mengubah data P2H';
    } else {
        $error = 'Gagal mengubah data P2H';
    }
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;


    // email

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

    $mail->FromName = "System IT Employee (P2H-Total Station)"; //nama pengirim


    // $mail->addBCC('abelardpangalila@gmail.com');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('ary.setiawan@sebukucoalgroup.co.id');
    $mail->addBCC('indra.purwana@sebukucoalgroup.co.id');
    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');
    $mail->addBCC('adiabrar.kiram@sebukucoalgroup.co.id');




    $mail->isHTML(true);



    $mail->Subject = "Review Atasan P2H Unit Total Station"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    
    <tr>
    
        <td><b>Nama Anggota</b></td><td>:</td><td>$nama</td>
    
    </tr>

    <tr>
    
        <td><b>Status</b></td><td>:</td><td>$status</td>
    
    </tr>
    
    <tr>
    
        <td><b>Nama Total Station</b></td><td>:</td><td>$tipe_alat</td>
    
    </tr>
   
    <tr>
    
        <td><b>Waktu Input</b></td><td>:</td><td>$tggl</td>
    
    </tr>
    <tr>
    
        <td><b>Note Atasan</b></td><td>:</td><td>$cttn_atasan</td>
    
    </tr>
    
   
    
    </table>  <br>
    
<br><br>

            Note : Jika status approved maka unit bisa digunakan, tapi jika gagal maka unit tidak bisa digunakan. <br>

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

    // end of email
    header('Location:../?r_total_station');
}
