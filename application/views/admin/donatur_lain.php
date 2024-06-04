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
                        <a href="#modal-tambah" data-bs-toggle="modal" class="btn btn-primary btn-rounded fs-18">+ Donatur Sukarela</a>
                    </div>
                    <div class="modal fade bd-example-modal-lg" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah <?php echo $title; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                    </button>
                                </div>
                                <form action="<?= base_url('admin/donatur/tambah_sukarela') ?>" method="POST">
                                    <div class="modal-body">
                                        <div class="basic-form">
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Kode Donatur</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="kode_donatur" class="form-control" readonly value="SKR<?= date('hyimsd') ?>">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="nama_donatur" class="form-control" placeholder="Nama Donatur">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="alamat_donatur" class="form-control" placeholder="Alamat Lengkap">
                                                </div>
                                            </div>
                                            <div class="mb-3 row">
                                                <label class="col-sm-3 col-form-label">No. WhatsApp</label>
                                                <div class="col-sm-9">
                                                    <input type="tel" name="nowa" class="form-control" placeholder="Contoh : 628xxxx">
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
                                        <th>Nama</th>
                                        <th>Saldo</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($get_data as $data) : ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <?php echo $data['nama_donatur']; ?> <a class="badge badge-pill badge-primary" data-bs-toggle="modal" href="#modal-info<?= $data['kode_donatur'] ?>"><i class="fas fa-info-circle"></i> Info</a>
                                            <div class="modal fade bd-example-modal-lg" id="modal-info<?= $data['kode_donatur'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Informasi <?php echo $title; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                                    <strong>Kode </strong>
                                                                    <span class="mb-0"><?= $data['kode_donatur'] ?></span>
                                                                </li>
                                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                                    <strong>Nama </strong>
                                                                    <span class="mb-0"><?= $data['nama_donatur'] ?></span>
                                                                </li>
                                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                                    <strong>No. Wa</strong>
                                                                    <span class="mb-0"><?= $data['nowa'] ?></span>
                                                                </li>
                                                                <li class="list-group-item d-flex px-0 justify-content-between">
                                                                    <strong>Alamat</strong>
                                                                    <span class="mb-0"><?= $data['alamat_donatur'] ?></span>
                                                                </li>
                                                            </ul>
                                                            <div class="modal-body">
                                                                <h6 class="modal-title">Riwayat Saldo</h6>
                                                                <div id="DZ_W_TimeLine11" class="widget-timeline dlab-scroll style-1 height370 mt-3">
                                                                    <?php
                                                                        $this->db->where('donatur_kode', $data['kode_donatur']);
                                                                        $get_riwayat = $this->db->get('view_masuk')->result_array();
                                                                        ?>
                                                                    <ul class="timeline">
                                                                        <?php $grand_total = 0;
                                                                            foreach ($get_riwayat as $riwayat) : ?>
                                                                        <?php $grand_total += $riwayat['nominal'] ?>
                                                                        <li>
                                                                            <div class="timeline-badge primary"></div>
                                                                            <a class="timeline-panel text-muted" href="#">
                                                                                <span><?php echo $riwayat['tanggal']; ?></span>
                                                                                <h6 class="mb-0"><?php echo $riwayat['keterangan']; ?> Via <?php echo $riwayat['via']; ?> Sejumlah Rp. <strong class="text-primary"><?php echo number_format($riwayat['nominal'], 0, ',', ','); ?></strong>.</h6>
                                                                            </a>
                                                                        </li>
                                                                        <?php endforeach; ?>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                            <a href="https://wa.me/<?= $data['nowa'] ?>" target="_blank" class="btn btn-primary">Hubungi</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>Rp. <?php echo number_format($grand_total, 0, ',', ','); ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="#modal-edit<?= $data['kode_donatur'] ?>" data-bs-toggle="modal" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="#modal-hapus<?= $data['kode_donatur'] ?>" data-bs-toggle="modal" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade bd-example-modal-lg" id="modal-edit<?= $data['kode_donatur'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/donatur/edit_donatur_sukarela') ?>" method="POST">
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
                                                                    <input type="text" name="nama_donatur" class="form-control" value="<?= $data['nama_donatur'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">Alamat</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" name="alamat_donatur" class="form-control" value="<?= $data['alamat_donatur'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 row">
                                                                <label class="col-sm-3 col-form-label">No. WhatsApp</label>
                                                                <div class="col-sm-9">
                                                                    <input type="tel" name="nowa" class="form-control" value="<?= $data['nowa'] ?>">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Rubah</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade bd-example-modal-lg" id="modal-hapus<?= $data['kode_donatur'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog ">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Hapus <?php echo $title; ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <form action="<?= base_url('admin/donatur/hapus_donatur_sukarela') ?>" method="POST">
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
                                                    </div>
                                                    <div class="modal-footer">
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