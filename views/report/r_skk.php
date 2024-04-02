<?php hakAkses(['admin', 'user']);
?>


<script>
    function submit(x) {
        if (x == 'add') {
            // kosong
        } else {
            $('#detailModal .modal-title').html('Detail Transaksi Split Budget');
            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_total_station.php',
                dataType: 'json',
                success: function(data) {

                    // var formattedPrice = 'Rp. ' + data.price;

                    $('[name="iduser "]').val(data.iduser);
                    $('[name="nama_pengemudi"]').val(data.nama_pengemudi);
                    $('[name="tggl_berangkat"]').val(data.tggl_berangkat);
                    $('[name="km_awal"]').val(data.km_awal);
                    $('[name="jenis_kendaraan"]').val(data.jenis_kendaraan);

                    //catatan
                    // $('[name="keterangan"]').val(data.keterangan);


                }
            });
        }
    }
</script>


<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Report Kendaraan Keluar</h1>
    </div>
</div>

<div class="container-fluid ">

    <!-- DataTales Example -->


    <form action="<?= base_url(); ?>/process/ex_total_station.php" method="post" target="_blank">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tanggal_awal">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?= date('Y-m-d'); ?>
">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= date('Y-m-d'); ?>
">
                </div>
            </div>

            <div class="col-ms-1 p-2">
                <button class="btn btn-dark mt-4" type="submit" name="export"><i class="fas fa-file-export"></i>
                    Export</button>

            </div>

            <div class="col-ms-1 p-2">
                <button class="btn btn-dark mt-4" type="submit" name="export_all"><i class="fas fa-file-export"></i> Export All</button>
            </div>
        </div>
    </form>




</div>

<!--  -->

<div class="container-fluid ">



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 ">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1">NO</th>
                            <th width="100">Tanggal/Waktu</th>
                            <th width="100">Nama Pengemudi</th>
                            <th width="100">KM Awal</th>
                            <th width="100">Jenis Kendaraan</th>
                            <th width="100">Tujuan Perjalanan</th>
                            <th width="100">Nama Penumpang</th>
                            <th width="100">keterangan</th>


                            <th width="10" class="text-center">ACTION/STATUS</th>

                            <!-- <?php if ($_SESSION['level'] == 'admin') : ?>
                            <?php endif; ?> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $query = mysqli_query($con, "SELECT * FROM tbl_skk ORDER BY iduser DESC") or die(mysqli_error($con));

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) :

                        ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><?= $row['tggl_berangkat']; ?></td>

                                    <td><?= $row['nama_pengemudi']; ?></td>
                                    <td><?= $row['km_awal']; ?></td>
                                    <td><?= $row['jenis_kendaraan']; ?></td>
                                    <td><?= $row['tujuan_perjalanan']; ?></td>
                                    <td><?= $row['nama_penumpang']; ?></td>
                                    <td><?= $row['catatan']; ?></td>

                                    <!-- Approval sistem -->

                                    <?php if ($row['status'] == 'approved' && $_SESSION['lvl_skk'] != 'admin') : ?>

                                        <!-- action untuk display detail transaksi -->
                                        <td class="text-center" style="color: #65B741;"><i class="fas fa-check"></i></td>


                                    <?php endif; ?>

                                    <!-- status ketika sudah di approve -->
                                    <?php if ($row['status'] == 'approved' && $_SESSION['lvl_skk'] == 'admin') : ?>

                                        <!-- action untuk display detail transaksi -->
                                        <td class="text-center" style="color: #65B741;"><i class="fas fa-check"></i></td>

                                    <?php endif; ?>
                                    <!--  -->

                                    <!-- status untuk user ketika belum ada action  dari FA -->
                                    <?php if ($row['status'] == NULL && $_SESSION['lvl_skk'] != 'admin') : ?>

                                        <td class="text-center" style="color: orange;"><i class="fas fa-clock"></i> Pending</td>

                                    <?php endif; ?>
                                    <!--  -->

                                    <!-- action ketika status masih pending dan approval untuk admin -->
                                    <?php if ($row['status'] == NULL && $_SESSION['lvl_skk'] == 'admin') : ?>

                                        <td class="text-center"><a class="btn btn-sm btn-circle btn-primary" href="#approve_split" data-toggle="modal" onclick="submit(<?= $row['iduser']; ?>)"><i class="fas fa-edit"></i></a></td>

                                    <?php endif; ?>

                                    <!-- info yang akan muncul ketika transaksi gagal -->
                                    <?php if ($row['status'] == 'gagal') : ?>

                                        <td class="text-center" style="color: red;"><i class="fas fa-times"></i> Di Tolak</td>

                                    <?php endif; ?>



                                </tr>
                        <?php
                            // endif;
                            endwhile;
                        } else {
                            echo '<tr><td class="text-center" colspan="7">Belum Ada Transaksi Yang Terjadi</td></tr>';
                        }
                        ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<!-- modal yang hanya bisa melihat detail -->
<div class="modal fade" id="detailModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>process/act_prodev.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">


                                <input type="hidden" name="idbarang" class="form-control">


                                <div class="row">

                                    <div class="col col-12">
                                        <ul class="list-group">
                                            <label for="">Total Station</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Box Alat :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="box_alat" id="box_alat" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="bt_internal" id="bt_internal" readonly>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="bt_charger" id="bt_charger" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Extension :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="extension" id="extension" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Vertikal :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="vertikal" id="vertikal" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Horizontal :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="horizontal" id="horizontal" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Obyektif :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="obyektif" id="obyektif" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Okuler :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="okuler" id="okuler" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pengatur Fokus :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pengatur_fokus" id="pengatur_fokus" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Clamp Vert & Horiz :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="clamp_vh" id="clamp_vh" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Penggerak halus Vert & Horiz :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="penggerak_halus_vh" id="penggerak_halus_vh" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Lensa :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="lensa" id="lensa" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pengatur Fokus :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pengatur_fokus_sc" id="pengatur_fokus_sc" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Nivo Tabung(Plate Level) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="nivo_tabung" id="nivo_tabung" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Nivo Bulat(Circular Level) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="nivo_bulat" id="nivo_bulat" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Sekrup ABC :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="sekrup_abc" id="sekrup_abc" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tombol - Tombol Keypad :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tombol_keypad" id="tombol_keypad" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Laser :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="laser" id="laser" readonly>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Meteran Roll :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="materal_roll" id="materal_roll" readonly>
                                                </div>
                                            </li>

                                            <label for="">Tripod (Statif)</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tipod(Statif) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tripod_statif" id="tripod_statif" readonly>
                                                </div>
                                            </li>

                                            <label for="">Tribrach APS</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tribrach APS :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tribrach_aps" id="tribrach_aps" readonly>
                                                </div>
                                            </li>

                                            <label for="">Stick (Tongkat Pogo)</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Stick (Tongkat Pogo) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stick" id="stick" readonly>
                                                </div>
                                            </li>

                                            <label for="">Prisma Topo</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Prisma Topo :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="prisma_topo" id="prisma_topo" readonly>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>



                                    <div class="col col-12 mt-3">
                                        <ul class="list-group">
                                            <label for="">Keterangan</label>
                                            <li class="list-group-item">
                                                <div class="input-group">

                                                    <input type="text" class="form-control border-0" name="keterangan" id="keterangan" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>


                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal approval admin -->

<div class="modal fade" id="approve_split" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>process/act_upd_stts.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- modal body -->
                <div class="modal-body">

                    <input type="hidden" name="iduser" class="form-control">
                    <input type="hidden" name="approval_name" value="<?= strtoupper($_SESSION['nama']); ?>" class="form-control">


                    <div class="row">
                        <div class="col col-6">
                            <label for="">Tanggal/Waktu</label>

                            <li class="list-group-item">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0" name="tggl_berangkat" readonly>
                                </div>
                            </li>
                        </div>
                        <div class="col col-6">
                            <label for="">Nama Pengemudi</label>

                            <li class="list-group-item ">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0" name="nama_pengemudi" readonly>

                                </div>
                            </li>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col col-6">
                            <label for="">KM Awal</label>

                            <li class="list-group-item">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0" name="km_awal" readonly>
                                </div>
                            </li>
                        </div>
                        <div class="col col-6">
                            <label for="">Jenis Kendaraan</label>

                            <li class="list-group-item ">
                                <div class="input-group">
                                    <input type="text" class="form-control border-0" name="jenis_kendaraan" readonly>
                                </div>
                            </li>
                        </div>
                    </div>


                    <p class="text-center mt-3"><b>Silahkan pilih approve untuk setuju dan tolak untuk menolak perjalanan ini</b></p>

                    <div class="text-center">
                        <div class="form-check">
                            <?php if (strtoupper($_SESSION['dep']) == "ITC") : ?>
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="approved" checked>
                            <?php endif; ?>
                            <?php if (strtoupper($_SESSION['dep']) == "PRODEV") : ?>
                                <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="prod_app" checked>
                            <?php endif; ?>
                            <label class="form-check-label" for="exampleRadios1">
                                Approved
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="gagal">
                            <label class="form-check-label" for="exampleRadios2">
                                Tolak
                            </label>
                        </div>

                    </div>

                    <label class="mt-2" for="">Catatan (Optional)</label>
                    <li class="list-group-item">
                        <div class="input-group">

                            <input type="text" class="form-control border-0" name="cttn_atasan" id="cttn_atasan">
                        </div>
                    </li>


                </div>

                <div class="modal-footer text-center">

                    <!-- <input type="submit" class="btn btn-danger" placeholder="test" data-bs-dismiss="modal"> -->
                    <input class="btn btn-success float-right" type="submit" name="appv_atasan">

                </div>

            </form>
        </div>
    </div>
</div>