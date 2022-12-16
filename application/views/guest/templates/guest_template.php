<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link href="https://fonts.googleapis.com/css?family=Inter:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/guest/css/app.css') ?>">

    <script src="https://kit.fontawesome.com/a228d0b067.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" style="z-index: 30">
        <a class="navbar-brand" href="#"><img src="<?= site_logo() ?>" width="170px" alt="site-logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-link <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'home' ? 'active' : ''  ?>" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link <?= $this->uri->segment(1) == 'product' ? 'active' : ''  ?>" href="<?= base_url('product') ?>">Produk</a>
                <a href="<?= base_url('admin/sign-in') ?>" class="nav-link text-success">Login</a>
                <a href="<?= base_url('admin/sign-up') ?>" class="nav-link text-success">Register</a>
            </div>
        </div>
    </nav>

    <main>
        <?= $contents ?>
    </main>

    <footer class="mt-auto p-3 text-white">
        <div class="row align-items-center">
            <div class="col-12 col-md-2 mb-3 mb-md-0">
                <img src="<?= base_url('assets/images/logos/sumber-rezeki-white.svg') ?>" alt="site-logo" class="img-fluid">
            </div>
            <div class="col-12 col-md-8 mb-3 mb-md-0">
                <p class="mb-0 small">Sumber rezeki</p>
                <p class="mb-0 small">Jl. jalan</p>
                <p class="mb-0 small">Surabaya, 12345</p>
            </div>
            <div class="col-12 col-md-2">
                <p class="mb-0 small"><i class="fa fa-phone"></i> 0812-3456-789</p>
                <p class="mb-0 small"><i class="fa fa-envelope"></i> sumberrezeki@gmail.com</p>
            </div>
        </div>
    </footer>
</body>

</html>