<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Keluar</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body bg-danger text-white">Anda yakin ingin keluar dari aplikasi ?</div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-sm btn-danger" href="<?= base_url(); ?>process/logout.php"><i class="fas fa-sign-out-alt"></i>
                    Iya, Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Ganti Password Modal-->
<div class="modal fade" id="gantiPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url(); ?>process/users.php?act=<?= encrypt('ganti_pass'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="text-black">Password Baru</label>
                        <input type="hidden" name="id" value="<?= $_SESSION['iduser']; ?>">
                        <input type="password" name="password" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-sm btn-success" type="submit" name="ubah_pass"><i class="fas fa-key"></i>
                        Ganti Password</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/jquery-mask/jquery-mask.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/sweet-alert/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/datatables-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/sweet-alert.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: "classic",
        });
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });
    })
</script>

<!-- Include SweetAlert library (you can use a CDN) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.1/dist/sweetalert2.all.min.js"></script>


<!-- Chart JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<!-- script untuk datetime di modal report -->

<script>
    // Mendapatkan elemen input datetime
    var datetimeInput = document.getElementById('datetime');

    // Mendapatkan tanggal dan jam saat ini
    var sekarang = new Date();

    // Format tanggal menjadi YYYY-MM-DD
    var tahun = sekarang.getFullYear();
    var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
    var tanggal = sekarang.getDate().toString().padStart(2, '0');

    // Format jam menjadi HH:MM
    var jam = sekarang.getHours().toString().padStart(2, '0');
    var menit = sekarang.getMinutes().toString().padStart(2, '0');

    // Gabungkan tanggal dan jam
    var datetimeFormatted = tahun + '-' + bulan + '-' + tanggal + 'T' + jam + ':' + menit;

    // Set nilai elemen input
    datetimeInput.value = datetimeFormatted;
</script>

<script>
    // Mendapatkan elemen input datetime
    var datetimeInput = document.getElementById('datetime2');

    // Mendapatkan tanggal dan jam saat ini
    var sekarang = new Date();

    // Format tanggal menjadi YYYY-MM-DD
    var tahun = sekarang.getFullYear();
    var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
    var tanggal = sekarang.getDate().toString().padStart(2, '0');

    // Format jam menjadi HH:MM
    var jam = sekarang.getHours().toString().padStart(2, '0');
    var menit = sekarang.getMinutes().toString().padStart(2, '0');

    // Gabungkan tanggal dan jam
    var datetimeFormatted = tahun + '-' + bulan + '-' + tanggal + 'T' + jam + ':' + menit;

    // Set nilai elemen input
    datetimeInput.value = datetimeFormatted;
</script>

<script>
    // Mendapatkan elemen input datetime
    var datetimeInput = document.getElementById('datetime3');

    // Mendapatkan tanggal dan jam saat ini
    var sekarang = new Date();

    // Format tanggal menjadi YYYY-MM-DD
    var tahun = sekarang.getFullYear();
    var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
    var tanggal = sekarang.getDate().toString().padStart(2, '0');

    // Format jam menjadi HH:MM
    var jam = sekarang.getHours().toString().padStart(2, '0');
    var menit = sekarang.getMinutes().toString().padStart(2, '0');

    // Gabungkan tanggal dan jam
    var datetimeFormatted = tahun + '-' + bulan + '-' + tanggal + 'T' + jam + ':' + menit;

    // Set nilai elemen input
    datetimeInput.value = datetimeFormatted;
</script>

<script>
    // Mendapatkan elemen input datetime
    var datetimeInput = document.getElementById('datetime4');

    // Mendapatkan tanggal dan jam saat ini
    var sekarang = new Date();

    // Format tanggal menjadi YYYY-MM-DD
    var tahun = sekarang.getFullYear();
    var bulan = (sekarang.getMonth() + 1).toString().padStart(2, '0');
    var tanggal = sekarang.getDate().toString().padStart(2, '0');

    // Format jam menjadi HH:MM
    var jam = sekarang.getHours().toString().padStart(2, '0');
    var menit = sekarang.getMinutes().toString().padStart(2, '0');

    // Gabungkan tanggal dan jam
    var datetimeFormatted = tahun + '-' + bulan + '-' + tanggal + 'T' + jam + ':' + menit;

    // Set nilai elemen input
    datetimeInput.value = datetimeFormatted;
</script>

<script>
    // Fungsi untuk menampilkan modal
function showModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "block";
}

// Fungsi untuk menyembunyikan modal
function hideModal() {
  var modal = document.getElementById("modal");
  modal.style.display = "none";
}

// Event listener untuk tombol cetak
document.querySelector('[name="printButton"]').addEventListener("click", function() {
  showModal();
  window.print(); // Cetak saat tombol cetak ditekan
  hideModal(); // Sembunyikan modal setelah pencetakan selesai
});


</script>


<!-- end of datetime -->




<!-- SCRIPT UNTUK FUNGSI SPLIT BUDGET -->

<!-- script untuk total station -->

<script>
    $(document).ready(function() {
        // Menangani perubahan pada pilihan barang
        $('#pilih_total_station').change(function() {
            var merekId = $(this).val(); // Mengambil nilai merek_id yang dipilih

            // Mengambil base URL secara dinamis
            // var baseUrl = window.location.origin;

            // Mengirim permintaan AJAX
            $.ajax({
                type: 'POST',
                url: './views/transaksi/get_total_station.php',
                data: {
                    merek_id: merekId
                },
                dataType: 'json', // Menetapkan tipe data yang diharapkan
                success: function(response) {
                    // Menetapkan nilai harga ke input dengan id 'split2'
                    $('#no_seri').val(response.no_seri);

                }
            });
        });
    });
</script>

<!-- script untuk drone -->

<script>
    $(document).ready(function() {
        // Menangani perubahan pada pilihan barang
        $('#pilih_drone').change(function() {
            var merekId = $(this).val(); // Mengambil nilai merek_id yang dipilih

            // Mengambil base URL secara dinamis
            // var baseUrl = window.location.origin;

            // Mengirim permintaan AJAX
            $.ajax({
                type: 'POST',
                url: './views/transaksi/get_drone.php',
                data: {
                    merek_id: merekId
                },
                dataType: 'json', // Menetapkan tipe data yang diharapkan
                success: function(response) {
                    // Menetapkan nilai harga ke input dengan id 'split2'
                    $('#no_seri').val(response.no_seri);

                }
            });
        });
    });
</script>

<!-- script untuk drone RTK -->

<script>
    $(document).ready(function() {
        // Menangani perubahan pada pilihan barang
        $('#pilih_drone_rtk').change(function() {
            var merekId = $(this).val(); // Mengambil nilai merek_id yang dipilih

            // Mengambil base URL secara dinamis
            // var baseUrl = window.location.origin;

            // Mengirim permintaan AJAX
            $.ajax({
                type: 'POST',
                url: './views/transaksi/get_drone_rtk.php',
                data: {
                    merek_id: merekId
                },
                dataType: 'json', // Menetapkan tipe data yang diharapkan
                success: function(response) {
                    // Menetapkan nilai harga ke input dengan id 'split2'
                    $('#no_seri').val(response.no_seri);

                }
            });
        });
    });
</script>


<!-- script untuk drone RTK -->

<script>
    $(document).ready(function() {
        // Menangani perubahan pada pilihan barang
        $('#pilih_gps').change(function() {
            var merekId = $(this).val(); // Mengambil nilai merek_id yang dipilih

            // Mengambil base URL secara dinamis
            // var baseUrl = window.location.origin;

            // Mengirim permintaan AJAX
            $.ajax({
                type: 'POST',
                url: './views/transaksi/get_gps.php',
                data: {
                    merek_id: merekId
                },
                dataType: 'json', // Menetapkan tipe data yang diharapkan
                success: function(response) {
                    // Menetapkan nilai harga ke input dengan id 'split2'
                    $('#no_seri').val(response.no_seri);

                }
            });
        });
    });
</script>



<script>
    $(document).ready(function() {
        // Menangani peristiwa ketika tombol "Ambil BGT" diklik
        $("#ambilBGT").click(function() {
            // Mendapatkan nilai dari input Ambil Budget
            var ambilBudgetValue = parseFloat($("#ambilBudget").val());

            // Validasi bahwa nilai yang dimasukkan adalah angka yang valid
            if (!isNaN(ambilBudgetValue)) {
                // konfirmasi untuk sweet alert...
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Anda yakin ingin mengambil budget ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mendapatkan nilai saat ini dari input BGT dengan id price_budget
                        var currentPriceBudgetValue = parseFloat($("#price_budget").val());

                        // Mengurangkan nilai Ambil Budget dari nilai saat ini di input BGT
                        var newPriceBudgetValue = currentPriceBudgetValue - ambilBudgetValue;

                        // Menambahkan nilai baru ke input BGT dengan id price_budget
                        $("#price_budget").val(newPriceBudgetValue);

                        // Mendapatkan nilai saat ini dari input BGT dengan id split2
                        var currentSplit2Value = parseFloat($("#split2").val());

                        // Menambahkan nilai Ambil Budget ke nilai saat ini di input BGT dengan id split2
                        var newSplit2Value = currentSplit2Value + ambilBudgetValue;

                        // Menambahkan nilai baru ke input BGT dengan id split2
                        $("#split2").val(newSplit2Value);

                        Swal.fire('Berhasil!', 'Budget telah diambil, Lihat detail transaksi.', 'success');
                    }
                });
            } else {
                // Menampilkan pesan kesalahan jika nilai yang dimasukkan bukan angka valid
                Swal.fire('Error', 'Masukkan angka yang valid.', 'error');
            }
        });
    });
</script>



<!-- end of logic split -->
<script></script>

<!-- END OF SCRIPT FUNGSI SPLIT BUDGET -->


<!-- Chart JS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Custom scripts for all pages-->
<!-- <script src="<?= base_url(); ?>core2/js/sb-admin-2.min.js"></script> -->

<!-- Page level plugins -->
<script src="<?= base_url(); ?>core2/vendor/chart.js/Chart.min.js"></script>



<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }



    // Untuk chart Total Station
    var ctx = document.getElementById("myAreaChart1");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM total_station WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                while ($user_data = mysqli_fetch_array($query)) {
                    echo '"' . $user_data['tahun_bulan'] . '",';
                }
                ?>
            ],
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM total_station WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                    $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                    while ($user_data = mysqli_fetch_array($query)) {
                        echo '"' . $user_data['jumlah_bulanan'] . '",';
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' Laporan';
                    }
                }
            }
        }
    });


    // Untuk chart Drone
    var ctx = document.getElementById("myAreaChart2");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM drone WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                while ($user_data = mysqli_fetch_array($query)) {
                    echo '"' . $user_data['tahun_bulan'] . '",';
                }
                ?>
            ],
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM drone WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                    $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                    while ($user_data = mysqli_fetch_array($query)) {
                        echo '"' . $user_data['jumlah_bulanan'] . '",';
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' Laporan';
                    }
                }
            }
        }
    });

    // Untuk chart Drone RTK
    var ctx = document.getElementById("myAreaChart3");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM drone_rtk WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                while ($user_data = mysqli_fetch_array($query)) {
                    echo '"' . $user_data['tahun_bulan'] . '",';
                }
                ?>
            ],
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM drone_rtk WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                    $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                    while ($user_data = mysqli_fetch_array($query)) {
                        echo '"' . $user_data['jumlah_bulanan'] . '",';
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' Laporan';
                    }
                }
            }
        }
    });

    // Untuk chart GPS Geodetik
    var ctx = document.getElementById("myAreaChart4");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php
                $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM gps_geodetic WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                while ($user_data = mysqli_fetch_array($query)) {
                    echo '"' . $user_data['tahun_bulan'] . '",';
                }
                ?>
            ],
            datasets: [{
                label: "Earnings",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: [
                    <?php
                    $sq1i2 = "SELECT CAST(tggl AS varchar(10)) AS tahun_bulan, COUNT(*) AS jumlah_bulanan FROM gps_geodetic WHERE tggl > DATE(NOW() - INTERVAL 6 DAY) GROUP BY CAST(tggl AS varchar(10)) ORDER BY `tahun_bulan` ASC;";
                    $query = mysqli_query($con, $sq1i2) or die(mysqli_error($con));
                    while ($user_data = mysqli_fetch_array($query)) {
                        echo '"' . $user_data['jumlah_bulanan'] . '",';
                    }
                    ?>
                ],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        // Include a dollar sign in the ticks
                        callback: function(value, index, values) {
                            return '' + number_format(value);
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + ' Laporan';
                    }
                }
            }
        }
    });
</script>



<!-- Pie Chart -->

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito',
        '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example

    // Pie Chart Example
    var ctx = document.getElementById("myPieChart1");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            <?php
            $sq1i2 = "SELECT tipe_alat, COUNT(*) as total FROM total_station where tggl>=CURRENT_DATE() GROUP BY tipe_alat;";
            $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

            ?>
            labels: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                            echo '"' . $user_data['tipe_alat'] . '",';
                        } ?>],
            datasets: [{
                data: [
                    <?php
                    $sq1i2 = "SELECT tipe_alat, COUNT(*) as total FROM total_station where tggl>=CURRENT_DATE() GROUP BY tipe_alat;";
                    $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

                    while ($user_data = mysqli_fetch_array($query2)) {
                        $jumlah_laki = mysqli_query($con, "select * from total_station where tggl>=CURRENT_DATE() and tipe_alat='$user_data[tipe_alat]';");
                        echo mysqli_num_rows($jumlah_laki) . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', ],
                hoverBackgroundColor: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                                            echo '"#4e73df",';
                                        } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });


    // Pie Chart Untuk Drone
    var ctx = document.getElementById("myPieChart2");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            <?php
            $sq1i2 = "SELECT nama_drone, COUNT(*) as total FROM drone where tggl>=CURRENT_DATE() GROUP BY nama_drone;";
            $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

            ?>
            labels: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                            echo '"' . $user_data['nama_drone'] . '",';
                        } ?>],
            datasets: [{
                data: [
                    <?php
                    $sq1i2 = "SELECT nama_drone, COUNT(*) as total FROM drone where tggl>=CURRENT_DATE() GROUP BY nama_drone;";
                    $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

                    while ($user_data = mysqli_fetch_array($query2)) {
                        $jumlah_laki = mysqli_query($con, "select * from drone where tggl>=CURRENT_DATE() and nama_drone='$user_data[nama_drone]';");
                        echo mysqli_num_rows($jumlah_laki) . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', ],
                hoverBackgroundColor: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                                            echo '"#4e73df",';
                                        } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    // Pie Chart Untuk Drone RTK
    var ctx = document.getElementById("myPieChart3");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            <?php
            $sq1i2 = "SELECT nama_drone, COUNT(*) as total FROM drone_rtk where tggl>=CURRENT_DATE() GROUP BY nama_drone;";
            $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

            ?>
            labels: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                            echo '"' . $user_data['nama_drone'] . '",';
                        } ?>],
            datasets: [{
                data: [
                    <?php
                    $sq1i2 = "SELECT nama_drone, COUNT(*) as total FROM drone_rtk where tggl>=CURRENT_DATE() GROUP BY nama_drone;";
                    $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

                    while ($user_data = mysqli_fetch_array($query2)) {
                        $jumlah_laki = mysqli_query($con, "select * from drone_rtk where tggl>=CURRENT_DATE() and nama_drone='$user_data[nama_drone]';");
                        echo mysqli_num_rows($jumlah_laki) . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', ],
                hoverBackgroundColor: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                                            echo '"#4e73df",';
                                        } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });


    // Pie Chart Untuk GPS Geodetik
    var ctx = document.getElementById("myPieChart4");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            <?php
            $sq1i2 = "SELECT tipe_alat, COUNT(*) as total FROM gps_geodetic where tggl>=CURRENT_DATE() GROUP BY tipe_alat;";
            $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

            ?>
            labels: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                            echo '"' . $user_data['tipe_alat'] . '",';
                        } ?>],
            datasets: [{
                data: [
                    <?php
                    $sq1i2 = "SELECT tipe_alat, COUNT(*) as total FROM gps_geodetic where tggl>=CURRENT_DATE() GROUP BY tipe_alat;";
                    $query2 = mysqli_query($con, $sq1i2) or die(mysqli_error($con));

                    while ($user_data = mysqli_fetch_array($query2)) {
                        $jumlah_laki = mysqli_query($con, "select * from gps_geodetic where tggl>=CURRENT_DATE() and tipe_alat='$user_data[tipe_alat]';");
                        echo mysqli_num_rows($jumlah_laki) . ",";
                    }
                    ?>
                ],
                backgroundColor: ['#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', '#e63c30', '#e6b230', '#d4e630', '#61e630', '#30e67f', '#30e6da', '#308be6', '#6730e6', ],
                hoverBackgroundColor: [<?php while ($user_data = mysqli_fetch_array($query2)) {
                                            echo '"#4e73df",';
                                        } ?>],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>


<!-- End of Chart JS -->












<!-- vendor -->

<!-- AdminLTE App -->
<script src="../vendor/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../vendor/dist/js/demo.js"></script>

</body>

</html>