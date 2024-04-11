<?php
hakAkses(['admin', 'user']);

$now = date('Y-m-d'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard </h1>
    </div>

    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Barang Masuk Hari Ini</h4>
            <a href="<?= base_url(); ?>process/cetak_barang_masuk_today.php" target="_blank" class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>KETERANGAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $query = mysqli_query($con, "SELECT x.*,x1.nama_barang,x2.nama_merek,x3.nama_kategori FROM barang_masuk x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN merek x2 ON x2.idmerek=x1.merek_id JOIN kategori x3 ON x3.idkategori=x1.kategori_id WHERE x.tanggal='$now' ORDER BY x.idbarang_masuk DESC") or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_merek']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <!-- DataTales Example -->
    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="float-left">Barang Keluar Hari Ini</h4>
            <a href="<?= base_url(); ?>process/cetak_barang_keluar_today.php" target="_blank" class="btn btn-info btn-icon-split btn-sm float-right">
                <span class="icon text-white-50">
                    <i class="fas fa-print"></i>
                </span>
                <span class="text">Cetak</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20">NO</th>
                            <th>TANGGAL</th>
                            <th>NAMA BARANG</th>
                            <th>MEREK</th>
                            <th>KATEGORI</th>
                            <th>KETERANGAN</th>
                            <th>JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $query = mysqli_query($con, "SELECT x.*,x1.nama_barang,x2.nama_merek,x3.nama_kategori FROM barang_keluar x JOIN barang x1 ON x1.idbarang=x.barang_id JOIN merek x2 ON x2.idmerek=x1.merek_id JOIN kategori x3 ON x3.idkategori=x1.kategori_id WHERE x.tanggal='$now' ORDER BY x.idbarang_keluar DESC") or die(mysqli_error($con));
                        while ($row = mysqli_fetch_array($query)) :
                        ?>
                            <tr>
                                <td><?= $n++; ?></td>
                                <td><?= date('d-m-Y', strtotime($row['tanggal'])); ?></td>
                                <td><?= $row['nama_barang']; ?></td>
                                <td><?= $row['nama_merek']; ?></td>
                                <td><?= $row['nama_kategori']; ?></td>
                                <td><?= $row['keterangan']; ?></td>
                                <td><?= $row['jumlah']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
    <!-- /.container-fluid -->

    <!-- dashboard PRODEV -->

    <!-- Area Chart -->

    <center>
        <h3 class="card-header section-title">
            Statistik Sistem SKK </h3>
    </center><br>

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Chart kendaraan keluar minggu ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-dark">Statistik kendaraan keluar Hari Ini</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart1"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        Total kendaraan keluar hari ini :
                        <?php
                        $jumlah_laki = mysqli_query($con, "select * from total_station where tggl>=CURRENT_DATE();");
                        echo mysqli_num_rows($jumlah_laki) . " Laporan";
                        ?>

                    </div>
                    <div class="mt-4 text-center small">
                        Approved :
                        <?php
                        $jumlah_laki = mysqli_query($con, "SELECT status FROM total_station WHERE status = 'approved' AND tggl >= CURRENT_DATE();;");
                        echo mysqli_num_rows($jumlah_laki) . " Di Approved";
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>