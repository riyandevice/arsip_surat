<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Daftar<small> Surat Masuk</small></h1>
                    <a href="<?php echo base_url(); ?>v_dashboard/d">
                        <button type="button" class="btn btn-danger right">
                            <i class="fas fa fa-arrow-left"></i> Kembali
                        </button>
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>v_dashboard/d">Halaman Utama</a></li>
                        <li class="breadcrumb-item active">Surat Masuk</li>
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
                                <h5 class="card-title m-0"><i class="far fa-envelope"></i> Daftar Surat Masuk</h5>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0">

                                    <table id="example1" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Agenda Kode</th>
                                                <th>Isi Surat / File</th>
                                                <th>Asal Surat Dari</th>
                                                <th>Nomor & Tanggal Surat</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($surat_masuk_ok as $dtl) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <?php echo $dtl->no_agenda; ?>
                                                        <hr>
                                                        <font color='green'><?php echo $dtl->kode; ?> |
                                                            <?php
                                                            foreach ($pembuat_surat as $pbt_srt) : ?>
                                                                <span class="badge badge-warning left"><i class="fas fa-user"></i> <?php echo $pbt_srt->nama; ?></span>
                                                            <?php endforeach; ?>
                                                        </font>
                                                    </td>
                                                    <td>
                                                        <?php echo $dtl->isi; ?>
                                                        <br>
                                                        <?php if ($dtl->file != NULL || $dtl->file != "") { ?>
                                                            <a href="<?php echo base_url(); ?>uploads/surat_masuk/<?php echo $dtl->file; ?>" target="_blank">
                                                                <span class="badge badge-success left"><i class="fas fa-bars"></i> Lihat File</span>
                                                            </a>
                                                        <?php
                                                        } else { ?>
                                                        <?php }; ?>

                                                        <?php if ($dtl->link != NULL || $dtl->link != "") { ?>
                                                            <a href="<?php echo $dtl->link; ?>" target="_blank">
                                                                <span class="badge badge-warning left"><i class="fas fa-link"></i> Google Drive</span>
                                                            </a>
                                                        <?php
                                                        } else { ?>
                                                        <?php }; ?>

                                                    </td>
                                                    <td><?php echo $dtl->asal_surat; ?></td>
                                                    <td>
                                                        <?php echo $dtl->no_surat; ?><br>
                                                        <small>
                                                            <i class="fas fa-tag"></i> Tgl. Surat <?php echo format_indo(date($dtl->tgl_surat)); ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>v_dashboard/surat_masuk/<?php echo $dtl->id_surat; ?>" target="_blank">
                                                            <button type="button" class="btn btn-block bg-gradient-primary btn-xs"><i class="fas fa-eye"></i> Detail</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                    </table>

                                </div>
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