<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-xl-7 col-sm-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card tryal-gradient">
                                    <div class="card-body tryal row">
                                        <div class="col-xl-7 col-sm-6">
                                            <h2>Selamat Datang</h2>
                                            <span>Aplikasi Panitia Pengajian Akbar, PPAK_STNYEL2025 </span>
                                        </div>
                                        <div class="col-xl-5 col-sm-6">
                                            <img src="<?= base_url('assets/'); ?>images/logo.png" alt="" width="40%" class="sd-shape">
                                        </div>
                                    </div>
                                    <div class="card-footer pt-0 pb-0 text-center">
                                        <div class="row">
                                            <div class="col-4 pt-3 pb-3 border-end text-white">
                                                <h2 class="mb-1 text-white " style="font-weight: bold;"><?php echo number_format($get_total_masuk[0]['nominal'], 0, ',', ','); ?></h2><span>Uang Masuk</span>
                                            </div>
                                            <div class="col-4 pt-3 pb-3 border-end text-white">
                                                <h2 class="mb-1 text-white " style="font-weight: bold;"><?php echo number_format($get_total_keluar[0]['nominal'], 0, ',', ','); ?></h2><span>Uang Keluar</span>
                                            </div>
                                            <div class="col-4 pt-3 pb-3 text-white">
                                                <h2 class="mb-1 text-white" style="font-weight: bold;"><?php echo number_format($get_total_masuk[0]['nominal'] - $get_total_keluar[0]['nominal'], 0, ',', ','); ?></h2><span>Sisa Saldo</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="row">
                                    <div class="col-xl-6 col-sm-3">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700"><?php echo $get_total_donatur; ?></h2>
                                                        <span class="fs-18 font-w500 d-block">Total Donatur Tetap</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-sm-3">
                                        <div class="card">
                                            <div class="card-body d-flex px-4  justify-content-between">
                                                <div>
                                                    <div class="">
                                                        <h2 class="fs-32 font-w700"><?php echo $get_total_donatur_sk; ?></h2>
                                                        <span class="fs-18 font-w500 d-block">Total Donatur Sukarela</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="col-xl-5 col-sm-6">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header border-0">
                                        <div>
                                            <h4 class="fs-20 font-w700">Konfirmasi Saldo Terbaru</h4>
                                            <span class="fs-14 font-w400">Record 5 data terakhir</span>
                                        </div>
                                        <div>
                                            <a href="<?= base_url('admin/konfirmasi') ?>" class="btn btn-outline-primary btn-rounded fs-18">Lihat Semua</a>
                                        </div>
                                    </div>
                                    <div class="card-body px-0">
                                        <?php foreach ($get_total_konfirmasi as $data) : ?>
                                        <div class="d-flex justify-content-between recent-emails">
                                            <div class="d-flex">
                                                <div class="profile-k">
                                                    <span class="bg-success">DT</span>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="fs-18 font-w500"><?php echo number_format($data['nominal'], 0, ',', ','); ?> - <?php echo $data['via']; ?></h4>
                                                    <span class="font-w400 d-block"><?php echo $data['tanggal']; ?> - <?php echo $data['nama_donatur']; ?></span>
                                                </div>
                                            </div>

                                        </div>
                                        <?php endforeach; ?>
                                        <?php foreach ($get_total_konfirmasi_sk as $data) : ?>
                                        <div class="d-flex justify-content-between recent-emails">
                                            <div class="d-flex">
                                                <div class="profile-k">
                                                    <span class="bg-warning">DS</span>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="fs-18 font-w500"><?php echo number_format($data['nominal'], 0, ',', ','); ?> - <?php echo $data['via']; ?></h4>
                                                    <span class="font-w400 d-block"><?php echo $data['tanggal']; ?> - <?php echo $data['nama_donatur']; ?></span>
                                                </div>
                                            </div>

                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0 d-sm-flex d-block">
                                <h4 class="card-title">Diagram Uang masuk</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="myChart"></canvas>
                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script>
                                    const labels = [
                                        'January',
                                        'February',
                                        'March',
                                        'April',
                                        'May',
                                        'June',
                                        'Juli',
                                        'Agustus',
                                        'September',
                                        'Oktober',
                                        'November',
                                        'Desember',
                                    ];

                                    const data = {

                                        labels: labels,
                                        datasets: [{
                                                label: '<?= $tahun_lalu ?>',
                                                backgroundColor: 'rgb(69, 140, 247)',
                                                borderColor: 'rgb(50, 130, 250)',
                                                data: [
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-01');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-02');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-03');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-04');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-05');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-06');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-07');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-08');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-09');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-10');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-11');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", $tahun_lalu . '-12');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                ],
                                            },
                                            {
                                                label: '<?= date('Y') ?>',
                                                backgroundColor: 'rgb(255, 99, 132)',
                                                borderColor: 'rgb(255, 99, 132)',
                                                data: [
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '01');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '02');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '03');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '04');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '05');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '06');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '07');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '08');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '09');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '10');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '11');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                    <?php
                                                    $this->db->select('SUM(nominal) as total_lembar');
                                                    $this->db->from('view_masuk');
                                                    $this->db->where('status_masuk', "1");
                                                    $this->db->where("DATE_FORMAT(tanggal,'%Y-%m')", date('Y-') . '12');
                                                    $lembar = $this->db->get()->result_array();
                                                    echo $lembar[0]['total_lembar'];
                                                    ?>,
                                                ],
                                            }
                                        ]
                                    };

                                    const config = {
                                        type: 'bar',
                                        data: data,
                                        options: {}
                                    };
                                </script>
                                <script>
                                    const myChart = new Chart(
                                        document.getElementById('myChart'),
                                        config

                                    );
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>