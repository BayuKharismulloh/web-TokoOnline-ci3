<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h4 mb-0 text-gray-800">Ubah produk</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= form_open_multipart() ?>

                <div class="mb-3">
                    <label for="product_image" class="form-label">Gambar produk (optional)</label>
                    <input type="file" name="product_image" id="product_image" class="form-control <?= form_error('product_image') ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?= form_error('product_image') ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_name" class="form-label">Nama produk</label>
                    <input type="text" name="product_name" id="product_name" value="<?= set_value('product_name', $product['name']) ?>" class="form-control <?= form_error('product_name') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback">
                        <?= form_error('product_name') ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Pilih kategori</option>
                        <?php foreach ($categories as $c) : ?>
                            <option value="<?= $c['id'] ?>" <?= $c['id'] == $product['category_id'] ? 'selected' : '' ?>><?= ucwords($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= form_error('category_id') ?>
                    </div>
                </div>

                <div class="row row-cols-2 mb-3">
                    <div class="col">
                        <label for="product_price" class="form-label">Harga beli</label>
                        <input type="text" name="product_price" id="product_price" value="<?= set_value('product_price', $product['price']) ?>" class="form-control <?= form_error('product_price') ? 'is-invalid' : '' ?>" required>
                        <div class="invalid-feedback">
                            <?= form_error('product_price') ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="product_sale_price" class="form-label">Harga jual</label>
                        <input type="text" name="product_sale_price" id="product_sale_price" value="<?= set_value('product_sale_price', $product['sale_price']) ?>" class="form-control <?= form_error('product_sale_price') ? 'is-invalid' : '' ?>" required>
                        <div class="invalid-feedback">
                            <?= form_error('product_sale_price') ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Deskripsi produk</label>
                    <textarea name="product_description" rows="5" class="form-control"><?= set_value('product_description', $product['description']) ?></textarea>
                    <div class="invalid-feedback">
                        <?= form_error('product_description') ?>
                    </div>
                </div>

                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Publish</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>