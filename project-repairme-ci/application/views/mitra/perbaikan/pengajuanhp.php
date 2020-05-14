<!-- =============== JAVA SCRIPT =============== -->
<script>
    // ================CHECK CONNECTION==============
    jQuery(document).ready(function($) {
        checkConnection()
    });

    function checkConnection() {
        var status = navigator.onLine
        if (status) {

        } else {
            setTimeout(function() {
                toastr.warning(
                    "Anda Tidak Terhubung Ke Internet!!"
                );
            }, 150)
        }
    }


    // ====FUNCTION AMBIL DATA hp YG TIDAK TERDAFTAR===

    function hpttd(id) {
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('mitra/hpTtd'); ?>",
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
                $('#tipettd_' + id).text(text);
            }
        });
    }

    // ============== FUNCTION AMBIL DETAIL hp ==============

    function detail_hp(id) {
        checkConnection()
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('mitra/detail_hp'); ?>",
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
        checkConnection()
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('mitra/detail_hp_ttd'); ?>",
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

    function detail_hp_(id_perbaikan, id_tipe) {
        $('#id_perbaikan_hp').val(id_perbaikan);
        if (id_tipe != 0) {
            $.ajax({
                url: '<?= base_url('mitra/detail_hp'); ?>',
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    kode: id_perbaikan
                },
                cache: false,
                success: function(data) {
                    if (data[0].kerusakan != null) {
                        $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
                        $('.modal_kerusakan_hp').text(data[0].kerusakan + ' - ' + data[0].kerusakan_lain);
                    } else {
                        $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
                        $('.modal_kerusakan_hp').text(data[0].kerusakan_lain);
                    }
                }
            }).fail(function() {
                console.log("error detail_hp_");
            });
        } else {
            $.ajax({
                url: '<?= base_url('mitra/detail_hp_ttd'); ?>',
                async: true,
                type: 'post',
                dataType: 'json',
                data: {
                    kode: id_perbaikan
                },
                cache: false,
                success: function(data) {

                    if (data[0].kerusakan != null) {
                        $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
                        $('.modal_kerusakan_hp').text(data[0].kerusakan + ' - ' + data[0].kerusakan_lain);
                    } else {
                        $('.modal_barang_hp').text(data[0].merk.toUpperCase() + ' - ' + data[0].tipe.toUpperCase());
                        $('.modal_kerusakan_hp').text(data[0].kerusakan_lain);
                    }
                }
            }).fail(function() {
                console.log("error detail_hp_");
            });
        }

    }

    function detail_tolak(id_perbaikan) {
        $('#id_perbaikan_hpx').val(id_perbaikan);
    }

    // ====================== FUNCTION DETAIL PELANGGAN ==================

    function detail_pelanggan(id) {
        checkConnection()
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('mitra/detail_pelanggan'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: false,
            success: function(data) {
                $('.nama_pelanggan').text(data[0].nama.toUpperCase())
                $('.email__pelanggan').text(data[0].email.toUpperCase())
                $('.no_tlp_pelanggan').text(data[0].no_tlp.toUpperCase())
                $('.alamat_pelanggan').text(data[0].alamat.toUpperCase())
            }
        });
    }

    // ====================== HARGA RUPIAH ==========================

    jQuery(document).ready(function($) {
        $('.btn_terima_hp').on('click', function() {
            $('#hargahp').autoNumeric('init');

            var kode = voucher()

            $('.kode_voucher').text(kode);
            $('#voucherhp').val(kode);
        });
    });

    // ============================ VOUCHER ===========================

    function voucher() {
        var result = '';
        var character = 'abcdefghijklmnopqrstuvwxyz0123456789';
        var characterLength = character.length;
        for (var i = 0; i < 7; i++) {
            result += character.charAt(Math.floor(Math.random() * characterLength));
        }
        return result;
    }
</script>
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

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengajuan Perbaikan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 30%;">Barang</th>
                            <th style="width: 30%;">Pelanggan</th>
                            <th style="width: 20%;">Tanggal Pengajuan</th>
                            <th style="width: 20%;">Proses</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($hp as $val) : ?>
                            <?php if ($val['id_status_perbaikan'] == 1) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td>
                                        <span id="tipettd_<?= $val['id_perbaikan']; ?>"></span>
                                        <?php if ($val['id_tipe'] == 0) : ?>

                                            <!-- ===== FUNCTION JAVASCRIPT ===== -->

                                            <script>
                                                hpttd(<?= $val['id_perbaikan']; ?>)
                                            </script>

                                            <!-- ======END OF JAVASCRIPT==== -->

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(<?= $val['id_perbaikan']; ?>)">Detail</button>

                                        <?php elseif ($val['id_tipe'] != 0) : ?>
                                            <?= strtoupper($val['merk']); ?> - <?= $val['tipe']; ?>

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(<?= $val['id_perbaikan']; ?>)">Detail</button>
                                        <?php endif; ?>

                                    </td>
                                    <td>
                                        <?= strtoupper($val['pelanggan']); ?>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(<?= $val['id_pelanggan']; ?>)">Detail</button>
                                    </td>
                                    <td><?= $val['tanggal']; ?></td>
                                    <td><button class="btn btn-success btn-sm btn_terima_hp" data-toggle="modal" data-target="#terima_hp" onclick="detail_hp_(<?= $val['id_perbaikan'] ?>,<?= $val['id_tipe']; ?>)">
                                            Terima
                                        </button>
                                        <button class="btn btn-danger btn-sm btn_tolak_hp" data-toggle="modal" data-target="#tolak_hp" onclick="detail_tolak(<?= $val['id_perbaikan'] ?>)" style="width: 70px;">
                                            Tolak
                                        </button></td>
                                </tr>
                                <?php $i += 1; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perbaikan diterima</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 30%;">Barang</th>
                            <th style="width: 30%;">Pelanggan</th>
                            <th style="width: 20%;">Tanggal Diterima</th>
                            <th style="width: 20%;">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $b = 1; ?>
                        <?php foreach ($hp as $value) : ?>
                            <?php if ($value['id_status_perbaikan'] == 2) : ?>
                                <tr>
                                    <td><?= $b; ?></td>
                                    <td><span id="tipettd_<?= $value['id_perbaikan']; ?>"></span>
                                        <?php if ($value['id_tipe'] == 0) : ?>

                                            <!-- ===== FUNCTION JAVASCRIPT ===== -->

                                            <script>
                                                hpttd(<?= $value['id_perbaikan']; ?>)
                                            </script>

                                            <!-- ======END OF JAVASCRIPT==== -->

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(<?= $value['id_perbaikan']; ?>)">Detail</button>

                                        <?php elseif ($value['id_tipe'] != 0) : ?>
                                            <?= strtoupper($value['merk']); ?> - <?= $value['tipe']; ?>

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(<?= $value['id_perbaikan']; ?>)">Detail</button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= strtoupper($value['pelanggan']); ?>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(<?= $value['id_pelanggan']; ?>)">Detail</button>
                                    </td>
                                    <td><?= $value['tanggal']; ?></td>
                                    <td>X</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Perbaikan Ditolak</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th style="width: 30%;">Barang</th>
                            <th style="width: 30%;">Pelanggan</th>
                            <th style="width: 20%;">Tanggal Ditolak</th>
                            <th style="width: 20%;">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $a = 1; ?>
                        <?php foreach ($hp as $valu) : ?>
                            <?php if ($valu['id_status_perbaikan'] == 3) : ?>
                                <tr>
                                    <td><?= $a; ?></td>
                                    <td><span id="tipettd_<?= $valu['id_perbaikan']; ?>"></span>
                                        <?php if ($valu['id_tipe'] == 0) : ?>

                                            <!-- ===== FUNCTION JAVASCRIPT ===== -->

                                            <script>
                                                hpttd(<?= $valu['id_perbaikan']; ?>)
                                            </script>

                                            <!-- ======END OF JAVASCRIPT==== -->

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp_ttd(<?= $valu['id_perbaikan']; ?>)">Detail</button>

                                        <?php elseif ($valu['id_tipe'] != 0) : ?>
                                            <?= strtoupper($valu['merk']); ?> - <?= $valu['tipe']; ?>

                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailhp" style="float: right;" onclick="detail_hp(<?= $valu['id_perbaikan']; ?>)">Detail</button>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= strtoupper($valu['pelanggan']); ?>
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detail_pelanggan" style="float: right;" onclick="detail_pelanggan(<?= $valu['id_pelanggan']; ?>)">Detail</button>
                                    </td>
                                    <td><?= $valu['tanggal']; ?></td>
                                    <td>X</td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>



<!-- ==========  BAGIAN MODAL ============= -->

<div class="modal fade" id="detailhp">
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

<div class="modal fade" id="detail_pelanggan">
    <div class="modal-dialog">
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
                            <td>Nama</td>
                            <td class="nama_pelanggan"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td class="email__pelanggan"></td>
                        </tr>
                        <tr>
                            <td>No Telpon</td>
                            <td class="no_tlp_pelanggan"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td class="alamat_pelanggan"></td>
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

<!-- Modal -->
<div class="modal fade" id="terima_hp" tabindex="-1" role="dialog" aria-labelledby="terimahpLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="terimahpLabel">Terima Pengajuan hp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url(); ?>mitra/terimaperbaikanhp" method="POST">
                <div class="modal-body">
                    <table class="table table-bordered" border="0">
                        <tr>
                            <td style="text-align: center;"><b>Barang</b></td>
                            <td><b>hp</b></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><b>Merk & Tipe</b></td>
                            <td style="font-weight: bold;" class="modal_barang_hp"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><b>Kerusakan</b></td>
                            <td style="font-weight: bold;" class="modal_kerusakan_hp"></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;"><b>Voucher</b></td>
                            <td class="kode_voucher" style="font-size: 16px; font-weight: bold;"></td>
                        </tr>

                    </table>
                    <?php function tglIndo()
                    {
                        $data = date('m');
                        $date = date('d');
                        $year = date('Y');
                        switch ($data) {
                            case '01':
                                return " " . $date . ' Januari ' . $year;
                                break;
                            case '02':
                                return $date . ' Februari ' . $year;
                                break;
                            case '03':
                                return $date . ' Maret ' . $year;
                                break;
                            case '04':
                                return $date . ' April ' . $year;
                                break;
                            case '05':
                                return $date . ' Mei ' . $year;
                                break;
                            case '06':
                                return $date . ' Juni ' . $year;
                                break;
                            case '07':
                                return $date . ' Juli ' . $year;
                                break;
                            case '08':
                                return $date . ' Agustus ' . $year;
                                break;
                            case '09':
                                return $date . ' September ' . $year;
                                break;
                            case '10':
                                return $date . ' Oktober ' . $year;
                                break;
                            case '11':
                                return $date . ' November ' . $year;
                                break;
                            case '12':
                                return $date . ' Desember ' . $year;
                                break;
                            default:
                                return 'false';
                                break;
                        }
                        return $data;
                    } ?>
                    <div class="form-group mt-20">
                        <input type="text" id="id_perbaikan_hp" name="id_perbaikan_hp" hidden>
                        <input type="text" id="voucherhp" name="voucherhp" hidden>
                        <input type="text" id="tanggal" name="tanggal" value="<?= tglIndo(); ?>" hidden>
                        <input class="form-control" id="hargahp" name="hargahp" type="text" data-a-sign="Rp. " data-a-dec="," data-a-sep="." placeholder="Harga Rupiah">
                    </div>
                    <p class="hargahp" style="color: red;"></p>
                    <div class="form-group mt-20">
                        <input class="form-control" id="kethplain" name="kethplain" type="text" placeholder="Keterangan Lain">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Terima Permintaan</button>

                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tolak_hp" tabindex="-1" role="dialog" aria-labelledby="tolak_hp" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tolakhpLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form action="<?= base_url(); ?>mitra/tolakperbaikanhp" method="POST">
                        <input type="text" id="id_perbaikan_hpx" name="id_perbaikan_hpx" hidden>
                        <select class="form-control" id="alasanPenolakanhp">
                            <option selected="true" disabled="">Alasan Penolakan</option>
                            <option>Teknisi Belum Ready</option>
                            <option>Permintaan Masih Penuh</option>
                            <option>Permintaan Tidak Benar</option>
                            <option style="color: red;" value="false">Alasan Lain</option>
                        </select>
                </div>
                <div class="form-group mt-20">
                    <input class="form-control" id="ketpenolakanhp" name="ketpenolakanhp" type="text" placeholder="Alasan Anda">
                    <input type="text" id="tanggal" name="tanggal" value="<?= tglIndo(); ?>" hidden>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Tolak Permintaan</button>
                </form>
            </div>
        </div>
    </div>
</div>