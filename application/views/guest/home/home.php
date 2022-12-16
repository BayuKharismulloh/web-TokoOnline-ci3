<div id="carouselExampleControls" class="carousel slide mb-3" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php
        $i = 0;
        foreach ($carousels as $c) :
        ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?= $i == 0 ? 'active' : '' ?>"></li>
        <?php
            $i++;
        endforeach;
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($carousels as $c) :
        ?>
            <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>" data-interval="5000">
                <img src="<?= base_url($c['image']) ?>" class="d-block w-100" alt="<?= $c['title'] ?>">
            </div>
        <?php
            $i++;
        endforeach;
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
</div>

<section class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="text-uppercase mb-0"><strong>Produk kami</strong></h3>
        <a class="text-dark text-decoration-none" href="/product/">Lihat katalog produk <i class="fa fa-chevron-right"></i></a>
    </div>
    <hr class="stylized-divider" />

    <div class="row">
        <?php foreach ($products as $p) : ?>
            <div class="col-6 col-md-3 px-4">
                <div class="card border-0 shadow h-100">
                    <img src="<?= base_url($p['image']) ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                    <div class="card-body">
                        <h6 class="card-title"><?= $p['name'] ?></h6>
                        <h4 class="card-text mb-3"><b><?= rupiah($p['sale_price']) ?></b></h4>

                        <a href="/product/<?= $p['id'] ?>" class="btn btn-success btn-sm">Lihat produk</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="bg-dark-green text-white py-8">
    <div class="text-wrap text-center">
        <h1><b>Kami siap <br /> menyediakan kebutuhan anda</b></h1>
    </div>
</section>

<section class="content-wrapper">
    <h3 class="text-uppercase mb-0"><strong>Hubungi kami</strong></h3>
    <hr class="stylized-divider" />

    <div class="row">
        <div class="col-12 col-md-6 mb-5 mb-md-0">
            <h5><b>Sumber Rezeki</b></h5>
            <p class="mb-1">Sumber rezeki</p>
            <p class="mb-1">Jl. Jalan</p>
            <p class="mb-5">Surabaya, 1234</p>

            <p class="mb-1"><i class="fa fa-phone"></i> 0812-3456-789</p>
            <p class="mb-1"><i class="fa fa-envelope"></i> sumberrezeki@gmail.com</p>
        </div>
        <div class="col-12 col-md-6">
            <div class="mb-3">
                <label for="full_name" class="form-label">Nama lengkap</label>
                <input type="text" name="full_name" id="full_name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea name="message" id="message" class="form-control" rows="4"></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success">Kirim</button>
            </div>
        </div>
    </div>
</section>