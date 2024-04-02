<?php

session_start();
include('../config/conn.php');
include('../config/function.php');

// API token telegram
$botToken = "6527284022:AAE6GMSqxpDC4NW4d-1bIRBnRazUE46vXvo";

// Chat ID bot telegram
$chatID = "-4101873678";

if (isset($_POST['input_skk'])) {

    $a = $_POST['nama_pengemudi'];
    $e = $_POST['tggl_berangkat'];
    $f = $_POST['km_awal'];
    $g = $_POST['jenis_kendaraan'];
    $h = $_POST['tujuan_perjalanan'];
    $i = $_POST['nama_penumpang'];
    $j = $_POST['catatan'];

    // Cek apakah data sudah ada di database..
    $sql_check = "SELECT * FROM tbl_skk WHERE nama_pengemudi = '$a' AND tggl_berangkat = '$e' AND km_awal = '$f' AND jenis_kendaraan = '$g' AND tujuan_perjalanan = '$h' AND nama_penumpang = '$i'";
    $result_check = $con->query($sql_check);

    if ($result_check->num_rows > 0) {
        // Data sudah ada, tidak perlu dimasukan lagi..
        echo "Data sudah ada di database.";
    } else {
        // Data belum ada, lakukan operasi insert
        $sql_insert = "INSERT INTO tbl_skk (nama_pengemudi, tggl_berangkat, km_awal, jenis_kendaraan, tujuan_perjalanan, nama_penumpang, catatan) 
        VALUES ('$a', '$e', '$f', '$g', '$h', '$i', '$j')";

        if ($con->query($sql_insert) === TRUE) {
            echo "Data berhasil dimasukkan.";

            // Kirim notifikasi ke Telegram
            $message = "<b>Data baru telah dimasukkan:</b>\n\nNama Pengemudi:  <b>$a</b>\n\nTanggal Berangkat:  <b>$e</b>\n\nKm Awal:  <b>$f</b>\n\nJenis Kendaraan:  <b>$g</b>\n\nTujuan Perjalanan:  <b>$h</b>\n\nNama Penumpang:  <b>$i</b>\n\nCatatan:  <b>$j</b>";

            // API URL
            $apiURL = "https://api.telegram.org/bot$botToken/sendMessage";

            // Data to be sent
            $data = array(
                'chat_id' => $chatID,
                'text' => $message,
                'parse_mode' => 'HTML'
            );

            // Initialize cURL
            $ch = curl_init();

            // Set cURL options
            curl_setopt($ch, CURLOPT_URL, $apiURL);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Execute cURL
            $result = curl_exec($ch);

            // Close cURL
            curl_close($ch);

            // Output result
            if ($result) {
                echo "Notification sent successfully!";
            } else {
                echo "Failed to send notification.";
            }
        } else {
            echo "Error: " . $sql_insert . "<br>" . $con->error;
        }
    }

    // Redirect back to the previous page
    header("Location:../?r_skk");

    // Exit script to prevent further execution
    exit();
}
