<script>
    function detail_notif(id) {
        checkConnection()
        var kodes = id;
        $.ajax({
            type: 'POST',
            url: "<?= base_url('pelanggan/detail_notif'); ?>",
            async: true,
            dataType: 'json',
            data: {
                kode: kodes
            },
            cache: true,
            success: function(data) {
                var notifikasi = '';
                var keterangan = '';
                var nama_usaha = '';
                var harga = '';
                var i;
                for (i = 0; i < data.length; i++) {
                    notifikasi += data[i].notifikasi;
                    keterangan += data[i].keterangan;
                    nama_usaha += data[i].nama_usaha;
                    harga += data[i].harga;
                }
                $('.notifikasi').text(notifikasi);
                $('.keterangan').text(keterangan);
                $('.namamitra_dislap').text(nama_usaha);
                $('.harga_dislap').text(harga);

            }
        });
    }
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inbox</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="#" class="nav-link">
                                    <i class="fas fa-inbox"></i> Pesan
                                    <span class="badge bg-primary float-right">1</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-envelope"></i> Terkirim
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Pesan Laptop</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($laptop as $lp) : ?>
                                        <?php if ($lp['notifikasi'] == 'diskon') : ?>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html"><?= $lp['nama_usaha']; ?></a></td>
                                                <td class="mailbox-subject"><b><?= $lp['notifikasi']; ?></b> - <?= $lp['keterangan']; ?>
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">
                                                    <button class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_notif(<?= $lp['id_notif_mitra']; ?>, 'normal')"><i class="far fa-eye"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($lp['notifikasi'] == 'tambah_harga') : ?>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html"><?= $lp['nama_usaha']; ?></a></td>
                                                <td class="mailbox-subject"><b><?= $lp['notifikasi']; ?></b> - <?= $lp['keterangan']; ?>
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">
                                                    <button class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#tambahlap" style="float: right;" onclick="detail_notif(<?= $lp['id_notif_mitra']; ?>, 'normal')"><i class="far fa-eye"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Pesan Hp</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control" placeholder="Search Mail">
                                <div class="input-group-append">
                                    <div class="btn btn-primary">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($handphone as $hp) : ?>
                                        <?php if ($hp['notifikasi'] == 'diskon2') : ?>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html"><?= $hp['nama_usaha']; ?></a></td>
                                                <td class="mailbox-subject"><b><?= $hp['notifikasi']; ?></b> - <?= $hp['keterangan']; ?>
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">
                                                    <button class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#detailLaptop" style="float: right;" onclick="detail_notif(<?= $hp['id_notif_mitra']; ?>, 'normal')"><i class="far fa-eye"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if ($hp['notifikasi'] == 'tambah_harga2') : ?>
                                            <tr>
                                                <td>
                                                    <div class="icheck-primary">
                                                        <input type="checkbox" value="" id="check1">
                                                        <label for="check1"></label>
                                                    </div>
                                                </td>
                                                <td class="mailbox-star"><a href="#"><i class="fas fa-star text-warning"></i></a></td>
                                                <td class="mailbox-name"><a href="read-mail.html"><?= $hp['nama_usaha']; ?></a></td>
                                                <td class="mailbox-subject"><b><?= $hp['notifikasi']; ?></b> - <?= $hp['keterangan']; ?>
                                                </td>
                                                <td class="mailbox-attachment"></td>
                                                <td class="mailbox-date">
                                                    <button class="btn btn-info btn-sm mr-2" data-toggle="modal" data-target="#tambahlap" style="float: right;" onclick="detail_notif(<?= $hp['id_notif_mitra']; ?>, 'normal')"><i class="far fa-eye"></i></button>
                                                    <a href="#" class="btn btn-warning btn-sm"><i class="far fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <!-- /.mail-box-messages -->
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- diskon untuk laptop -->
<div class="modal fade" id="detailLaptop" tabindex="-1" role="dialog" aria-labelledby="diskonlapLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="diskonlapLabel">Pemberitahuan</h5>

            </div>
            <div class="modal-body">
                Kepada : <?= $this->session->userdata('userData')['nama']; ?>
                <br><br>
                <strong>Anda Mendapatkan Diskon!!</strong>
                <p>Selamat untuk pelanggan yang bernama <strong><?= $this->session->userdata('userData')['nama']; ?></strong> , anda telah mendapatkan
                    diskon dari mitra <strong class="namamitra_dislap"></strong></p>
                <p>Harga perbaikan Setelah di Diskon adalah : <strong class="harga_dislap"></strong></p>
                <p>Mitra <strong class="namamitra_dislap"></strong> memberi keterangan : <strong class="keterangan"></strong></p>
                <p>Dan TerimaKasih telah Memilih Mitra <strong class="namamitra_dislap"></strong></p>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-block btn-warning btn-sm arsip_dislap" data-dismiss="modal" aria-label="Close">Arsipkan</button><br>

                <button class="btn btn-block btn-danger btn-sm hapus_dislap">Hapus</button>
            </div>
            <form action="<?= base_url(); ?>pelanggan/diskondibaca" method="POST" id="formdiskon">
                <input type="text" name="idper_dislap" id="idper_dislap" hidden>
            </form>
            <form action="<?= base_url(); ?>pelanggan/hapusnotifdiskonlaptop" method="POST" id="formdiskonhapus">
                <input type="text" name="idper_dislap2" id="idper_dislap2" hidden>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahlap" tabindex="-1" role="dialog" aria-labelledby="tambahlapLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahlapLabel">Pemberitahuan</h5>

            </div>
            <div class="modal-body">
                Kepada : <?= $this->session->userdata('userData')['nama']; ?>
                <br><br>
                <strong>Mitra Mengajukan Penambahan Harga</strong>
                <p>Perbaikan anda sementara terhenti karena mitra mengajukan penambahan harga, perbaikan membutuhkan biaya :</p>
                <p>Harga perbaikan : <strong class="harga_dislap"></strong></p>
                <p>Mitra <strong class="namamitra_dislap"></strong>, memberi keterangan : <strong class="keterangan"></strong></p>
                <p style="color:red">Mitra menunggu respon cepat dari anda, jika anda menerima, silahkan tekan tombol setuju, dan jika tidak, perbaikan akan di hentikan dan silahkan ambil barang di Mitra tempat perbaikan.</p>
                <p>Dan TerimaKasih telah Memilih Mitra <strong class="namamitra_dislap"></strong></p>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-block btn-success btn-sm lanjutlap" data-dismiss="modal" aria-label="Close">Ya, Setuju</button><br>
                <button class="btn btn-block btn-danger btn-sm batalkanperbaikanlap">Tidak, Batalkan</button>
            </div>
            <form action="<?= base_url(); ?>pelanggan/lanjutperbaikan" method="POST" id="lanjutperbaikan">
                <input type="text" name="idper_tambahlap" id="idper_tambahlap" hidden>
            </form>
            <form action="<?= base_url(); ?>pelanggan/batalkanperbaikanlaptop" method="POST" id="batalperbaikan">
                <input type="text" name="idper_batallap" id="idper_batallap" hidden>
            </form>
        </div>
    </div>
</div>

<!-- modal untuk hp -->

<div class="modal fade" id="diskonhp" tabindex="-1" role="dialog" aria-labelledby="diskonhpLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="diskonhpLabel">Pemberitahuan</h5>

            </div>
            <div class="modal-body">
                Kepada : <?= $this->session->userdata('userData')['nama']; ?>
                <br><br>
                <strong>Anda Mendapatkan Diskon!!</strong>
                <p>Selamat untuk pelanggan yang bernama <?= $this->session->userdata('userData')['nama']; ?>, anda telah mendapatkan
                    diskon dari mitra <strong class="namamitra_dishp"></strong></p>
                <p>Harga perbaikan Setelah di Diskon adalah : <strong class="harga_dishp"></strong></p>
                <p>Mitra <strong class="namamitra_dishp"></strong> memberi keterangan : <strong class="pesan_dishp"></strong></p>
                <p>Dan TerimaKasih telah Memilih Mitra <strong class="namamitra_dishp"></strong></p>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-block btn-warning btn-sm arsip_dishp" data-dismiss="modal" aria-label="Close">Arsipkan</button><br>

                <button class="btn btn-block btn-danger btn-sm hapus_dishp">Hapus</button>
            </div>
            <form action="<?= base_url(); ?>pelanggan/diskondibaca2" method="POST" id="formdiskon2">
                <input type="text" name="idper_dishp" id="idper_dishp" hidden>
            </form>
            <form action="<?= base_url(); ?>pelanggan/hapusnotifdiskonlaptop2" method="POST" id="formdiskonhapus2">
                <input type="text" name="idper_dishp2" id="idper_dishp2" hidden>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="tambahhp" tabindex="-1" role="dialog" aria-labelledby="tambahhpLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahhpLabel">Pemberitahuan</h5>

            </div>
            <div class="modal-body">
                Kepada : <?= $this->session->userdata('userData')['nama']; ?>
                <br><br>
                <strong>Mitra Mengajukan Penambahan Harga</strong>
                <p>Perbaikan anda sementara terhenti karena mitra mengajukan penambahan harga, perbaikan membutuhkan biaya :</p>
                <p>Harga perbaikan : <strong class="harga_tambahhp"></strong></p>
                <p>Mitra <strong class="namamitra_tambahhp"></strong>, memberi keterangan : <strong class="pesan_tambahhp"></strong></p>
                <p style="color:red">Mitra menunggu respon cepat dari anda, jika anda menerima, silahkan tekan tombol setuju, dan jika tidak, perbaikan akan di hentikan dan silahkan ambil barang di Mitra tempat perbaikan.</p>
                <p>Dan TerimaKasih telah Memilih Mitra <strong class="namamitra_tambahhp"></strong></p>

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-block btn-success btn-sm lanjuthp" data-dismiss="modal" aria-label="Close">Ya, Setuju</button><br>
                <button class="btn btn-block btn-danger btn-sm batalkanperbaikanhp">Tidak, Batalkan</button>
            </div>
            <form action="<?= base_url(); ?>pelanggan/lanjutperbaikan2" method="POST" id="lanjutperbaikan2">
                <input type="text" name="idper_tambahhp" id="idper_tambahhp" hidden>
            </form>
            <form action="<?= base_url(); ?>pelanggan/batalkanperbaikanhp" method="POST" id="batalperbaikan2">
                <input type="text" name="idper_batalhp" id="idper_batalhp" hidden>
            </form>
        </div>
    </div>
</div>