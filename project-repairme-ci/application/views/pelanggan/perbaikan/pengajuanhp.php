<!-- =============== JAVA SCRIPT =============== -->
<script>
    // ================CHECK CONNECTION==============
    //  jQuery(document).ready(function($) {
    //    checkConnection()
    //  });

    //  function checkConnection() {
    //     var status = navigator.onLine
    //     if (status) {
    //       alert('connected')    
    //     }else{
    //       setTimeout(function () {
    //         toastr.warning(
    //             "Anda Tidak Terhubung Ke Internet!!"
    //           );
    //       }, 150)
    //     }
    //   }


    // ====================== FUNCTION DETAIL MITRA ==================

    function detail_mitra(id) {
        checkConnection()
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('pelanggan/detail_mitra'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: false,
            success: function(data) {
                console.log(data);
                var lat = data[0].lat
                var lng = data[0].lng
                var nama = data[0].nama_usaha.toUpperCase()

                map(lat, lng, nama)
                $('.nama_usaha').text(data[0].nama_usaha.toUpperCase())
                $('.nama_mitra').text(data[0].nama.toUpperCase())
                $('.keahlian').text(data[0].jenis.toUpperCase())
                $('.alamat').text(data[0].alamat.toUpperCase())
                $('.deskripsi').text(data[0].deskripsi.toUpperCase())
                $('.rating').text(data[0].rating.toUpperCase())
                $('.foto_usaha').attr('src', '<?= base_url("gallery/"); ?>' + data[0].foto_usaha)
            }
        });
    }

    function map(lat, lng, nama) {
        setTimeout(function() {

            $('#map').html('<div id="maps" style="height:100%; width:100%;"></div>');
            var popup = L.popup();
            var map = L.map('maps').setView([lat, lng], 17);
            L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            var marker = L.marker([lat, lng]).addTo(map).bindPopup(nama).openPopup();
        }, 200);
    }


    // ============== FUNCTION AMBIL DETAIL HP ==============

    function detail_hp(id) {
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('pelanggan/detail_hp'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: false,
            success: function(data) {
                var merk = '';
                var tipe = '';
                var kerusakan = '';
                var kerusakan_lain = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    merk += data[i].merk;
                    tipe += data[i].tipe;
                    kerusakan += data[i].kerusakan;
                    kerusakan_lain += data[i].kerusakan_lain;
                }
                $('.hp_merk').text(merk);
                $('.hp_tipe').text(tipe);
                if (kerusakan == 'null') {
                    $('.hp_kerusakan').text('-');
                } else {
                    $('.hp_kerusakan').text(kerusakan);
                }

                if (kerusakan_lain == '') {
                    $('.hp_kerusakan_lain').text('-');
                } else {
                    $('.hp_kerusakan_lain').text(kerusakan_lain);
                }

            }
        });
    }

    function detail_hp_ttd(id) {
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('pelanggan/detail_hp_ttd'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: false,
            success: function(data) {
                var merk = '';
                var tipe = '';
                var kerusakan = '';
                var kerusakan_lain = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    merk += data[i].merk;
                    tipe += data[i].tipe;
                    kerusakan += data[i].kerusakan;
                    kerusakan_lain += data[i].kerusakan_lain;
                }
                $('.hp_merk').text(merk);
                $('.hp_tipe').text(tipe);
                if (kerusakan == 'null') {
                    $('.hp_kerusakan').text('-');
                } else {
                    $('.hp_kerusakan').text(kerusakan);
                }

                if (kerusakan_lain == '') {
                    $('.hp_kerusakan_lain').text('-');
                } else {
                    $('.hp_kerusakan_lain').text(kerusakan_lain);
                }

            }
        });
    }


    // =================== FUNCTION UNTUK HP ===================
    function hpttd(id) {
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('pelanggan/hpTtd'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: false,
            success: function(data) {
                var text = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    text += data[i].merk_hp + ' - ' + data[i].tipe_hp;
                }
                $('#tipettdhp_' + id).text(text);
            }
        });
    }

    function ambil_voucher(id, jenis) {
        $.ajax({
                url: '<?= base_url('pelanggan/voucher') ?>',
                type: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    jenis: jenis
                },
                success: function(data) {
                    if (jenis == 'laptop') {
                        $('.voucher').text(data[0].voucher_laptop);
                    }
                    if (jenis == 'hp') {
                        $('.voucher').text(data[0].voucher_hp);
                    }
                }
            })
            .fail(function() {
                console.log("error");
            });

    }
</script>

<!-- ======================END OF JAVASCRIPT====================== -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Perbaikan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Perbaikan</a></li>
                        <li class="breadcrumb-item active">Pengajuan Perbaikan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perbaikan Handphone</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 30%;">Barang</th>
                            <th style="width: 30%;">Mitra</th>
                            <th style="width: 20%;">Tanggal</th>
                            <th style="width: 20%;">Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($hp as $val) : ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td>
                                    <span id="tipettdhp_<?= $val['id_perbaikan']; ?>"></span>
                                    <?php if ($val['id_tipe'] == 0) : ?>

                                        <!-- ===== FUNCTION JAVASCRIPT ===== -->

                                        <script>
                                            hpttd(<?= $val['id_perbaikan']; ?>)
                                        </script>

                                        <!-- ======END OF JAVASCRIPT==== -->

                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_hp_ttd(<?= $val['id_perbaikan']; ?>)">Detail</button>

                                    <?php elseif ($val['id_tipe'] != 0) : ?>
                                        <?= strtoupper($val['merk']); ?> - <?= $val['tipe']; ?>

                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_hp(<?= $val['id_perbaikan']; ?>)">Detail</button>
                                    <?php endif; ?>

                                </td>
                                <td>
                                    <?= strtoupper($val['mitra']); ?>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailMitra" style="float: right;" onclick="detail_mitra(<?= $val['id_mitra']; ?>)">Detail</button>
                                </td>
                                <td><?= $val['tanggal']; ?></td>

                                <?php $i += 1; ?>

                                <!-- ============= BUTTON STATUS PERBAIKAN ============= -->

                                <?php if ($val['id_status_perbaikan'] == 3) : ?>
                                    <td>
                                        <button class="btn btn-danger btn-sm t-terimaHp" data-toggle="modal" data-target="#terimaHp" value="">
                                            Mitra Menolak
                                        </button>
                                    </td>

                                <?php elseif ($val['id_status_perbaikan'] == 1) : ?>
                                    <td>
                                        <button disabled class="btn btn-info btn-sm t-terimaHp" data-toggle="modal" data-target="#terimaHp" value="">
                                            Menunggu Persetujuan
                                        </button>
                                    </td>
                                <?php elseif ($val['id_status_perbaikan'] == 2) : ?>
                                    <td>
                                        <button class="btn btn-success btn-sm t-terimaHp" data-toggle="modal" data-target="#modal_voucher" onclick="ambil_voucher(<?= $val['id_perbaikan']; ?>, 'hp')">
                                            Ambil Voucher
                                        </button>
                                    </td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <!-- ========================= END OF BUTTON =============== -->
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>



<!-- ==========  BAGIAN MODAL ============= -->

<div class="modal fade" id="modal_voucher">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid">
                    <table class="table table-bordered">
                        <tr>
                            <td><strong>VOUCHER</strong></td>
                            <td class="voucher"></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="detailLaptop">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="container-fluid">
                    <table class="table table-bordered">

                        <tr>
                            <th><b>Judul</b></th>
                            <th><b>Data</b></th>
                        </tr>

                        <tr>
                            <td>Jenis</td>
                            <td>hp</td>
                        </tr>
                        <tr>
                            <td>Merk</td>
                            <td class="hp_merk"></td>
                        </tr>
                        <tr>
                            <td>Tipe</td>
                            <td class="hp_tipe"></td>
                        </tr>
                        <tr>
                            <td>Kerusakan</td>
                            <td class="hp_kerusakan"></td>
                        </tr>
                        <tr>
                            <td>Kerusakan Lain</td>
                            <td class="hp_kerusakan_lain"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="detailMitra">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <table class="table table-bordered">
                    <div class="container-fluid">
                        <tr>
                            <th>Lokasi</th>
                            <th colspan="2" style="width: 40%;">Data</th>
                        </tr>
                        <tr>
                            <td rowspan="10">
                                <div id="map" style="height: 450px; display: block;">

                                </div>

                            </td>
                            <td style="width: 18%;">
                                <b>NAMA MITRA</b>
                            </td>
                            <td class="nama_usaha"> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><img src="" class="foto_usaha"></td>
                        </tr>
                        <tr>
                            <td><b>NAMA PEMILIK</b></td>
                            <td class="nama_mitra"> </td>
                        </tr>
                        <tr>
                            <td><b>KEAHLIAN</b></td>
                            <td class="keahlian"> </td>
                        </tr>
                        <tr>
                            <td><b>ALAMAT</b></td>
                            <td class="alamat"></td>
                        </tr>
                        <tr>
                            <td><b>DESKRIPSI</b></td>
                            <td class="deskripsi"></td>
                        </tr>
                        <tr>
                            <td><b>RATING</b></td>
                            <td class="rating"></td>
                        </tr>
                    </div>
                </table>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->