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
                    <h1>User Apel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Halaman Utama</a></li>
                        <li class="breadcrumb-item">Managemen Surat</li>
                        <li class="breadcrumb-item active">Data User Apel</li>
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
                                Tambah User Apel
                            </button>
                        </div>

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                        <?php if ($this->session->flashdata('flash')) : ?>
                        <?php endif; ?>

                        <div class="modal fade" id="modal-default">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Form Tambah User Apel</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo base_url() . 'Managemen_user/tambah_data_user' ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Nama Pengguna</label>
                                                <input type="text" name="nama" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Jabatam Pengguna</label>
                                                <input type="text" name="jabatan" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Email Pengguna</label>
                                                <input type="user" name="username" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" name="password" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>No HP</label>
                                                <input type="number" name="no_hp" class="form-control" required>
                                            </div>

                                            <div class="form-group">
                                                <label>Level</label>
                                                <select name="level" class="form-control select2" style="width: 100%;" required>
                                                    <option value="" selected="selected">Silahkan pilih</option>
                                                    <option value="kepala">Kepala Cabang Dinas</option>
                                                    <option value="kasie">Ka. Sie</option>
                                                    <option value="kasie">Ka. Sub Bag. TU</option>
                                                    <option value="pegawai">Operator</option>
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


                        <?php
                        foreach ($user as $kd_srt) : ?>
                            <div class="modal fade" id="modal-edit<?php echo $kd_srt->id; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Reset Password User Apel</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url() . 'Managemen_user/update' ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value="<?php echo $kd_srt->id; ?>">
                                                <div class="form-group">
                                                    <label>Reset Password <?php echo $kd_srt->nama; ?></label>
                                                    <input type="text" name="password" class="form-control" required>
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
                        <?php endforeach; ?>
                        <!-- /.modal -->



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA USER</th>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>JABATAN</th>
                                        <th>NO. HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($user as $kd_srt) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $kd_srt->nama; ?></td>
                                            <td><?php echo $kd_srt->username; ?></td>
                                            <td>
                                                <center>
                                                    <a href="#" data-toggle="modal" data-target="#modal-edit<?php echo $kd_srt->id; ?>">
                                                        <div class=" btn btn-primary btn-sm"><?php echo $kd_srt->passwordmd5; ?>
                                                        </div>
                                                    </a>
                                                </center>
                                            </td>
                                            <td><?php echo $kd_srt->jabatan; ?></td>
                                            <td><?php echo $kd_srt->no_hp; ?></td>
                                            <td>

                                                <a href="<?= base_url('managemen_user/hapus_data_tahun/'); ?><?php echo $kd_srt->id; ?>" class="tombol-hapus">
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
                                        <th>NAMA USER</th>
                                        <th>USERNAME</th>
                                        <th>PASSWORD</th>
                                        <th>JABATAN</th>
                                        <th>NO. HP</th>
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