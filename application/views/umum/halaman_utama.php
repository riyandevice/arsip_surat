<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2 text-center">
                <div class="col-sm-12">
                    <h1 class="m-0"><i class="fa fa-database"></i> Aplikasi Pelayanan Surat <small>CabdinPas</small></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container fluid">

            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $j_surat_masuk; ?></h3>

                            <p>Surat Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>v_dashboard/daftar_surat_masuk" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $j_surat_keluar; ?></h3>

                            <p>Surat Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email-unread"></i>
                        </div>
                        <a href="<?php echo base_url(); ?>v_dashboard/daftar_surat_keluar" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $j_disposisi_1; ?></h3>

                            <p>Disposisi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-document-text"></i>
                        </div>
                        <a href="" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">

                            <h3>Contact</h3>

                            <p>Kontak dan Informasi</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-telephone"></i>
                        </div>
                        <a href="" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Surat Masuk Terbaru</h5>
                                <a href="<?php echo base_url(); ?>v_dashboard/daftar_surat_masuk" target="_blank">
                                    <div class=" btn btn-success btn-sm float-right"><i class="fas fa-chevron-circle-right"></i> Detail</div>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Asal Surat</th>
                                                <th>Isi Surat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($surat_masuk_ok as $dtl) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>v_dashboard/surat_masuk/<?php echo $dtl->id_surat; ?>" target="_blank">
                                                            <?php echo $dtl->asal_surat; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $dtl->isi; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                    <div class=" col-lg-6">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Surat Keluar Terbaru</h5>
                                <a href="<?php echo base_url(); ?>v_dashboard/daftar_surat_keluar" target="_blank">
                                    <div class=" btn btn-danger btn-sm float-right"><i class="fas fa-chevron-circle-right"></i> Detail</div>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tujuan Surat</th>
                                                <th>Isi Surat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($surat_keluar_ok as $dtl) : ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url(); ?>v_dashboard/surat_keluar/<?php echo $dtl->id_surat; ?>" target="_blank">
                                                            <?php echo $dtl->tujuan; ?>
                                                        </a>
                                                    </td>
                                                    <td><?php echo $dtl->isi; ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                    <div class=" col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Graph Disposisi Surat</h5>
                            </div>
                            <div class="card-body">
                                <div id="container" style="width: 100%;">
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <center>
                                        <font color="blue"><b><i class="fas fa-list"></i> <?php echo $j_disposisi_1; ?></b></font><br>
                                        <b>Total Disposisi</b>
                                    </center>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                    <div class=" col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Graph Surat Masuk</h5>
                            </div>
                            <div class="card-body">
                                <div id="container2" style="width: 100%;"></div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <center>
                                        <font color="green"><b><i class="fas fa-list"></i> <?php echo $j_surat_masuk; ?></b></font><br>
                                        <b>Total Surat Masuk</b>
                                    </center>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                    <div class=" col-lg-4">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="card-title m-0">Graph Surat Keluar</h5>
                            </div>
                            <div class="card-body">
                                <div id="container3" style="width: 100%;"></div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <center>
                                        <font color="red"><b><i class="fas fa-list"></i> <?php echo $j_surat_keluar; ?></b></font><br>
                                        <b>Total Surat Keluar</b>
                                    </center>
                                </div>
                                <!-- /.card-footer-->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script type="text/javascript">
        // Build the chart
        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Jumlah Disposisi'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah :',
                colorByPoint: true,

                //format data penduduk kota
                data: [
                    <?php foreach ($dataSiswa as $siswa) : ?> {
                            name: '<?php echo $siswa['tahun']; ?>',
                            y: <?php echo $siswa['total']; ?>
                        },
                    <?php endforeach ?>
                ]
            }]
        });

        // Build the chart
        Highcharts.chart('container2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Jumlah Surat Masuk'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah :',
                colorByPoint: true,

                //format data penduduk kota
                data: [
                    <?php foreach ($graph as $gr) : ?> {
                            name: '<?php echo $gr['tahun']; ?>',
                            y: <?php echo $gr['total']; ?>
                        },
                    <?php endforeach ?>
                ]
            }]
        });

        // Build the chart
        Highcharts.chart('container3', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Jumlah Surat Keluar'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Jumlah :',
                colorByPoint: true,

                //format data penduduk kota
                data: [
                    <?php foreach ($graph_keluar as $grkl) : ?> {
                            name: '<?php echo $grkl['tahun']; ?>',
                            y: <?php echo $grkl['total']; ?>
                        },
                    <?php endforeach ?>
                ]
            }]
        });
    </script>