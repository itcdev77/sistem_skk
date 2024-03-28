<?php hakAkses(['admin', 'user']);
?>


<script>
    function submit(x) {
        if (x == 'add') {
            // kosong
        } else {
            $('#detailModal .modal-title').html('Detail Transaksi Split Budget');

            // Detail awal..
            $('[name="nama"]').val("");
            $('[name="tanggal"]').val("");
            $('[name="lokasi_kerja"]').val("");
            $('[name="pilih_drone"]').val("");
            $('[name="no_seri"]').val("");

            // titik yang ada keteranganya
            $('[name="antena_drone"]').val("");
            $('[name="penyangga_ponsel"]').val("");
            $('[name="tuas_kendali"]').val("");
            $('[name="tuas_kanan"]').val("");
            $('[name="tuas_kiri"]').val("");
            $('[name="stts_led"]').val("");
            $('[name="led_rth"]').val("");
            $('[name="t_power"]').val("");
            $('[name="t_rth"]').val("");
            $('[name="t_perekan_vidio"]').val("");
            $('[name="shutter"]').val("");
            $('[name="m_penerbangan"]').val("");
            $('[name="pmt"]').val("");
            $('[name="p_kamera"]').val("");
            $('[name="p_kemiringan"]').val("");
            $('[name="mikro_usb"]').val("");
            $('[name="p_usb"]').val("");
            $('[name="pengisi_daya"]').val("");
            $('[name="b_pesawat"]').val("");
            $('[name="penyangga_p"]').val("");
            $('[name="ib_pesawat"]').val("");
            $('[name="tp_pesawat"]').val("");
            $('[name="battry_indicator"]').val("");
            $('[name="mesin_props"]').val("");
            $('[name="Pengait_props"]').val("");
            $('[name="sekrup_props"]').val("");
            $('[name="per_baling_baling"]').val("");
            $('[name="baling_baling"]').val("");
            $('[name="gimbal"]').val("");
            $('[name="kbl_gimbal"]').val("");
            $('[name="k_lensa"]').val("");
            $('[name="pld_kamera"]').val("");
            $('[name="mikro_usb_pesawat"]').val("");
            $('[name="memory_pesawat"]').val("");
            $('[name="charger_pesawat"]').val("");
            $('[name="layar_display"]').val("");
            $('[name="charger_tab"]').val("");
            $('[name="dji_go"]').val("");


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
            $('[name="ket23"]').val("");
            $('[name="ket24"]').val("");
            $('[name="ket25"]').val("");
            $('[name="ket26"]').val("");
            $('[name="ket27"]').val("");
            $('[name="ket28"]').val("");
            $('[name="ket29"]').val("");
            $('[name="ket30"]').val("");
            $('[name="ket31"]').val("");
            $('[name="ket32"]').val("");
            $('[name="ket33"]').val("");
            $('[name="ket34"]').val("");
            $('[name="ket35"]').val("");
            $('[name="ket36"]').val("");
            $('[name="ket37"]').val("");
            $('[name="ket38"]').val("");


            $('[name="tambah"]').hide();
            $('[name="input_drone"]').show();

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
                    $('[name="deskripsi2"]').val(data.deskripsi2);
                    $('[name="price"]').val(data.price);
                    $('[name="price2"]').val(data.price2);
                    $('[name="stok"]').val(data.stok);
                    $('[name="stok2"]').val(data.stok2);
                    $('[name="kode_budget"]').val(data.kode_budget);
                    $('[name="kode_budget2"]').val(data.kode_budget2);
                    $('[name="ket"]').val(data.ket);
                    $('[name="departemen"]').val(data.departemen);
                    $('[name="stok_upd"]').val(data.stok_upd);
                    $('[name="stok_upd2"]').val(data.stok_upd2);
                    $('[name="waktu_trnsk"]').val(data.waktu_trnsk);
                    $('[name="trans_price1"]').val(data.trans_price1);
                    $('[name="trans_price2"]').val(data.trans_price2);
                    $('[name="jenis_trnsk"]').val(data.jenis_trnsk);
                    $('[name="price_perUnit"]').val(data.price_perUnit);
                    $('[name="price_perUnit2"]').val(data.price_perUnit2);
                    $('[name="split_price"]').val(data.split_price);

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
            <h1 class="h3 mb-0 text-gray-800">FORM P2H DRONE</h1>
        </div>

        <div class="row">

            <div class="col-md-6">

                <p>Sebuku Coal Group (Pemeliharaan dan Pemeriksaan Harian)</p>

                <form class="formcoba" action="<?= base_url(); ?>process/act_p2h.php" method="POST" enctype="multipart/form-data">

                    <div class="form-group">

                        <label for="text">Nama<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="nama" value="" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Tanggal<font color="Red">*</font></label>

                        <input class="form-control" type="datetime-local" name="tanggal" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="text">Lokasi Kerja<font color=h"Red">*</font></label>

                        <input class="form-control" type="text" name="lokasi_kerja" placeholder="Jawaban Anda" required />

                    </div>

                    <div class="form-group">

                        <label for="dep">Nama Drone<font color="Red">*</font> : </label>

                        <!-- <select class="form-control" name="pilih_drone" required />

                        <option disabled selected value>-Pilih-</option>

                        <option>DJI Mavic 3 Enterprise - M3E</option>

                        <option>Mavic 2 Pro</option>


                        </select> -->

                        </select><select class="form-control" type="text" name="pilih_drone" id="pilih_drone" required>
                            <?php

                            $sau = "SELECT * FROM aset_survey ORDER BY nama_aset ASC";
                            $query2 = mysqli_query($con, "$sau") or die('mysql_error');

                            // Loop melalui hasil query dan membuat pilihan dropdown
                            echo '<option value="">-- Pilih Drone --</option>';
                            while ($user_data = mysqli_fetch_array($query2)) {
                                if ($user_data['tipe_alat'] == 'Drone') :
                                    echo '<option value="' . $user_data['nama_aset'] . '">' . $user_data['nama_aset'] . '</option>';
                                endif;
                            }

                            echo 'error';

                            ?>


                        </select>

                    </div>

                    <div class="form-group">

                        <label for="text">S/N Alat<font color="Red">*</font></label>

                        <input class="form-control" type="text" name="no_seri" id="no_seri" placeholder="Jawaban Anda" readonly required />

                    </div>


                    <div class="form-group">

                        <label for="nik">Kondisi Alat<font color="Red">*</font> :</label>

                        <table class="table">

                            <tr valign="middle">

                                <th></th>

                                <th>Layak</th>

                                <th>Tidak<br>Layak</th>

                                <th>Keterangan</th>

                            </tr>

                            <tr>
                                <td colspan="4"><b><u>
                                            <h4>
                                                <font color='green'>Remote Control</font>
                                            </h4>
                                        </u></b></td>
                            </tr>

                            <td><label for="nik">1. Antena</label></td>

                            <td align="center"><input type="radio" name="antena_drone" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="antena_drone" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket1" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">2. Penyanggan Ponsel</label></td>

                            <td align="center"><input type="radio" name="penyangga_ponsel" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="penyangga_ponsel" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket2" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Tuas Kendali:</h5>
                                </td>
                            </tr>

                            </tr>

                            <td><label for="nik">3. Tuas Kendali</label></td>

                            <td align="center"><input type="radio" name="tuas_kendali" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="tuas_kendali" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket3" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">4. Tuas Kanan</label></td>

                            <td align="center"><input type="radio" name="tuas_kanan" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="tuas_kanan" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket4" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">5. Tuas Kiri</label></td>

                            <td align="center"><input type="radio" name="tuas_kiri" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="tuas_kiri" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket5" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">LED:</h5>
                                </td>
                            </tr>

                            </tr>

                            <td><label for="nik">6. Status LED & Daya Baterai</label></td>

                            <td align="center"><input type="radio" name="stts_led" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="stts_led" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket6" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">7. LED Rturn to Home (RTH)</label></td>

                            <td align="center"><input type="radio" name="led_rth" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="led_rth" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket7" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Tombol:</h5>
                                </td>
                            </tr>

                            </tr>

                            <td><label for="nik">8. Power</label></td>

                            <td align="center"><input type="radio" name="t_power" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="t_power" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket8" /></td>


                            </tr>

                            </tr>

                            <td><label for="nik">9. Rerutn to Home (RTH)</label></td>

                            <td align="center"><input type="radio" name="t_rth" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="t_rth" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket9" /></td>

                            </tr>

                            <td><label for="nik">10. Prekam Vidio</label></td>

                            <td align="center"><input type="radio" name="t_perekan_vidio" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="t_perekan_vidio" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket10" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">11. Shutter/Pengambil Foto</label></td>

                            <td align="center"><input type="radio" name="shutter" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="shutter" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket11" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">12. Mode Penerbangan</label></td>

                            <td align="center"><input type="radio" name="m_penerbangan" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="m_penerbangan" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket12" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">13. Penghenti Mode Terbang</label></td>

                            <td align="center"><input type="radio" name="pmt" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="pmt" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket13" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">14. Pengaturan Kamera</label></td>

                            <td align="center"><input type="radio" name="p_kamera" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="p_kamera" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket14" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">15. Pengaturan Kemiringan</label></td>

                            <td align="center"><input type="radio" name="p_kemiringan" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="p_kemiringan" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket15" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Port:</h5>
                                </td>
                            </tr>


                            </tr>

                            <td><label for="nik">16. Mikro USB</label></td>

                            <td align="center"><input type="radio" name="mikro_usb" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="mikro_usb" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket16" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">17. USB</label></td>

                            <td align="center"><input type="radio" name="p_usb" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="p_usb" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket17" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">18. Pengisi Daya</label></td>

                            <td align="center"><input type="radio" name="pengisi_daya" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="pengisi_daya" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket18" /></td>

                            </tr>

                            <tr>
                                <td colspan="4"><b><u>
                                            <h4>
                                                <font color='green'>Pesawat</font>
                                            </h4>
                                        </u></b></td>
                            </tr>

                            </tr>

                            <td><label for="nik">19. Body Pesawat</label></td>

                            <td align="center"><input type="radio" name="b_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="b_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket19" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">20. Penyangga Pesawat</label></td>

                            <td align="center"><input type="radio" name="penyangga_p" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="penyangga_p" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket20" /></td>

                            </tr>

                            </tr>

                            <td><label for="nik">21. Internal Battery</label></td>

                            <td align="center"><input type="radio" name="ib_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="ib_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket21" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">22. Tombol Power</label></td>

                            <td align="center"><input type="radio" name="tp_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="tp_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket22" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">23. LED Battery Indicator</label></td>

                            <td align="center"><input type="radio" name="battry_indicator" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="battry_indicator" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket23" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Baling - Baling (Propeller):</h5>
                                </td>
                            </tr>

                            </tr>

                            <td><label for="nik">24. Mesin Props</label></td>

                            <td align="center"><input type="radio" name="mesin_props" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="mesin_props" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket24" /></td>

                            </tr>


                            <td><label for="nik">25. Pengait Props</label></td>

                            <td align="center"><input type="radio" name="Pengait_props" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="Pengait_props" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket25" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">26. Sekrup/Baut Props</label></td>

                            <td align="center"><input type="radio" name="sekrup_props" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="sekrup_props" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket26" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">27. Per Baling - Baling</label></td>

                            <td align="center"><input type="radio" name="per_baling_baling" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="per_baling_baling" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket27" /></td>

                            </tr>
                            </tr>

                            <td><label for="nik">28. Baling - Baling (Propeller)</label></td>

                            <td align="center"><input type="radio" name="baling_baling" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="baling_baling" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket28" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">---------------------</h5>
                                </td>
                            </tr>

                            </tr>

                            <td><label for="nik">29. Gimbal</label></td>

                            <td align="center"><input type="radio" name="gimbal" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="gimbal" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket29" /></td>

                            </tr>
                            <td><label for="nik">30. Kabel Gimbal</label></td>

                            <td align="center"><input type="radio" name="kbl_gimbal" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="kbl_gimbal" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket30" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Kamera:</h5>
                                </td>
                            </tr>

                            </tr>
                            <td><label for="nik">31. Lensa</label></td>

                            <td align="center"><input type="radio" name="k_lensa" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="k_lensa" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket31" /></td>

                            </tr>
                            </tr>
                            <td><label for="nik">32. Pelindung Kamera</label></td>

                            <td align="center"><input type="radio" name="pld_kamera" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="pld_kamera" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket32" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">Port:</h5>
                                </td>
                            </tr>

                            </tr>
                            <td><label for="nik">33. Mikro USB</label></td>

                            <td align="center"><input type="radio" name="mikro_usb_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="mikro_usb_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket33" /></td>

                            </tr>
                            </tr>
                            <td><label for="nik">34. Memory Card</label></td>

                            <td align="center"><input type="radio" name="memory_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="memory_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket34" /></td>

                            </tr>

                            <tr>
                                <td>
                                    <h5 style="color: black;">----------------------</h5>
                                </td>
                            </tr>

                            </tr>
                            <td><label for="nik">35. Charger Internal Battery</label></td>

                            <td align="center"><input type="radio" name="charger_pesawat" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="charger_pesawat" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket35" /></td>

                            </tr>

                            <tr>
                                <td colspan="4"><b><u>
                                            <h4>
                                                <font color='green'>Tab / Layar</font>
                                            </h4>
                                        </u></b></td>
                            </tr>

                            </tr>
                            <td><label for="nik">36. Layar Display</label></td>

                            <td align="center"><input type="radio" name="layar_display" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="layar_display" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket36" /></td>

                            </tr>
                            </tr>
                            <td><label for="nik">37. Charger Tab</label></td>

                            <td align="center"><input type="radio" name="charger_tab" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="charger_tab" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket37" /></td>

                            </tr>
                            </tr>
                            <td><label for="nik">38. Program Aplikasi DJI GO</label></td>

                            <td align="center"><input type="radio" name="dji_go" value="Layak " required /></td>

                            <td align="center"><input type="radio" name="dji_go" value="Tidak Layak / " /></td>

                            <td align="center"><input class="form-control" type="text" name="ket38" /></td>

                            </tr>


                        </table>

                        <!-- end of table -->

                    </div>

                    <div class="form-group">

                        <label for="nik">Catatan</label>

                        <input class="form-control" type="text" name="catatan" placeholder="Jawaban Anda" />

                    </div>

                    <input type="submit" class="btn btn-success btn-block alert_notif" name="input_drone" value="Kirim" />

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

                                    <div class="col col-6">
                                        <ul class="list-group">
                                            <label for="">Detail Barang 1</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Code 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="kode_budget" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Deskripsi 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="deskripsi" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT UNT 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price_perUnit" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">QTY :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stok" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="col col-6">
                                        <ul class="list-group">
                                            <label for="">Detail Barang 2</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Code 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="kode_budget2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Deskripsi 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="deskripsi2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT UNT 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price_perUnit2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">QTY 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stok2" id="kode_budget" readonly>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>

                                    <div class="col col-6 mt-3">
                                        <ul class="list-group">
                                            <label for="">Detail Transaksi 1</label>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-arrow-down" style="color: red"></i>Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="trans_price1" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-minus" style="color:#EF4040"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="split_price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col col-6 mt-3">
                                        <ul class="list-group">
                                            <label for="">Detail Transaksi 2</label>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-arrow-up" style="color: green"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="trans_price2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-plus" style="color:#8ADAB2"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="split_price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col col-12 mt-3">
                                        <ul class="list-group">
                                            <label for="">Keterangan</label>
                                            <li class="list-group-item">
                                                <div class="input-group">

                                                    <input type="text" class="form-control border-0" name="ket" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>


                    </div>
                    <hr class="sidebar-divider">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-times"></i>
                        Batal</button>
                    <button class="btn btn-primary float-right" type="submit" name="ubah"><i class="fas fa-save"></i>
                        Ubah</button>

                </div>
            </form>
        </div>
    </div>
</div>


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

                                    <div class="col col-6">
                                        <ul class="list-group">
                                            <label for="">Detail Barang 1</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Code 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="kode_budget" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Deskripsi 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="deskripsi" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT UNT 1 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price_perUnit" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">QTY :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stok" id="kode_budget" readonly>
                                                </div>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="col col-6">
                                        <ul class="list-group">
                                            <label for="">Detail Barang 2</label>

                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Code 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="kode_budget2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">Deskripsi 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="deskripsi2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">BGT UNT 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="price_perUnit2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0">QTY 2 :</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="stok2" id="kode_budget" readonly>
                                                </div>
                                            </li>


                                        </ul>
                                    </div>

                                    <div class="col col-6 mt-3">
                                        <ul class="list-group">
                                            <label for="">Detail Transaksi 1</label>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-arrow-down" style="color: red"></i>Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="trans_price1" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-minus" style="color:#EF4040"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="split_price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col col-6 mt-3">
                                        <ul class="list-group">
                                            <label for="">Detail Transaksi 2</label>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-arrow-up" style="color: green"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="trans_price2" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="input-group">
                                                    <div class="input-group-prepend ">
                                                        <span class="input-group-text border-0"><i class="fas fa-plus" style="color:#8ADAB2"></i> Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control border-0" name="split_price" id="kode_budget" readonly>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col col-12 mt-3">
                                        <ul class="list-group">
                                            <label for="">Keterangan</label>
                                            <li class="list-group-item">
                                                <div class="input-group">

                                                    <input type="text" class="form-control border-0" name="ket" id="kode_budget" readonly>
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
            <form action="<?= base_url(); ?>process/act_prodev.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- modal body -->
                <div class="modal-body">

                    <input type="hidden" name="trans_price1" class="form-control">
                    <input type="hidden" name="trans_price2" class="form-control">

                    <p class="text-center"><b>Silahkan pilih approve transaksi untuk setuju dan tolak untuk menolak transaksi</b></p>

                </div>

                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tolak</button>
                    <button class="btn btn-primary float-right" type="submit" name="ubah">
                        Approve</button>
                </div>

            </form>
        </div>
    </div>
</div>