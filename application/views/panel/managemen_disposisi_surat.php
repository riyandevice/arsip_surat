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
                    <h1>Disposisi Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Halaman Utama</a></li>
                        <li class="breadcrumb-item active">Disposisi Surat</li>
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
                        <div class="card-header text-right">
                            <h3 class="card-title"><i class="fas fa-users"></i> Disposisi Surat</h3>

                            <button type="button" class="btn btn-success right" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="alert alert-secondary alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <dl class="row">
                                    <dt class="col-sm-4"><i class="icon fas fa-arrow-right"></i> Asal Surat</dt>
                                    <dd class="col-sm-8">: <?php echo $detail->asal_surat ?></dd>
                                    <dt class="col-sm-4"><i class="icon fas fa-envelope"></i> Isi Surat</dt>
                                    <dd class="col-sm-8">: <?php echo $detail->isi ?></dd>
                                    <dt class="col-sm-4"><i class="icon fas fa-calendar"></i> Tanggal Surat</dt>
                                    <dd class="col-sm-8">: <?php echo $detail->tgl_surat ?></dd>
                                    <dt class="col-sm-4"><i class="icon fas fa-image"></i> Lihat File/Berkas</dt>
                                    <dd class="col-sm-8">:
                                        <?php if ($detail->file != NULL || $detail->file != "") { ?>
                                            <a href="<?php echo base_url(); ?>uploads/surat_masuk/<?php echo $detail->file; ?>" target="_blank">
                                                <span class="badge badge-success left"><i class="fas fa-bars"></i> Lihat File</span>
                                            </a>
                                        <?php
                                        } else { ?>
                                        <?php }; ?>

                                        <?php if ($detail->link != NULL || $detail->link != "") { ?>
                                            <a href="<?php echo $detail->link; ?>" target="_blank">
                                                <span class="badge badge-warning left"><i class="fas fa-link"></i> Google Drive</span>
                                            </a>
                                        <?php
                                        } else { ?>
                                        <?php }; ?>
                                    </dd>
                                </dl>

                            </div>

                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                            <?php if ($this->session->flashdata('flash')) : ?>
                            <?php endif; ?>


                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Tambah Disposisi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo base_url() . 'Managemen_disposisi/tambah_data_disposisi' ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id'); ?>">
                                                <input type="hidden" name="id_tahun" value="<?php echo $this->session->userdata('id_tahun'); ?>">
                                                <input type="hidden" name="id_surat" value="<?php echo $detail->id_surat; ?>">

                                                <div class="row mt-3">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Tujuan Disposisi</label>
                                                            <select name="tujuan" class="form-control select2" style="width: 100%;" required>
                                                                <option value="" selected="selected">Silahkan pilih</option>
                                                                <?php
                                                                foreach ($tujuan->result() as $tjn) : ?>
                                                                    <option value="<?php echo $tjn->id; ?>"><?php echo $tjn->nama; ?> | <?php echo $tjn->jabatan; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>

                                                            <label>Sifat</label>
                                                            <select name="sifat" class="form-control" style="width: 100%;" required>
                                                                <option value="" selected="selected">Silahkan pilih</option>
                                                                <option value="Biasa">Biasa</option>
                                                                <option value="Segera">Segera</option>
                                                                <option value="Penting">Penting</option>
                                                            </select>

                                                            <label>Batas Waktu</label>
                                                            <div class="input-group date" data-target-input="nearest">
                                                                <input type="date" name="batas_waktu" class="form-control" required>
                                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Catatan</label>
                                                            <textarea type="text" name="catatan" class="form-control" required></textarea>

                                                            <label>Isi Disposisi</label>
                                                            <textarea type="text" name="isi_disposisi" class="form-control" required></textarea>
                                                        </div>
                                                    </div>
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

                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tujuan Disposisi</th>
                                        <th>isi Disposisi</th>
                                        <th>Sifat</th>
                                        <th>Batas Waktu</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($detail_disp->result() as $dtl_disp) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <?php
                                            $no = 1;
                                            foreach ($tampil_pegawai as $row) { ?>
                                                <td><?php echo $row->nama; ?></td>
                                            <?php } ?>
                                            <td><?php echo $dtl_disp->isi_disposisi; ?></td>
                                            <td><?php echo $dtl_disp->sifat; ?></td>
                                            <td><?php echo format_indo(date($dtl_disp->batas_waktu)); ?></td>
                                            <td>
                                                <a href="<?= base_url('Managemen_disposisi/hapus_disposisi/'); ?><?php echo $dtl_disp->id_disposisi; ?>" class="tombol-hapus">
                                                    <div class=" btn btn-danger btn-sm"><i class="fas fa-trash tombol-hapus"></i>
                                                    </div>
                                                </a>

                                                <a href="">
                                                    <div class=" btn btn-primary btn-sm"><i class="fas fa-edit"></i>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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