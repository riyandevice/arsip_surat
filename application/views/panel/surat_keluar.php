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
                      <h1>Surat Keluar</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Halaman Utama</a></li>
                          <li class="breadcrumb-item active">Surat Keluar</li>
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
                                  Tambah Surat Keluar
                              </button>
                          </div>

                          <?php if ($this->session->flashdata('flash')) : ?>
                              <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                          <?php endif; ?>

                          <?php if ($this->session->flashdata('gagal')) : ?>
                              <div class="flash-data-gagal" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>
                          <?php endif; ?>

                          <!-- /.card-header -->
                          <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                  <thead>
                                      <tr>
                                          <th class="text-center">No</th>
                                          <th class="text-center">No Agenda Kode</th>
                                          <th class="text-center">Isi Surat</th>
                                          <th class="text-center">Tujuan Surat</th>
                                          <th class="text-center">Nomor & Tanggal Surat</th>
                                          <th class="text-center">QR Code</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        foreach ($surat_keluar_ok as $srt_klr) : ?>
                                          <tr>
                                              <td><?php echo $no++; ?></td>
                                              <td>
                                                  <font size='5'><b><?php echo $srt_klr->no_agenda; ?></b></font>
                                                  <hr>
                                                  <font color='green'><?php echo $srt_klr->kode; ?> |
                                                      <?php
                                                        foreach ($pembuat_surat as $pbt_srt) : ?>
                                                          <span class="badge badge-warning left"><i class="fas fa-user"></i> <?php echo $pbt_srt->nama; ?></span>
                                                      <?php endforeach; ?>
                                                  </font>
                                              </td>
                                              <td>
                                                  <?php echo $srt_klr->isi; ?>
                                                  <br>
                                                  <?php if ($srt_klr->file != NULL || $srt_klr->file != "") { ?>
                                                      <a href="<?php echo base_url(); ?>uploads/surat_keluar/<?php echo $srt_klr->file; ?>" target="_blank">
                                                          <span class="badge badge-success left"><i class="fas fa-bars"></i> Lihat File</span>
                                                      </a>
                                                  <?php
                                                    } else { ?>
                                                      <span class="badge badge-danger left"><i class="fas fa-bars"></i> File Belum Terarsip</span>
                                                  <?php }; ?>

                                                  <?php if ($srt_klr->link != NULL || $srt_klr->link != "") { ?>
                                                      <a href="<?php echo $srt_klr->link; ?>" target="_blank">
                                                          <span class="badge badge-warning left"><i class="fas fa-link"></i> Google Drive</span>
                                                      </a>
                                                  <?php
                                                    } else { ?>
                                                  <?php }; ?>
                                              </td>
                                              <td><?php echo $srt_klr->tujuan; ?></td>
                                              <td>
                                                  <?php echo $srt_klr->no_surat; ?>
                                                  <hr>
                                                  <small>
                                                      <i class="fas fa-tag"></i> Tgl. Surat <?php echo format_indo(date($srt_klr->tgl_surat)); ?><br>
                                                      <font color='green'><i class="fas fa-pen"></i> Tgl. Catat <?php echo format_indo(date($srt_klr->tgl_catat)); ?> <?php echo $srt_klr->waktu_catat; ?></font><br>
                                                      <font color='red'><i class="fas fa-pen"></i> Ket. Surat <?php echo $srt_klr->keterangan; ?></font><br>
                                                      <font color='red'><i class="fas fa-pen"></i> Sifat <?php echo $srt_klr->sifat; ?></font>
                                                  </small>
                                              </td>
                                              <td class="text-center">
                                                  <?php if ($srt_klr->qr_code != NULL || $srt_klr->qr_code != "") { ?>
                                                      <a href="<?php echo base_url(); ?>assets/QRcode/surat_keluar/<?php echo $srt_klr->qr_code; ?>" target="_blank">
                                                          <button type="button" class="btn btn-success btn-sm"><i class="fas fa-qrcode"></i><br>Sudah Generete</button>
                                                      </a>
                                                  <?php
                                                    } else { ?>
                                                      <form action="<?php echo base_url() . 'Managemen_suratkeluar/generete_qr' ?>" method="post" enctype="multipart/form-data">
                                                          <input type="hidden" name="id_surat" value="<?php echo $srt_klr->id_surat; ?>">
                                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-qrcode"></i><br>Belum Generete</button>
                                                      </form>
                                                  <?php }; ?>
                                              </td>
                                              <td class="text-center">

                                                  <a href="<?= base_url('Managemen_suratkeluar/hapus_surat_keluar/'); ?><?php echo $srt_klr->id_surat; ?>" class="tombol-hapus">
                                                      <div class=" btn btn-danger btn-sm"><i class="fas fa-trash tombol-hapus"></i> Hapus
                                                      </div>
                                                  </a>

                                                  <a href="<?php echo base_url(); ?>v_dashboard/surat_keluar/<?php echo $srt_klr->id_surat; ?>" target="_blank">
                                                      <div class=" btn btn-secondary btn-sm"><i class="fas fa-eye "></i> View
                                                      </div>
                                                  </a>

                                                  <br></br>

                                                  <button type="button" class="btn btn-block bg-gradient-success btn-xs" data-toggle="modal" data-target="#modal-edit<?php echo $srt_klr->id_surat; ?>"><i class="fas fa-edit"></i> Edit Surat</button>
                                                  <button type="button" class="btn btn-block bg-gradient-primary btn-xs" data-toggle="modal" data-target="#modal-edit-file<?php echo $srt_klr->id_surat; ?>"><i class="fas fa-upload"></i> Upload File Surat</button>


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

      <!-- /.editFilemodal -->
      <?php
        $no = 1;
        foreach ($surat_keluar_ok as $srt_klr) : ?>
          <div class="modal fade" id="modal-edit-file<?php echo $srt_klr->id_surat; ?>">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Form Upload File Surat</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo base_url() . 'Managemen_suratkeluar/upload_files' ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_surat" value="<?php echo $srt_klr->id_surat; ?>">
                              <div class="row mt-3">
                                  <label>File Surat Keluar <?php echo $srt_klr->no_surat; ?></label>
                                  <input type="file" name="gambar" class="form-control" required>
                              </div>

                      </div>
                      <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                          <button type="submit" value="Upload File" class="btn btn-primary">Simpan</button>
                      </div>
                      </form>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
      <?php endforeach; ?>
      <!-- /.modal -->

      <!-- /.editmodal -->
      <?php
        $no = 1;
        foreach ($surat_keluar_ok as $srt_klr) : ?>
          <div class="modal fade" id="modal-edit<?php echo $srt_klr->id_surat; ?>">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title">Form Edit Surat Keluar</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form action="<?php echo base_url() . 'Managemen_suratkeluar/update_aksi' ?>" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_surat" value="<?php echo $srt_klr->id_surat; ?>">
                              <input type="hidden" name="link" value="" class="form-control">
                              <div class="row mt-3">
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>No. Agenda</label>
                                          <input type="text" style="background-color:#f8dc08;" name="no_agenda" value="<?php echo $srt_klr->no_agenda; ?>" class=" form-control">

                                          <label>Klasifikasi Bidang Surat Masuk</label>
                                          <select name="kode" class="form-control select2" style="width: 100%;" required>
                                              <option value="<?php echo $srt_klr->kode; ?>" selected="selected">Pilihan Saat ini : <?php echo $srt_klr->kode; ?></option>
                                              <?php
                                                foreach ($kode_surat as $kd_srt2) : ?>
                                                  <option value="<?php echo $kd_srt2->kode_surat; ?>"><?php echo $kd_srt2->kode_surat; ?> | <?php echo $kd_srt2->bidang_surat; ?></option>
                                              <?php endforeach; ?>
                                          </select>

                                          <label>Nomor Surat Keluar</label>
                                          <input type="text" name="no_surat" value="<?php echo $srt_klr->no_surat; ?>" class="form-control" required>

                                          <label>Tujuan Surat</label>
                                          <input type="text" name="tujuan" value="<?php echo $srt_klr->tujuan; ?>" class="form-control" required>

                                          <label>Tanggal Surat</label>
                                          <div class="input-group date" name="tgl_surat" data-target-input="nearest">
                                              <input type="date" name="tgl_surat" value="<?php echo $srt_klr->tgl_surat; ?>" class="form-control" required>
                                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                              </div>
                                          </div>

                                      </div>
                                  </div>
                                  <div class="col-sm-6">
                                      <div class="form-group">
                                          <label>Keterangan Surat</label>
                                          <select name="keterangan" class="form-control" style="width: 100%;" required>
                                              <option value="<?php echo $srt_klr->keterangan; ?>" selected="selected">Pilihan saat ini <?php echo $srt_klr->keterangan; ?></option>
                                              <option value="Biasa">Biasa</option>
                                              <option value="Segera">Segera</option>
                                              <option value="Penting">Penting</option>
                                          </select>

                                          <label>Sifat Surat</label>
                                          <select name="sifat" class="form-control" style="width: 100%;" required>
                                              <option value="<?php echo $srt_klr->sifat; ?>" selected="selected">Pilihan saat ini <?php echo $srt_klr->sifat; ?></option>
                                              <option value="Umum">Umum</option>
                                              <option value="Rahasia">Rahasia</option>
                                          </select>

                                          <label>Perihal Surat Masuk</label>
                                          <textarea type="text" name="isi" class="form-control" required><?php echo $srt_klr->isi; ?></textarea>

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
      <?php endforeach; ?>
      <!-- /.modal -->

      <div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Form Tambah Surat Keluar</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="<?php echo base_url() . 'Managemen_suratkeluar/tambah_aksi' ?>" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="id_user" value="<?php echo $this->session->userdata('id'); ?>">
                          <input type="hidden" name="id_tahun" value="<?php echo $this->session->userdata('id_tahun'); ?>">
                          <div class="row mt-3">
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>No. Agenda</label>
                                      <input style="background-color:#f8dc08;" type="text" name="no_agenda" value="<?php echo $kode; ?>" class=" form-control">

                                      <label>Klasifikasi Bidang Surat</label>
                                      <select name="kode" class="form-control select2" style="width: 100%;" required>
                                          <option value="" selected="selected">Silahkan pilih</option>
                                          <?php
                                            foreach ($kode_surat as $kd_srt2) : ?>
                                              <option value="<?php echo $kd_srt2->kode_surat; ?>"><?php echo $kd_srt2->kode_surat; ?> | <?php echo $kd_srt2->bidang_surat; ?></option>
                                          <?php endforeach; ?>
                                      </select>

                                      <label>Nomor Surat Keluar</label>
                                      <input type="text" name="no_surat" class="form-control" required>

                                      <label>Tujuan Surat Keluar</label>
                                      <input type="text" name="tujuan" class="form-control" required>

                                      <label>Tanggal Surat Keluar</label>
                                      <div class="input-group date" name="tgl_surat" data-target-input="nearest">
                                          <input type="date" name="tgl_surat" class="form-control" required>
                                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                          </div>
                                      </div>

                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>Isi Surat Keluar</label>
                                      <textarea type="text" name="isi" class="form-control" required></textarea>

                                      <label>Keterangan Surat</label>
                                      <select name="keterangan" class="form-control" style="width: 100%;" required>
                                          <option value="" selected="selected">Silahkan pilih</option>
                                          <option value="Biasa">Biasa</option>
                                          <option value="Segera">Segera</option>
                                          <option value="Penting">Penting</option>
                                      </select>

                                      <label>Sifat Surat</label>
                                      <select name="sifat" class="form-control" style="width: 100%;" required>
                                          <option value="" selected="selected">Silahkan pilih</option>
                                          <option value="Umum">Umum</option>
                                          <option value="Rahasia">Rahasia</option>
                                      </select>

                                      <input type="hidden" name="link" value="" class="form-control">
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
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->