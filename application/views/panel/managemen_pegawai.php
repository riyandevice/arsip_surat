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
                    <h1>Data Pegawai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Halaman Utama</a></li>
                        <li class="breadcrumb-item">Managemen Data Pegawai</li>
                        <li class="breadcrumb-item active">Data Pegawai</li>
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
                                Tambah Data
                            </button>
                        </div>

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>
                        <?php endif; ?>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Tambah Pegawai</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url() . 'Managemen_pegawai/tambah_data_pegawai' ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Pegawai</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Jabatan Pegawai</label>
                                                <input type="text" name="jabatan" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>No. HP Pegawai (Terhubung WA)</label>
                                                <input type="number" name="no_hp" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Pegawai</label>
                                                <select name="status_pegawai" class="form-control" style="width: 100%;" required>
                                                    <option value="" selected="selected">Silahkan Pilih</option>
                                                    <option value="PNS">PNS</option>
                                                    <option value="Non PNS">Non PNS</option>
                                                </select>
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
                                        <th>NAMA PEGAWAI</th>
                                        <th>STATUS PEGAWAI</th>
                                        <th>NO. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_pegawai as $dt) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $dt->nama; ?></td>
                                            <td><?php echo $dt->status_pegawai; ?></td>
                                            <td><?php echo $dt->no_hp; ?></td>
                                            <td>

                                                <a href="<?= base_url('managemen_pegawai/hapus_data_pegawai/'); ?><?php echo $dt->id; ?>" class="tombol-hapus">
                                                    <div class=" btn btn-danger btn-sm"><i class="fas fa-trash tombol-hapus"></i>
                                                    </div>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
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