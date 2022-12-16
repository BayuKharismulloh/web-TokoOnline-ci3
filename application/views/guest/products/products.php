<div class="content-wrapper my-5 my-md-0">
    <div class="row">
        <div class="col-12 col-md-8 py-0 py-md-5 border-right">
            <h3 class="mb-5 text-uppercase"><b>Produk kami</b></h3>
            <div class="row">
                <?php foreach ($products as $p) : ?>
                    <div class="col-6 col-md-3">
                        <a href="<?= base_url('product/' . $p['id']) ?>" class="text-dark text-decoration-none">
                            <div class="card border-0 shadow h-100">
                                <img src="<?= base_url($p['image']) ?>" class="card-img-top" alt="<?= $p['name'] ?>">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <h6 class="card-title"><?= $p['name'] ?></h6>
                                        <h6 class="card-text"><b><?= rupiah($p['sale_price']) ?></b></h6>
                                        <span class="badge badge-light"><?= $p['category_name'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-md-4 py-0 py-md-5">
            <p class="text-uppercase"><i class="fa fa-filter mr-2 mb-4"></i> filter</p>
            <?= form_open('', ['method' => 'get']) ?>
            <div class="mb-3">
                <label for="product_name" class="form-label">Nama produk</label>
                <input type="text" name="product_name" value="<?= get_value('product_name') ?>" id="product_name" class="form-control">
            </div>

            <div class="mb-3">
                <label for="product_name" class="form-label">Kategori</label>
                <select name="category" id="category" class="form-control">
                    <option value="">Semua kategori</option>
                    <?php foreach ($categories as $c) : ?>
                        <option value="<?= $c['id'] ?>" <?= get_select('category', $c['id']) ?>><?= ucwords($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Range harga</label>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="number" name="start_price" id="start_price" value="<?= get_value('start_price') ?>" class="form-control">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" name="end_price" value="<?= get_value('end_price') ?>" id="end_price" class="form-control">
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-success">Filter</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>