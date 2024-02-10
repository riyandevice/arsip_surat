<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Detail<small> Surat Keluar</small></h1>
                    <a href="<?php echo base_url(); ?>v_dashboard/d">
                        <button type="button" class="btn btn-danger right">
                            <i class="fas fa fa-arrow-left"></i> Kembali
                        </button>
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>v_dashboard/d">Halaman Utama</a></li>
                        <li class="breadcrumb-item active">Surat Keluar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <!-- Main content -->
        <div class="content fluid">
            <div class="container fluid">
                <div class="row">

                    <!-- /.col-md-12 -->
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h5 class="card-title m-0"><i class="far fa-envelope"></i> Detail Surat Keluar</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <tbody>
                                            <tr>
                                                <td>Pembuat Surat</td>
                                                <td>:</td>
                                                <?php
                                                foreach ($pembuat_surat as $pbt_srt) : ?>
                                                    <td><?php echo $pbt_srt->nama; ?></td>
                                                <?php endforeach; ?>
                                            </tr>
                                            <tr>
                                                <td>Klasifikasi Surat</td>
                                                <td>:</td>
                                                <td><?php echo $detail->kode ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tujuan Surat</td>
                                                <td>:</td>
                                                <td><?php echo $detail->tujuan ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Surat</td>
                                                <td>:</td>
                                                <td><?php echo $detail->no_surat ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Surat</td>
                                                <td>:</td>
                                                <td><?php echo format_indo(date($detail->tgl_surat)); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Isi Surat</td>
                                                <td>:</td>
                                                <td><?php echo $detail->isi ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->

                    <!-- /.col-md-12 -->
                    <div class="col-lg-12">
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h5 class="card-title m-0"><i class="far fa-envelope"></i> Perview Dokumen</h5>
                            </div>
                            <div class="card-body">
                                <?php
                                // Mendapatkan ekstensi file
                                $file = $detail->file;
                                $extension = pathinfo($file, PATHINFO_EXTENSION);
                                ?>

                                <?php if (in_array($extension, array('jpg', 'jpeg', 'png', 'gif'))) : ?>
                                    <!-- Jika file adalah gambar -->
                                    <img src="<?php echo base_url(); ?>uploads/surat_keluar/<?php echo $detail->file ?>" alt="Gambar" width="100%" height="600px" />

                                <?php elseif ($extension == 'pdf') : ?>
                                    <!-- Jika file adalah PDF -->
                                    <embed src="<?php echo base_url(); ?>uploads/surat_keluar/<?php echo $detail->file ?>" type="application/pdf" width="100%" height="900px" />
                                <?php else : ?>
                                    <!-- Jika file bukan gambar atau PDF -->
                                    <span>File Belum Diupload</span>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-12 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->