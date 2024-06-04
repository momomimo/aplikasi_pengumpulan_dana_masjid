 <nav class="navbar navbar-dark bg-primary navbar-expand fixed-bottom d-md-none d-lg-none d-xl-none">
     <ul class="navbar-nav nav-justified w-100">
         <li class="nav-item">
             <a href="<?= base_url('admin/home') ?>" class="nav-link">
                 <i class="fas fa-home fa-2x"></i>
             </a>
         </li>
         <li class="nav-item">
             <a href="<?= base_url('admin/konfirmasi') ?>" class="nav-link">
                 <i class="fas fa-user-check fa-2x"></i>
             </a>
         </li>
         <li class="nav-item">
             <a href="#modal-transaksi" data-bs-toggle="modal" class="nav-link">
                 <i class="fas fa-plus fa-2x"></i>
             </a>
             <div class="modal fade bd-example-modal-lg" id="modal-transaksi" tabindex="-1" role="dialog" aria-hidden="true">
                 <div class="modal-dialog ">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title">Tambah <?php echo $title; ?></h5>
                             <button type="button" class="btn-close" data-bs-dismiss="modal">
                             </button>
                         </div>
                         <form action="<?= base_url('admin/uang_masuk/tambah_data') ?>" method="POST">
                             <div class="modal-body">
                                 <div class="basic-form">
                                     <div class="mb-3 row">
                                         <label class="col-sm-3 col-form-label">Pilih Donatur</label>
                                         <div class="col-sm-9">
                                             <select class="form-control" required name="kode_donatur">
                                                 <option value="">Cari Donatur/Kode Donatur</option>
                                                 <optgroup label="Donatur Tetap">
                                                     <?php foreach ($get_donatur as $data) : ?>
                                                     <option value="<?php echo $data['kode_donatur']; ?>"><?php echo $data['nama_donatur']; ?></option>
                                                     <?php endforeach; ?>
                                                 </optgroup>
                                                 <optgroup label="Donatur Sukarela">
                                                     <?php foreach ($get_data_sukarela as $data) : ?>
                                                     <option value="<?php echo $data['kode_donatur']; ?>"><?php echo $data['nama_donatur']; ?></option>
                                                     <?php endforeach; ?>
                                                 </optgroup>
                                             </select> </div>
                                     </div>
                                     <div class="mb-3 row">
                                         <label class="col-sm-3 col-form-label">Nominal</label>
                                         <div class="col-sm-9">
                                             <input type="tel" name="nominal" required class="form-control" id="rupiah">
                                         </div>
                                     </div>
                                     <div class="mb-3 row">
                                         <label class="col-sm-3 col-form-label">Metode Bayar</label>
                                         <div class="col-sm-9">
                                             <select name="via" class="form-control" id="">
                                                 <option value="">Silahkan Pilih</option>
                                                 <option value="Tunai / Cash">Tunai / Cash</option>
                                                 <option value="Bank BNI">BANK BNI Rek. 1798871278 Paguyuban Warga RW III</option>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="mb-3 row">
                                         <label class="col-sm-3 col-form-label">Tanggal</label>
                                         <div class="col-sm-9">
                                             <input type="date" name="tanggal" required class="form-control" value="<?= date('Y-m-d') ?>">
                                         </div>
                                     </div>
                                     <div class="mb-3 row">
                                         <label class="col-sm-3 col-form-label">Keterangan</label>
                                         <div class="col-sm-9">
                                             <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Simpan</button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a href="#modal-laporan" data-bs-toggle="modal" class="nav-link">
                 <i class="fas fa-chart-line fa-2x"></i>
             </a>
             <div class="modal fade bd-example-modal-lg" id="modal-laporan" tabindex="-1" role="dialog" aria-hidden="true">
                 <div class="modal-dialog ">
                     <div class="modal-content">
                         <div class="card overflow-hidden">
                             <div class="social-graph-wrapper widget-googleplus">
                                 <span class="s-icon"><i class="fas fa-chart-line fa-2x"></i></span>
                             </div>
                             <div class="row">
                                 <a href="<?= base_url('admin/uang_masuk') ?>" class="col-6 border-end">
                                     <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                         <h4 class="m-1"><span class="counter">Uang Masuk</h4>
                                     </div>
                                 </a>
                                 <a href="<?= base_url('admin/uang_keluar') ?>" class="col-6">
                                     <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                         <h4 class="m-1"><span class="counter">Uang Keluar</h4>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </li>
         <li class="nav-item">
             <a href="#modal-users" data-bs-toggle="modal" class="nav-link">
                 <i class="fas fa-users fa-2x"></i>
             </a>
             <div class="modal fade bd-example-modal-lg" id="modal-users" tabindex="-1" role="dialog" aria-hidden="true">
                 <div class="modal-dialog ">
                     <div class="modal-content">
                         <div class="card overflow-hidden">
                             <div class="social-graph-wrapper widget-twitter">
                                 <span class="s-icon"><i class="fas fa-users fa-2x"></i></span>
                             </div>
                             <div class="row">
                                 <a href="<?= base_url('admin/donatur') ?>" class="col-6 border-end">
                                     <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                         <h4 class="m-1"><span class="counter">Donatur Tetap</h4>
                                     </div>
                                 </a>
                                 <a href="<?= base_url('admin/donatur/lain') ?>" class="col-6">
                                     <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                         <h4 class="m-1"><span class="counter">Donatur Sukarela</h4>
                                     </div>
                                 </a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </li>
     </ul>
 </nav>