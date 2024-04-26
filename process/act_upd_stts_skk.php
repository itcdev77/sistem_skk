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





//email atasan untuk Total Station..
if (isset($_POST['update_stts_skk'])) {
    $id = $_POST['iduser'];
    $status = $_POST['status'];
   
    $cttn = $_POST['catatan'];

    //untuk update di table departement terkait
    $update = mysqli_query($con, "UPDATE tbl_skk SET status='$status', catatan='$cttn' WHERE iduser='$id'") or die("Error: " . mysqli_error($con));

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
    // $mail->Password = "crclkejjaqlpwjyk";           //password email smtp
    $mail->Password = "cqeargqaavjrkufn"; //password email smtp


    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 

    $mail->Port = 465;
    //$mail->Port = 26;                                                    



    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (P2H-Total Station)"; //nama pengirim


    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');

    $mail->isHTML(true);



    $mail->Subject = "Review Atasan P2H Unit Total Station"; //subject

    $Body = "

    <table class='table'>

    <tr> 
    
        <td colspan='3'><h4><u><font color='green'>Detail Laporan</font></u></h4></td>
    
    </tr>
    
    
    <tr>
    
        <td><b>Status</b></td><td>:</td><td>$status</td>
        <td><b>Catatan</b></td><td>:</td><td>$cttn</td>
    
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
    header('Location:../?r_skk');
}
