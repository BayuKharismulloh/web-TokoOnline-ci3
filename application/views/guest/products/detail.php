<div class="content-wrapper mt-5">
    <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-white">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/product">Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $product['name'] ?></li>
        </ol>
    </nav> -->

    <div class="row">
        <div class="col-12 col-md-6">
            <img src="<?= base_url($product['image']) ?>" alt="<?= $product['name'] ?>" class="img-fluid img-thumbnail rounded">
        </div>
        <div class="col-12 col-md-6">
            <h2 class="mb-3"><?= $product['name'] ?></h2>
            <h2 class="mb-3"><b><?= rupiah($product['sale_price']) ?></b></h2>
            <p><?= $product['description'] ?></p>
        </div>
    </div>
</div>