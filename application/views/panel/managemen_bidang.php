<!-- Content Wrapper. Contains page content -->
<?php
if (!isset($_SESSION['id'])) {
    echo '<script>window.alert("Silahkan Login Terlebih Dahulu !!");window.location=("pengguna");</script>';
} else {
}; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kode Bidang Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Halaman Utama</a></li>
                        <li class="breadcrumb-item">Managemen Surat</li>
                        <li class="breadcrumb-item active">Data Kode Surat</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">
                                Tambah Referensi Kode
                            </button>
                        </div>

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>
                        <?php endif; ?>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Tambah Kode Bidang Surat</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url() . 'Managemen_bidang/tambah_data_bidang_surat' ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Kode Surat</label>
                                                <input type="text" name="kode_surat" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Bidang Surat</label>
                                                <input type="text" name="bidang_surat" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>KODE BIDANG SURAT</th>
                                        <th>BIDANG SURAT</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kodesurat as $kd_srt) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $kd_srt->kode_surat; ?></td>
                                            <td><?php echo $kd_srt->bidang_surat; ?></td>
                                            <td>

                                                <a href="<?= base_url('managemen_bidang/hapus_data_tahun/'); ?><?php echo $kd_srt->id; ?>" class="tombol-hapus">
                                                    <div class=" btn btn-danger btn-sm"><i class="fas fa-trash tombol-hapus"></i>
                                                    </div>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>NO</th>
                                        <th>KODE BIDANG SURAT</th>
                                        <th>BIDANG SURAT</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->