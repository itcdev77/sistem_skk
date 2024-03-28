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
                url: '<?= base_url(); ?>process/view_gps.php',
                dataType: 'json',
                success: function(data) {

                    // var formattedPrice = 'Rp. ' + data.price;

                    $('[name="idbarang"]').val(data.idbarang);
                    $('[name="tggl"]').val(data.tggl);
                    $('[name="tipe_alat"]').val(data.tipe_alat);
                    $('[name="nama"]').val(data.nama);
                    $('[name="cttn_atasan"]').val(data.cttn_atasan);

                    // titik yang ada keteranganya
                    $('[name="b_reciever"]').val(data.b_reciever);
                    $('[name="led_jaringan"]').val(data.led_jaringan);
                    $('[name="r_antena"]').val(data.r_antena);
                    $('[name="extension"]').val(data.extension);
                    $('[name="b_internal"]').val(data.b_internal);
                    $('[name="b_charger"]').val(data.b_charger);
                    $('[name="t_power"]').val(data.t_power);
                    $('[name="t_port_battery"]').val(data.t_port_battery);
                    $('[name="t_power"]').val(data.t_power);
                    $('[name="t_port_usb"]').val(data.t_port_usb);
                    $('[name="usb"]').val(data.usb);
                    $('[name="b_slot"]').val(data.b_slot);
                    $('[name="ttp_adapter"]').val(data.ttp_adapter);
                    $('[name="tmbl_adapter"]').val(data.tmbl_adapter);

                    $('[name="body_remote"]').val(data.body_remote);
                    $('[name="ld_remote"]').val(data.ld_remote);
                    $('[name="rc_internal_battery"]').val(data.rc_internal_battery);
                    $('[name="pen_remote"]').val(data.pen_remote);
                    $('[name="t_keypad_remote"]').val(data.t_keypad_remote);
                    $('[name="s_controller"]').val(data.s_controller);
                    $('[name="skrup_remote"]').val(data.skrup_remote);
                    $('[name="p_mikro_usb"]').val(data.p_mikro_usb);
                    $('[name="p_usb"]').val(data.p_usb);
                    $('[name="p_memory_card"]').val(data.p_memory_card);
                    $('[name="p_ci_battery"]').val(data.p_ci_battery);
                    $('[name="tribach"]').val(data.tribach);
                    $('[name="sekrup_abc"]').val(data.sekrup_abc);
                    $('[name="clamp"]').val(data.clamp);
                    $('[name="t_adaptor"]').val(data.t_adaptor);
                    $('[name="t_nivo_bulat"]').val(data.t_nivo_bulat);
                    $('[name="stick"]').val(data.stick);

                    //catatan
                    $('[name="keterangan"]').val(data.keterangan);


                }
            });
        }
    }
</script>


<!-- Begin Page Content -->

<!-- Page Heading -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Report P2H GPS Geodetik</h1>
    </div>
</div>

<div class="container-fluid">

    <!-- DataTales Example -->


    <form action="<?= base_url(); ?>/process/ex_gps.php" method="post" target="_blank">
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
                <button class="btn btn-primary mt-4" type="submit" name="export"><i class="fas fa-file-export"></i>
                    Export</button>

            </div>

            <div class="col-ms-1 p-2">
                <button class="btn btn-primary mt-4" type="submit" name="export_all"><i class="fas fa-file-export"></i> Export All</button>
            </div>
        </div>
    </form>




</div>


<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="1">NO</th>
                            <th width="100">Tanggal/Waktu</th>
                            <th width="100">Nama</th>
                            <th width="100">Lokasi Kerja</th>
                            <th width="100">Nama GPS</th>
                            <th width="100">No Seri GPS</th>
                            <th width="100">Jadwal Kalibrasi</th>
                            <th width="100">keterangan</th>
                            <th width="100">Note Atasan</th>

                            <th width="10" class="text-center">ACTION/STATUS</th>

                            <!-- <?php if ($_SESSION['level'] == 'admin') : ?>
                            <?php endif; ?> -->

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $n = 1;
                        $query = mysqli_query($con, "SELECT * FROM gps_geodetic ORDER BY idbarang DESC") or die(mysqli_error($con));

                        if (mysqli_num_rows($query) > 0) {
                            while ($row = mysqli_fetch_array($query)) :

                                // Tambahkan kondisi untuk menentukan jenis transaksi yang ingin ditampilkan
                                // $jenis_transaksi = "split"; // Ganti dengan "price" jika ingin menampilkan transaksi price

                                // if ($row['jenis_trnsk'] == $jenis_transaksi && $row['departemen'] == $_SESSION['fullname'] || $_SESSION['level'] == 'admin' && $row['jenis_trnsk'] != 'price' && $row['jenis_trnsk'] != 'stok') :
                        ?>
                                <tr>
                                    <td><?= $n++ ?></td>
                                    <td><a href="#detailModal2" data-toggle="modal" onclick="submit(<?= $row['idbarang']; ?>)"><?= $row['tggl']; ?></a></td>

                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['lokasi']; ?></td>
                                    <td><?= $row['tipe_alat']; ?></td>
                                    <td><?= $row['no_seri']; ?></td>
                                    <td><?= $row['jadwal_kalibrasi']; ?></td>
                                    <td><?= $row['keterangan']; ?></td>
                                    <td><?= $row['cttn_atasan']; ?></td>

                                    <!-- approval system -->

                                    <?php if ($row['status'] == 'approved' && $_SESSION['level'] != 'admin') : ?>

                                        <!-- action untuk display detail transaksi -->
                                        <td class="text-center" style="color: #65B741;"><i class="fas fa-check"></i></td>


                                    <?php endif; ?>

                                    <!-- status ketika sudah di approve -->
                                    <?php if ($row['status'] == 'approved' && $_SESSION['level'] == 'admin') : ?>

                                        <!-- action untuk display detail transaksi -->
                                        <td class="text-center" style="color: #65B741;"><i class="fas fa-check"></i></td>

                                    <?php endif; ?>
                                    <!--  -->

                                    <!-- status untuk user ketika belum ada action  dari FA -->
                                    <?php if ($row['status'] == NULL && $_SESSION['level'] != 'admin') : ?>

                                        <td class="text-center" style="color: orange;"><i class="fas fa-clock"></i> Pending</td>

                                    <?php endif; ?>
                                    <!--  -->

                                    <!-- action ketika status masih pending dan approval untuk admin -->
                                    <?php if ($row['status'] == NULL && $_SESSION['level'] == 'admin') : ?>

                                        <td class="text-center"><a class="btn btn-sm btn-circle btn-primary" href="#approve_split" data-toggle="modal" onclick="submit(<?= $row['idbarang']; ?>)"><i class="fas fa-edit"></i></a></td>

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
                                <!-- <input type="hidden" name="kode_budget" class="form-control"> -->


                                <div class="row">

                                    <div class="col col-12">
                                        <ul class="list-group">
                                            <label for="">Reciever GR5</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Body Reciever :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="b_reciever" id="b_reciever" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">LED Jaringan :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="led_jaringan" id="led_jaringan" readonly>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Radio Antena :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="r_antena" id="r_antena" readonly>
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
                                                        <span class="input-group-text border-0">Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="b_internal" id="b_internal" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="b_charger" id="b_charger" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Power :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_power" id="t_power" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Port Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_port_battery" id="t_port_battery" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tutup Port USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_port_usb" id="t_port_usb" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="usb" id="usb" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Battery Slot :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="b_slot" id="b_slot" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tutup Adapter :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="ttp_adapter" id="ttp_adapter" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tombol Adapter :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tmbl_adapter" id="tmbl_adapter" readonly>
                                                </div>
                                            </li>

                                            <label for="">Remote Controller</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Body Remote :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="body_remote" id="body_remote" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Layar Display Remote :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="ld_remote" id="ld_remote" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="rc_internal_battery" id="rc_internal_battery" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pen Remote :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pen_remote" id="pen_remote" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tombol Keypad Remote :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_keypad_remote" id="t_keypad_remote" readonly>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Software Controller :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="s_controller" id="s_controller" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Sekrup Remote :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="skrup_remote" id="skrup_remote" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Mikro USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="p_mikro_usb" id="p_mikro_usb" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="p_usb" id="p_usb" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Memory Card :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="p_memory_card" id="p_memory_card" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="p_ci_battery" id="p_ci_battery" readonly>
                                                </div>
                                            </li>


                                            <label class="mt-2" for="">Tribach</label>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tribach :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tribach" id="tribach" readonly>
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
                                                        <span class="input-group-text border-0">Clamp / Pengunci :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="clamp" id="clamp" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Adaptor :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_adaptor" id="t_adaptor" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Nivo Bulat :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_nivo_bulat" id="t_nivo_bulat" readonly>
                                                </div>
                                            </li>

                                            <label class="mt-2" for="">Stick</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Stick :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stick" id="stick" readonly>
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

                    <input type="hidden" name="idbarang" class="form-control">
                    <input type="hidden" name="tggl" class="form-control">
                    <input type="hidden" name="tipe_alat" class="form-control">
                    <input type="hidden" name="nama" class="form-control">
                    <!-- <input type="hidden" name="trans_price2" class="form-control"> -->


                    <p class="text-center"><b>Silahkan pilih approve untuk setuju dan tolak untuk menolak P2H GPS Geodetic</b></p>

                    <div class="text-center">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="approved" checked>
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
                    <input class="btn btn-primary float-right" type="submit" name="ubah_stts_gps">

                </div>

            </form>
        </div>
    </div>
</div>