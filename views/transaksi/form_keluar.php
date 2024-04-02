<?php
hakAkses(['admin', 'user']);
?>


<script>
    function submit(x) {
        if (x == 'add') {
            // Detail awal..
            $('[name="nama_pengemudi"]').val("");
            $('[name="tggl_berangkat"]').val("");
            $('[name="km_awal"]').val("");
            $('[name="jenis_kendaraan"]').val("");
            $('[name="tujuan_perjalanan"]').val("");
            $('[name="nama_penumpang"]').val("");
            $('[name="catatan"]').val("");

            // $('#barangModal .modal-title').html('Tambah Barang');
            $('[name="ubah"]').hide();
            $('[name="input_skk"]').show();
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
            <h1 class="h3 mb-0 text-gray-800">FORM Kendaraan Keluar</h1>
        </div>

        <div class="row">

            <div class="col-md-6">

                <p>Silahkan Melengkapi Form Untuk Perjalanan Anda</p>

                <form class="formcoba" action="<?= base_url(); ?>process/act_skk.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <label for="text">Nama Pengemudi<font color="Red">*</font></label>

                        </select><select class="form-control select2" type="text" name="nama_pengemudi" id="nama_pengemudi" required>
                            <?php

                            $sau = "SELECT * FROM user ORDER BY name ASC";
                            $query2 = mysqli_query($con2, "$sau") or die('mysql_error');

                            // Loop melalui hasil query dan membuat pilihan dropdown
                            echo '<option value="">-- Pilih Nama / NIK --</option>';
                            while ($user_data = mysqli_fetch_array($query2)) {
                                if ($user_data['dep'] ==  strtoupper($_SESSION['dep'])) :
                                    echo '<option value="' . $user_data['name'] . '">' . $user_data['name'] . ' / ' . $user_data['nik'] . '</option>';
                                endif;
                            }

                            echo 'error';

                            ?>


                        </select>

                    </div>


                    <div class="form-group">

                        <label for="text">Tanggal Berangkat<font color="Red">*</font></label>

                        <input class="form-control" type="datetime-local" name="tggl_berangkat" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">KM Awal<font color="Red">*</font></label>

                        <input class="form-control" type="number" name="km_awal" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Jenis Kendaraan<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="jenis_kendaraan" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Tujuan Perjalanan<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="tujuan_perjalanan" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Nama Penumpang<font color="Red">*</font></label>

                        <textarea name="nama_penumpang" class="form-control" id="" rows="3"></textarea>

                    </div>

                    <div class="form-group">

                        <label for="nik">Catatan</label>

                        <input class="form-control" type="text" name="catatan" placeholder="Jawaban Anda" />

                    </div>

                    <input type="submit" class="btn btn-dark btn-block alert_notif" name="input_skk" value="Kirim" />

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