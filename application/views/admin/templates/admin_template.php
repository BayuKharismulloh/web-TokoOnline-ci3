<?php
if (!$this->session->has_userdata('logged_in')) {
    redirect('admin/sign-in');
}

$user = $this->db->get_where('users', ['id' => $this->session->user_id])->row_array();
$role = $this->db->get_where('roles', ['id' => $this->session->role_id])->row_array();
$pending_approval = count($this->db->get_where('approvals', ['status' => 'in_review'])->result_array());
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/admin/css/sb-admin-2.css') ?>" rel="stylesheet">

    <script src="https://kit.fontawesome.com/a228d0b067.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-light accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard') ?>">
                <img src="<?= site_logo() ?>" alt="site-logo" class="img-fluid">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <div class="user-profile py-3">
                <div class="d-flex align-items-center">
                    <div class="p-3 w-25">
                        <img class="img-profile rounded-circle" width="50" src="<?= base_url($user['image']) ?>">
                    </div>
                    <div class="p-3 pl-4">
                        <p class="mb-1"><b><?= ucwords($user['full_name']) ?></b></p>
                        <p class="mb-1"><?= ucwords($role['name']) ?></p>
                    </div>
                </div>
            </div>

            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == 'category' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/category') ?>">
                    <i class="fas fa-fw fa-hashtag"></i>
                    <span>Kategori</span></a>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == 'product' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/product') ?>">
                    <i class=" fas fa-fw fa-boxes"></i>
                    <span>Produk</span></a>
            </li>

            <li class="nav-item <?= $this->uri->segment(2) == 'carousel' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/carousel') ?>">
                    <i class=" fas fa-fw fa-images"></i>
                    <span>Carousel</span></a>
            </li>

            <?php if ($this->session->role_id == 1) { ?>
                <li class="nav-item <?= $this->uri->segment(2) == 'user' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/user') ?>">
                        <i class=" fas fa-fw fa-users"></i>
                        <span>Staff</span>
                    </a>
                </li>

                <li class="nav-item <?= $this->uri->segment(2) == 'approval' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('admin/approval') ?>">
                        <i class=" fas fa-fw fa-clipboard-list"></i>
                        <span>Approval</span>
                        <?php if ($pending_approval > 0) { ?><span class="badge badge-danger"><?= $pending_approval ?></span><?php } ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                        
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                        
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="<?= base_url($user['image'])  ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url() ?>admin/setting">
                                    <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Pengaturan
                                </a>
                                <a class="dropdown-item" href="<?= base_url() ?>admin/sign-out">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $contents ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center py-3">
                        <i class="text-success fa fa-check-circle fa-6x mb-3"></i>
                        <h5><?= $this->session->flashdata('success') ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center py-3">
                        <i class="text-danger fa fa-times-circle fa-6x mb-3"></i>
                        <h5><?= $this->session->flashdata('error') ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url() ?>assets/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url() ?>assets/admin/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url() ?>assets/admin/js/demo/chart-pie-demo.js"></script>

    <?php if ($this->session->flashdata('success')) { ?>
        <script>
            $('#successModal').modal('show');
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('error')) { ?>
        <script>
            $('#errorModal').modal('show');
        </script>
    <?php } ?>

</body>

</html>