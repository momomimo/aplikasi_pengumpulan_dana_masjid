<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Aplikasi Rekapitulasi Anggaran Pengajian Akbar">
    <meta name="author" content="Momo Mimo">
    <meta name="robots" content="Aplikasi Rekapitulasi Anggaran Pengajian Akbar">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Aplikasi Rekapitulasi Anggaran Pengajian Akbar">
    <meta property="og:title" content="Aplikasi Rekapitulasi Anggaran Pengajian Akbar">
    <meta property="og:description" content="Aplikasi Rekapitulasi Anggaran Pengajian Akbar">
    <meta property="og:image" content="<?= base_url('assets/'); ?>images/favicon.ico">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title><?php echo $title; ?> - <?php echo $company; ?></title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/ico" href="<?= base_url('assets/'); ?>images/favicon.ico">
    <link href="<?= base_url('assets/'); ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/nouislider/nouislider.min.css">
    <!-- Datatable -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?= base_url('assets/'); ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/select2/css/select2.min.css">
    <link href="<?= base_url('assets/') ?>vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <!-- Style css -->
    <link href="<?= base_url('assets/'); ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>sweetalert/dist/sweetalert2.min.css">
    <link href="<?= base_url('assets/'); ?>vendor/lightgallery/css/lightgallery.min.css" rel="stylesheet">
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
        <?php if ($this->uri->segment(1) == "homepage" || $this->uri->segment(1) == "") : ?>
        <?php else : ?>
        <?php $this->load->view('admin/template/header'); ?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php $this->load->view('admin/template/menu'); ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?php endif; ?>
        <!--**********************************
            Content body start
        ***********************************-->
        <?php $this->load->view('admin/' . $konten); ?>
        <!--**********************************
            Content body end
        ***********************************-->




        <!--**********************************
            Footer start
        ***********************************-->
        <?php $this->load->view('admin/template/footer'); ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="<?= base_url('assets/'); ?>vendor/global/global.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="<?= base_url('assets/'); ?>vendor/apexchart/apexchart.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/lightgallery/js/lightgallery-all.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>

    <!-- Chart piety plugin files -->
    <script src="<?= base_url('assets/'); ?>vendor/peity/jquery.peity.min.js"></script>
    <!-- Dashboard 1 -->
    <script src="<?= base_url('assets/'); ?>js/dashboard/dashboard-1.js"></script>

    <script src="<?= base_url('assets/'); ?>vendor/owl-carousel/owl.carousel.js"></script>
    <!-- Datatable -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/plugins-init/datatables.init.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/select2/js/select2.full.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/plugins-init/select2-init.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/custom.min.js"></script>
    <script src="<?= base_url('assets/'); ?>js/dlabnav-init.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo.js"></script>
    <script src="<?= base_url('assets/') ?>sweetalert/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/') ?>sweetalert/dist/myscript.js"></script>
    <!-- <script src="<?= base_url('assets/'); ?>js/styleSwitcher.js"></script> -->
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value, 'Rp. ');
        });

        var editrupiah = document.getElementById('editrupiah');
        editrupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            editrupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        var modalrupiah = document.getElementById('modalrupiah');
        modalrupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            modalrupiah.value = formatRupiah(this.value, 'Rp. ');
        });
        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
    <script>
        function cardsCenter() {

            /*  testimonial one function by = owl.carousel.js */



            jQuery('.card-slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                //center:true,
                slideSpeed: 3000,
                paginationSpeed: 3000,
                dots: true,
                navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    576: {
                        items: 1
                    },
                    800: {
                        items: 1
                    },
                    991: {
                        items: 1
                    },
                    1200: {
                        items: 1
                    },
                    1600: {
                        items: 1
                    }
                }
            })
        }

        jQuery(window).on('load', function() {
            setTimeout(function() {
                cardsCenter();
            }, 1000);
        });
    </script>

</body>

</html>