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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Halaman Utama</a></li>
                        <li class="breadcrumb-item">Managemen Surat</li>
                        <li class="breadcrumb-item active">Data Disposisi Surat</li>
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
                            <h4><i class="fas fa-bars"></i> Disposisi Surat - Batas Waktu</h4>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tujuan</th>
                                        <th>Isi Disposisi</th>
                                        <th>Sifat</th>
                                        <th>Batas Waktu</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($disposisi as $dsp) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <?php
                                            $no = 1;
                                            foreach ($tampil_pegawai as $row) { ?>
                                                <td><?php echo $row->nama; ?></td>
                                            <?php } ?>
                                            <td><?php echo $dsp->isi_disposisi; ?></td>
                                            <td><?php echo $dsp->sifat; ?></td>
                                            <td><?php echo format_indo(date($dsp->batas_waktu)); ?></td>
                                            <td>

                                                <a href="">
                                                    <div class=" btn btn-primary btn-sm"><i class="fas fa-eye"></i>
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