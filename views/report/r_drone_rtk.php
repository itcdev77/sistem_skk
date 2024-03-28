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
                url: '<?= base_url(); ?>process/view_drone_rtk.php',
                dataType: 'json',
                success: function(data) {

                    $('[name="idbarang"]').val(data.idbarang);
                    $('[name="tggl"]').val(data.tggl);
                    $('[name="nama_drone"]').val(data.nama_drone);
                    $('[name="nama"]').val(data.nama);
                    $('[name="cttn_atasan"]').val(data.cttn_atasan);

                    // titik yang ada keteranganya

                    $('[name="rc_antena"]').val(data.rc_antena);
                    $('[name="rc_penyangga_ponsel"]').val(data.rc_penyangga_ponsel);
                    $('[name="tk_tuas_kendali"]').val(data.tk_tuas_kendali);
                    $('[name="tk_tuas_kanan"]').val(data.tk_tuas_kanan);
                    $('[name="tk_tuas_kiri"]').val(data.tk_tuas_kiri);
                    $('[name="stts_led_daya_bt"]').val(data.stts_led_daya_bt);
                    $('[name="led_rth"]').val(data.led_rth);
                    $('[name="t_power"]').val(data.t_power);
                    $('[name="t_rth"]').val(data.t_rth);
                    $('[name="perekam_vidio"]').val(data.perekam_vidio);
                    $('[name="t_shutter"]').val(data.t_shutter);
                    $('[name="t_mode_terbang"]').val(data.t_mode_terbang);
                    $('[name="t_stop_mt"]').val(data.t_stop_mt);
                    $('[name="pengaturan_kamera"]').val(data.pengaturan_kamera);
                    $('[name="p_kemiringan"]').val(data.p_kemiringan);
                    $('[name="port_mikro_usb"]').val(data.port_mikro_usb);
                    $('[name="p_usb"]').val(data.p_usb);
                    $('[name="pengisi_daya"]').val(data.pengisi_daya);
                    $('[name="body_pesawat"]').val(data.body_pesawat);
                    $('[name="penyangga_pesawat"]').val(data.penyangga_pesawat);
                    $('[name="pesawat_ib"]').val(data.pesawat_ib);
                    $('[name="pesawat_tp"]').val(data.pesawat_tp);
                    $('[name="pesawat_led_bt_indicator"]').val(data.pesawat_led_bt_indicator);
                    $('[name="mesin_props"]').val(data.mesin_props);
                    $('[name="Pengait_props"]').val(data.Pengait_props);
                    $('[name="pengait_props"]').val(data.pengait_props);
                    $('[name="sekrup_props"]').val(data.sekrup_props);
                    $('[name="per_baling2"]').val(data.per_baling2);
                    $('[name="balling2"]').val(data.balling2);
                    $('[name="gimbal"]').val(data.gimbal);
                    $('[name="kabel_gimbal"]').val(data.kabel_gimbal);
                    $('[name="lensa"]').val(data.lensa);
                    $('[name="pelingdung_kam"]').val(data.pelingdung_kam);
                    $('[name="mikro_usb_pesawat"]').val(data.mikro_usb_pesawat);
                    $('[name="memory_card_pesawat"]').val(data.memory_card_pesawat);
                    $('[name="ci_battery_pesawat"]').val(data.ci_battery_pesawat);
                    $('[name="layar_display"]').val(data.layar_display);
                    $('[name="charger_tab"]').val(data.charger_tab);
                    $('[name="dji_go"]').val(data.dji_go);
                    $('[name="ib_reciever"]').val(data.ib_reciever);
                    $('[name="reciever_tripod"]').val(data.reciever_tripod);
                    $('[name="reviever_tribach"]').val(data.reviever_tribach);
                    $('[name="reviever_cb"]').val(data.reviever_cb);


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
        <h1 class="h3 mb-0 text-gray-800">Report P2H Drone RTK</h1>
    </div>
</div>

<div class="container-fluid">

    <!-- DataTales Example -->


    <form action="<?= base_url(); ?>/process/ex_drone_rtk.php" method="post" target="_blank">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tanggal_awal">Tanggal Awal</label>
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="<?= date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="tanggal_akhir">Tanggal Akhir</label>
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="<?= date('Y-m-d'); ?>">
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
                            <th width="100">Nama Drone RTK</th>
                            <th width="100">No Seri Drone RTK</th>
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
                        $query = mysqli_query($con, "SELECT * FROM drone_rtk  ORDER BY idbarang DESC") or die(mysqli_error($con));

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
                                    <td><?= $row['lokasi_kerja']; ?></td>
                                    <td><?= $row['nama_drone']; ?></td>
                                    <td><?= $row['sn_alat']; ?></td>
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
                                <input type="hidden" name="kode_budget" class="form-control">


                                <div class="row">

                                    <div class="col col-12">
                                        <ul class="list-group">
                                            <label for="">Remote Controll</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Antena :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="rc_antena" id="rc_antena" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Penyanggan Ponsel :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="rc_penyangga_ponsel" id="rc_penyangga_ponsel" readonly>
                                                </div>
                                            </li>


                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tuas Kendali :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tk_tuas_kendali" id="tk_tuas_kendali" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tuas Kanan :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tk_tuas_kanan" id="tk_tuas_kanan" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tuas Kiri :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="tk_tuas_kiri" id="tk_tuas_kiri" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Status LED & Daya Baterai :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stts_led_daya_bt" id="stts_led_daya_bt" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">LED Rturn to Home (RTH) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="led_rth" id="led_rth" readonly>
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
                                                        <span class="input-group-text border-0">Rerutn to Home (RTH) :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_rth" id="t_rth" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Prekam Vidio :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="perekam_vidio" id="perekam_vidio" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Shutter/Pengambil Foto :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_shutter" id="t_shutter" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Mode Penerbangan :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_mode_terbang" id="t_mode_terbang" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Penghenti Mode Terbang :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="t_stop_mt" id="t_stop_mt" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pengaturan Kamera :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pengaturan_kamera" id="pengaturan_kamera" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pengaturan Kemiringan :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="p_kemiringan" id="p_kemiringan" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Mikro USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="port_mikro_usb" id="port_mikro_usb" readonly>
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
                                                        <span class="input-group-text border-0">Pengisi Daya :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pengisi_daya" id="pengisi_daya" readonly>
                                                </div>
                                            </li>

                                            <label class="mt-2" for="">Pesawat</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Body Pesawat :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="body_pesawat" id="body_pesawat" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Penyangga Pesawat :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="penyangga_pesawat" id="penyangga_pesawat" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pesawat_ib" id="pesawat_ib" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tombol Power :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pesawat_tp" id="pesawat_tp" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">LED Battery Indicator :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pesawat_led_bt_indicator" id="pesawat_led_bt_indicator" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Mesin Props :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="mesin_props" id="mesin_props" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Pengait Props :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pengait_props" id="pengait_props" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Sekrup/Baut Props :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="sekrup_props" id="sekrup_props" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Per Baling - Baling :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="per_baling2" id="per_baling2" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Baling - Baling :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="balling2" id="balling2" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Gimbal :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="gimbal" id="gimbal" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Kabel Gimbal :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="kabel_gimbal" id="kabel_gimbal" readonly>
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
                                                        <span class="input-group-text border-0">Pelindung Kamera :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="pelingdung_kam" id="pelingdung_kam" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Mikro USB :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="mikro_usb_pesawat" id="mikro_usb_pesawat" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Memory Card :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="memory_card_pesawat" id="memory_card_pesawat" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="ci_battery_pesawat" id="ci_battery_pesawat" readonly>
                                                </div>
                                            </li>

                                            <label class="mt-2" for="">Tab / Layar</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Layar Display :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="layar_display" id="layar_display" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Tab :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="charger_tab" id="charger_tab" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Program Aplikasi DJI GO :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="dji_go" id="dji_go" readonly>
                                                </div>
                                            </li>

                                            <label class="mt-2" for="">Reciever</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Internal Battery :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="ib_reciever" id="ib_reciever" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tripod :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="reciever_tripod" id="reciever_tripod" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Tribach APS :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="reviever_tribach" id="reviever_tribach" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Charger Battry :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="reviever_cb" id="reviever_cb" readonly>
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

                    <!-- data yang di lempar agar bisa dilihat dalam email notifikasi -->
                    <input type="hidden" name="idbarang" class="form-control">
                    <input type="hidden" name="tggl" class="form-control">
                    <input type="hidden" name="nama_drone" class="form-control">
                    <input type="hidden" name="nama" class="form-control">

                    <p class="text-center"><b>Silahkan pilih approve untuk setuju dan tolak untuk menolak P2H Drone RTK</b></p>

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
                    <input class="btn btn-primary float-right" type="submit" name="ubah_stts_drone_rtk">

                </div>

            </form>
        </div>
    </div>
</div>