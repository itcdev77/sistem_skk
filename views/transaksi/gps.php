<?php hakAkses(['admin', 'user']); ?>


<script>
    function submit(x) {
        if (x == 'add') {
            // Detail awal..
            $('[name="nama"]').val("");
            $('[name="tanggal"]').val("");
            $('[name="lokasi_kerja"]').val("");
            $('[name="pilih_total_station"]').val("");
            $('[name="no_seri"]').val("");
            $('[name="j_kalibrasi"]').val("");

            // titik yang ada keteranganya
            $('[name="box_alat"]').val("");
            $('[name="internal_battery"]').val("");
            $('[name="charger_battery"]').val("");
            $('[name="extension"]').val("");
            $('[name="sumbuh_vertikal"]').val("");
            $('[name="sumbuh_horizontal"]').val("");
            $('[name="lensa_obyektif"]').val("");
            $('[name="lensa_okuler"]').val("");
            $('[name="p_fokus"]').val("");
            $('[name="c_v&h"]').val("");
            $('[name="ph_v&h"]').val("");
            $('[name="sc_lensa"]').val("");
            $('[name="sc_pf"]').val("");
            $('[name="nt_pl"]').val("");
            $('[name="nb_cl"]').val("");
            $('[name="s_abc"]').val("");
            $('[name="t_keypad"]').val("");
            $('[name="laser"]').val("");
            $('[name="m_roll"]').val("");
            $('[name="t_statif"]').val("");
            $('[name="t_aps"]').val("");
            $('[name="stick_pogo"]').val("");
            $('[name="prisma_topo"]').val("");

            //catatan
            $('[name="catatan"]').val("");

            // keterangan 1 - 21
            $('[name="ket1"]').val("");
            $('[name="ket2"]').val("");
            $('[name="ket3"]').val("");
            $('[name="ket4"]').val("");
            $('[name="ket5"]').val("");
            $('[name="ket6"]').val("");
            $('[name="ket7"]').val("");
            $('[name="ket8"]').val("");
            $('[name="ket9"]').val("");
            $('[name="ket10"]').val("");
            $('[name="ket11"]').val("");
            $('[name="ket12"]').val("");
            $('[name="ket13"]').val("");
            $('[name="ket14"]').val("");
            $('[name="ket15"]').val("");
            $('[name="ket16"]').val("");
            $('[name="ket17"]').val("");
            $('[name="ket18"]').val("");
            $('[name="ket19"]').val("");
            $('[name="ket20"]').val("");
            $('[name="ket21"]').val("");
            $('[name="ket22"]').val("");

            // $('#barangModal .modal-title').html('Tambah Barang');
            $('[name="ubah"]').hide();
            $('[name="input_total_station"]').show();
        } else {
            $('#detailModal .modal-title').html('Detail Transaksi Price Per Unit');



            $('[name="tambah"]').hide();
            $('[name="ubah"]').show();

            $.ajax({
                type: "POST",
                data: {
                    id: x
                },
                url: '<?= base_url(); ?>process/view_prodev.php',
                dataType: 'json',
                success: function(data) {

                    // var formattedPrice = 'Rp. ' + data.price;

                    $('[name="idbarang"]').val(data.idbarang);
                    $('[name="merek_id"]').val(data.merek_id).trigger('change');
                    $('[name="kategori_id"]').val(data.kategori_id).trigger('change');
                    $('[name="deskripsi"]').val(data.deskripsi);
                    $('[name="price"]').val(data.price);
                    $('[name="stok"]').val(data.stok);
                    $('[name="kode_budget"]').val(data.kode_budget);
                    $('[name="ket"]').val(data.ket);
                    $('[name="departemen"]').val(data.departemen);
                    $('[name="stok_upd"]').val(data.stok_upd);
                    $('[name="di_ambil"]').val(data.di_ambil);
                    $('[name="waktu_trnsk"]').val(data.waktu_trnsk);

                    //split budget
                    // $('[name="split"]').val(data.split);
                    // $('[name="split-budget"]').val(data.split_budget);
                }
            });
        }
    }
</script>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="container">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">FORM Kendaraan Kembali</h1>
        </div>

        <div class="row">

            <div class="col-md-6">

                <p>Silahkan Melengkapi Form Untuk Perjalanan Anda</p>

                <form class="formcoba" action="<?= base_url(); ?>process/act_p2h.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <label for="text">Nama Pengemudi<font color="Red">*</font></label>

                        </select><select class="form-control select2" type="text" name="nama" id="pilih_total_station" required>
                            <?php

                            $sau = "SELECT * FROM user ORDER BY name ASC";
                            $query2 = mysqli_query($con2, "$sau") or die('mysql_error');

                            // Loop melalui hasil query dan membuat pilihan dropdown
                            echo '<option value="">-- Pilih Nama --</option>';
                            while ($user_data = mysqli_fetch_array($query2)) {
                                // if ($user_data['name'] == 'Total Station') :
                                echo '<option value="' . $user_data['name'] . '">' . $user_data['name'] . ' / ' . $user_data['nik'] . '</option>';
                                // endif;
                            }

                            echo 'error';

                            ?>


                        </select>

                    </div>

                    <div class="form-group">

                        <label for="text">Tanggal Berangkat<font color="Red">*</font></label>

                        <input class="form-control" type="datetime-local" name="tanggal" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">KM Awal<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="lokasi_kerja" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Jenis Kendaraan<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="lokasi_kerja" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Tujuan Perjalanan<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="lokasi_kerja" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Nama Penumpang<font color="Red">*</font></label>

                        <textarea class="form-control" id="" rows="3"></textarea>

                    </div>

                    <!-- <div class="form-group">

                        <label for="dep">Pilih Total Station<font color="Red">*</font> : </label>


                        </select><select class="form-control" type="text" name="pilih_total_station" id="pilih_total_station" required>
                            <?php

                            $sau = "SELECT * FROM aset_survey ORDER BY nama_aset ASC";
                            $query2 = mysqli_query($con, "$sau") or die('mysql_error');

                            // Loop melalui hasil query dan membuat pilihan dropdown
                            echo '<option value="">-- Pilih Total Station --</option>';
                            while ($user_data = mysqli_fetch_array($query2)) {
                                if ($user_data['tipe_alat'] == 'Total Station') :
                                    echo '<option value="' . $user_data['nama_aset'] . '">' . $user_data['nama_aset'] . '</option>';
                                endif;
                            }

                            echo 'error';

                            ?>


                        </select>

                    </div> -->
                    <!-- 
                    <div class="form-group">

                        <label for="text">S/N Alat<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="no_seri" id="no_seri" placeholder="Jawaban Anda" required readonly />

                    </div> -->



                    <div class="form-group">

                        <label for="nik">Catatan</label>

                        <input class="form-control" type="text" name="catatan" placeholder="Jawaban Anda" />

                    </div>

                    <input type="submit" class="btn btn-success btn-block alert_notif" name="input_total_station" value="Kirim" />

                    <br><br><br><br><br>

                </form>

            </div>

        </div>

    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal View Detail -->

<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
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
                                    <div class="col-md-6">
                                        <label for="deskripsi">Kode Budget:</label>
                                        <input width="20" type="text" class="form-control" name="kode_budget" id="kode_budget" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="deskripsi">Deskripsi:</label>
                                        <input width="20" type="text" class="form-control" name="deskripsi" id="deskripsi" readonly>
                                    </div>

                                    <div class="col-md-6 mt-3">
                                        <label for="price"><span style="color: red;">Budget :</span></label>
                                        <input type="number" class="form-control" name="price" id="ambil-price" readonly>
                                    </div>

                                    <div class="col-md-3 mt-3">
                                        <label for="stok">Qty Sebelumnya:</label>

                                        <input type="number" class="form-control text-center" name="stok_upd" id="ambil-stok" readonly>

                                    </div>
                                    <div class="col-md-2 mt-3">
                                        <label for="stok">Qty Update:</label>

                                        <input type="number" class="form-control text-center" name="stok" id="ambil-stok" readonly>

                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="stok">Jumlah Transaksi:</label>

                                        <input type="number" class="form-control text-center" name="di_ambil" id="di_ambil" readonly>

                                    </div>
                                    <div class="col-md-3 mt-3">
                                        <label for="stok">Waktu Transaksi:</label>

                                        <input type="text" class="form-control text-center" name="waktu_trnsk" id="waktu_trnsk" readonly>

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