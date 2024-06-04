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
                    <div class="mb-4">
                        <a href="#modal-tambah" data-bs-toggle="modal" class="btn btn-primary btn-rounded fs-18">+ Tambah Uang Keluar</a>
                        <button class="btn btn-info btn-rounded fs-18">Total Uang Keluar Rp. <?php echo number_format($get_total_keluar[0]['nominal'], 0, ',', ',') ?></button>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog ">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah <?php echo $title; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/uang_keluar/tambah_data') ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Keterangan</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Masukan Keterangan">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nominal</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" name="nominal" required class="form-control" id="rupiah">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                                <div class="col-sm-9">
                                                    <input type="date" name="tanggal" required class="form-control" value="<?= date('Y-m-d') ?>">
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
                                        <th>Keterangan</th>
                                        <th>Saldo Keluar</th>
                                        <th>Operator</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_uang_keluar as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['tanggal']; ?></td>
                                        <td>
                                            <?php echo $data['keterangan']; ?>
                                        </td>
                                        <td>Rp. <?php echo number_format($data['nominal'], 0, ',', ','); ?></td>
                                        <td>
                                            <?php echo $data['operator']; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#modal-edit<?= $data['id_uang_keluar'] ?>" data-bs-toggle="modal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#modal-hapus<?= $data['id_uang_keluar'] ?>" data-bs-toggle="modal" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade bd-example-modal-lg" id="modal-edit<?= $data['id_uang_keluar'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/uang_keluar/edit_data') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Keterangan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="keterangan" class="form-control" value="<?= $data['keterangan'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Nominal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="tel" name="nominal" required class="form-control" id="editrupiah" value="<?= $data['nominal'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Tanggal</label>
                                                                <div class="col-sm-9">
                                                                    <input type="date" name="tanggal" required class="form-control" value="<?= date('Y-m-d', strtotime($data['tanggal'])) ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id_uang_keluar" value="<?= $data['id_uang_keluar'] ?>">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Rubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modal-hapus<?= $data['id_uang_keluar'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/uang_keluar/hapus_data') ?>" method="POST">
                                                    <div class="modal-body">
                                                        <div class="basic-form">
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Keterangan</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="nama_donatur" class="form-control" readonly value="<?= $data['keterangan'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="id_uang_keluar" value="<?= $data['id_uang_keluar'] ?>">
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