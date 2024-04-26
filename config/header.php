<?php include "config/function.php"; ?>
<?php require "config/conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- logo -->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $base_url; ?>../assets/img/Logo Sebuku.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $base_url; ?>../assets/img/Logo Sebuku.png">

    <!--  -->

    <title>Sistem SKK</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/select2/css/select2.min.css" rel="stylesheet" />
    <!-- Custom styles for this page -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- vendor -->
    <!-- Theme style -->
    <link rel=" stylesheet" href="../vendor/dist/css/adminlte.min.css">

    <style>
        .input-group-text {
            width: 200px;
            /* Sesuaikan lebar input sesuai kebutuhan */
        }

        .form-control {
            flex: 1;
            /* Menggunakan fleksibilitas untuk membuat input sama rata */
        }

        .modal_test {
  display: none; /* Sembunyikan modal secara default */
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

.modal-content {
  background-color: #fefefe;
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

    </style>

</head>