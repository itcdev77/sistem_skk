<?php
if (isset($_GET['backup_app'])) {
    include('proses/backup_app.php');
} else if (isset($_GET['backup_db'])) {
    include('proses/backup_db.php');
} else if (isset($_GET['merek'])) {
    $master = $merek = true;
    $views = 'views/master/merek.php';
} else if (isset($_GET['kategori'])) {
    $master = $kategori = true;
    $views = 'views/master/kategori.php';
} else if (isset($_GET['barang'])) {
    $master = $barang = true;
    $views = 'views/master/barang.php';
} else if (isset($_GET['pengguna'])) {
    $master = $pengguna = true;
    $views = 'views/master/pengguna.php';
} else if (isset($_GET['barang_masuk'])) {
    $transaksi = $barang_masuk = true;
    $views = 'views/transaksi/barang_masuk.php';
} else if (isset($_GET['barang_keluar'])) {
    $transaksi = $barang_keluar = true;
    $views = 'views/transaksi/barang_keluar.php';
} else if (isset($_GET['lap_barang_masuk'])) {
    $laporan = $lap_barang_masuk = true;
    $views = 'views/laporan/lap_barang_masuk.php';
} else if (isset($_GET['lap_barang_keluar'])) {
    $laporan = $lap_barang_keluar = true;
    $views = 'views/laporan/lap_barang_keluar.php';
}

// Edit
else if (isset($_GET['prodev'])) {
    $master = $prodev = true;
    $views = 'views/master/prodev.php';
} else if (isset($_GET['cpp'])) {
    $master = $cpp = true;
    $views = 'views/master/cpp.php';
} else if (isset($_GET['ea'])) {
    $master = $ea = true;
    $views = 'views/master/ea.php';
} else if (isset($_GET['hse'])) {
    $master = $hse = true;
    $views = 'views/master/hse.php';
} else if (isset($_GET['itc'])) {
    $master = $itc = true;
    $views = 'views/master/itc.php';
} else if (isset($_GET['mep'])) {
    $master = $mep = true;
    $views = 'views/master/mep.php';
} else if (isset($_GET['scm'])) {
    $master = $scm = true;
    $views = 'views/master/scm.php';
} else if (isset($_GET['ship'])) {
    $master = $ship = true;
    $views = 'views/master/ship.php';
} else if (isset($_GET['survey'])) {
    $master = $survey = true;
    $views = 'views/master/survey.php';
} else if (isset($_GET['get_budget'])) {
    $master = $get_budget = true;
    $views = 'views/master/get_budget.php';
} else if (isset($_GET['get_budget2'])) {
    $master = $get_budget = true;
    $views = 'views/master/get_budget2.php';
}

//page untuk split budget..
else if (isset($_GET['split'])) {
    $master = $split = true;
    $views = 'views/master/split.php';
}
//Transaksi
else if (isset($_GET['form_keluar'])) {
    $transaksi = $form_keluar = true;
    $views = 'views/transaksi/form_keluar.php';
} else if (isset($_GET['gps'])) {
    $transaksi = $gps = true;
    $views = 'views/transaksi/gps.php';
} else if (isset($_GET['drone'])) {
    $transaksi = $drone = true;
    $views = 'views/transaksi/drone.php';
} else if (isset($_GET['drone_rtk'])) {
    $transaksi = $drone_rtk = true;
    $views = 'views/transaksi/drone_rtk.php';
}
// 

// Log Transaksi...
else if (isset($_GET['trnsk_berhasil'])) {
    $log_transaksi = $trnsk_berhasil = true;
    $views = 'views/log_transaksi/trnsk_berhasil.php';
} else if (isset($_GET['trnsk_gagal'])) {
    $log_transaksi = $trnsk_gagal = true;
    $views = 'views/log_transaksi/trnsk_gagal.php';
}
// 

// Log report P2H...
else if (isset($_GET['r_drone'])) {
    $report = $r_drone = true;
    $views = 'views/report/r_drone.php';
} else if (isset($_GET['r_drone_rtk'])) {
    $report = $r_drone_rtk = true;
    $views = 'views/report/r_drone_rtk.php';
} else if (isset($_GET['r_skk'])) {
    $report = $r_skk = true;
    $views = 'views/report/r_skk.php';
} else if (isset($_GET['r_gps'])) {
    $report = $r_gps = true;
    $views = 'views/report/r_gps.php';
} else if (isset($_GET['ex_total_station'])) {
    $report = $ex_total_station = true;
    $views = 'views/report/ex_total_station.php';
}


// 

else {
    $home = true;
    $views = 'views/home.php';
}
