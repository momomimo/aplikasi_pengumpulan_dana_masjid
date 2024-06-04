<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"><?php echo $nav1; ?></a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $title; ?></a></li>
            </ol>
        </div>
        <!-- row -->


        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $title; ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Keterangan</th>
                                        <th>Saldo Masuk</th>
                                        <th>Operator</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_uang_masuk as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td>
                                            <?php echo $data['nama_donatur']; ?>
                                        </td>
                                        <td>
                                            <p class="text-xs"><?php echo $data['keterangan']; ?> <br> Via <?php echo $data['via']; ?></p>
                                        </td>
                                        <td>Rp. <?php echo number_format($data['nominal'], 0, ',', ','); ?> <br>
                                            <?php if ($data['status_masuk'] == 0) : ?>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Pending
                                            </span>
                                            <?php else : ?>
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                Valid
                                            </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['operator']; ?>
                                        </td>
                                        <td>
                                            <div class="dropdown ms-auto text-end">
                                                <div class="btn-link" data-bs-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"></rect>
                                                            <circle fill="#000000" cx="5" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="12" cy="12" r="2"></circle>
                                                            <circle fill="#000000" cx="19" cy="12" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-edit<?= $data['id_uang_masuk'] ?>">Valid Konfirmasi</a>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-hapus<?= $data['id_uang_masuk'] ?>">Tidak Valid & Hapus</a>
                                                    <a class="dropdown-item" data-bs-toggle="modal" href="#modal-info<?= $data['id_uang_masuk'] ?>">Lihat Detail</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="modal-info<?= $data['id_uang_masuk'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Informasi <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="basic-form">
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Kode Donatur</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="kode_donatur" class="form-control" readonly value="<?= $data['kode_donatur'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Nama</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="nama_donatur" readonly class="form-control" value="<?= $data['nama_donatur'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="alamat_donatur" readonly class="form-control" value="<?= $data['alamat_donatur'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-3 col-form-label">No. WhatsApp</label>
                                                            <div class="col-sm-9">
                                                                <input type="tel" name="nowa" readonly class="form-control" value="<?= $data['nowa'] ?>">
                                                            </div>
                                                        </div>
                                                        <img class="card-img-top img-fluid" src="<?= base_url('assets/upload/' . $data['bukti_tf']); ?>" alt="Card image cap">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                    <a href="https://wa.me/<?= $data['nowa'] ?>" target="_blank" class="btn btn-primary">Hubungi</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modal-edit<?= $data['id_uang_masuk'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Validasi <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/konfirmasi/update') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                                            <h3>Jika Konfirmasi sudah Valid atau Benar silahkan lanjutkan proses Ini!</h3>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id_uang_masuk" value="<?= $data['id_uang_masuk'] ?>">
                                                        <input type="hidden" name="kode_donatur" value="<?= $data['donatur_kode'] ?>">
                                                        <input type="hidden" name="nominal" value="<?= $data['nominal'] ?>">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Validkan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modal-hapus<?= $data['id_uang_masuk'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/konfirmasi/hapus_data') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Kode Donatur</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="kode_donatur" class="form-control" readonly value="<?= $data['kode_donatur'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nama_donatur" class="form-control" readonly value="<?= $data['nama_donatur'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <h3>Apakah Anda Yakin Ingin Menghapus Data Ini?</h3>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id_uang_masuk" value="<?= $data['id_uang_masuk'] ?>">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Hapus</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>