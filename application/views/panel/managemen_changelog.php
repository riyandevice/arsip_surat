<!-- Content Wrapper. Contains page content -->
<?php
if (!isset($_SESSION['id'])) {
    echo '<script>window.alert("Silahkan Login Terlebih Dahulu !!");window.location=("pengguna");</script>';
} else {
}; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12 mt-3">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">11 Pebruari 2024</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> 09:15</span>
                                <h3 class="timeline-header"><a href="#">Apel</a> Update Aplikasi</h3>

                                <div class="timeline-body">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>1.</td>
                                                <td><b>[Update]</b> Penambahan Referensi Pegawai dengan UUID(v4)</td>
                                            </tr>
                                            <tr>
                                                <td>2.</td>
                                                <td><b>[Update]</b> Penambahan Keamanan Website dengan Sistem Logout Session</td>
                                            </tr>
                                            <tr>
                                                <td>3.</td>
                                                <td><b>[Update]</b> Perubahan ID surat masuk dan keluar secara UI menjadi UUID (V4)</td>
                                            </tr>
                                            <tr>
                                                <td>4.</td>
                                                <td><b>[Update]</b> Validasi Ukuran Surat menjadi maksimal 5mb per file</td>
                                            </tr>
                                            <tr>
                                                <td>5.</td>
                                                <td><b>[Penambahan]</b> Penambahan Tabel History dibaca per surat</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->

                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-red">10 Pebruari 2024</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> 12:05</span>
                                <h3 class="timeline-header"><a href="#">Apel</a> Rilis Aplikasi</h3>

                                <div class="timeline-body">
                                    -
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->

                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content -->
</div>
<!-- /.content-wrapper -->