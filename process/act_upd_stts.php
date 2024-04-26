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

// Telegram Bot API Token
$botToken = "6527284022:AAE6GMSqxpDC4NW4d-1bIRBnRazUE46vXvo";

// Chat ID of the recipient
$chatID = "-4101873678";

// Inisialisasi variabel
$success = '';
$error = '';

if (isset($_POST['update_stts_skk'])) {
    $id = $_POST['iduser'];
    $status = $_POST['status'];
    $wkt_apv_ats = date('Y-m-d');
    $catatan = $_POST['catatan'];

    // Update data
    $mail = new PHPMailer;

    //Set PHPMailer to use SMTP.
    $mail->isSMTP();

    //Set SMTP host name                          
    $mail->Host = "smtp.gmail.com"; //host mail server

    $mail->SMTPAuth = true;

    //Provide username and password     
    $mail->Username = "sebuku.itc@gmail.com"; //nama-email smtp          

    $mail->Password = "cqeargqaavjrkufn"; //password email smtp

    $mail->SMTPSecure = "ssl";

    //Set TCP port to connect to 
    $mail->Port = 465;

    $mail->From = "sebuku.itc@gmail.com"; //email pengirim

    $mail->FromName = "System IT Employee (Sistem SKK)"; //nama pengirim

    $mail->addBCC('abelard.pangalila@sebukucoalgroup.co.id');

    $mail->isHTML(true);

    $mail->Subject = "Approve Atasan Sistem SKK"; //subject

    // Isi email
    $mail->Body = "Review Surat Keluar\n\nStatus: $status\n\nWaktu Approved: $wkt_apv_ats"; //isi email

    // Kirim email
    if (!$mail->send()) {
        $error = 'Gagal mengirim email: ' . $mail->ErrorInfo; // Menampilkan informasi kesalahan email
    } else {
        // Kirim notifikasi ke Telegram
        $message = "<b>Review Surat Keluar</b>\n\n" .
            "<b>Status:</b> $status\n\n" .
            "<b>Waktu Approved:</b> $wkt_apv_ats\n\n";

        // API URL
        $apiURL = "https://api.telegram.org/bot$botToken/sendMessage";

      
        $data = array(
            'chat_id' => $chatID,
            'text' => $message,
            'parse_mode' => 'HTML' 
        );

       
        $ch = curl_init();

        
        curl_setopt($ch, CURLOPT_URL, $apiURL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      
        $result = curl_exec($ch);

        
        curl_close($ch);

        // Output result
        if ($result) {
            $success = "Notifikasi berhasil dikirim!";

            // update kedalam database
            $upd = mysqli_query($con, "UPDATE tbl_skk SET wkt_apv_ats='$wkt_apv_ats', status='$status', catatan='$catatan' WHERE iduser='$id'") or die("Error: " . mysqli_error($con));
            if ($upd) {
                $success = 'Berhasil mengubah data P2H';
            } else {
                $error = 'Gagal mengubah data P2H: ' . mysqli_error($con); // Menampilkan informasi kesalahan query SQL
            }
        } else {
            $error = "Gagal mengirim notifikasi: " . curl_error($ch); // Menampilkan informasi kesalahan cURL
        }
    }

    // Simpan pesan kesalahan atau keberhasilan ke dalam session
    $_SESSION['success'] = $success;
    $_SESSION['error'] = $error;

    // Redirect ke halaman sebelumnya
    header('Location:../?r_skk');
}
