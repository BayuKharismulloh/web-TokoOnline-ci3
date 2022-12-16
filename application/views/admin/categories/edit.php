<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h4 mb-0 text-gray-800">Ubah kategori</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php
                if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data berhasil disimpan
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }
                ?>
                <?= form_open() ?>
                <div class="mb-3">
                    <label for="category_name" class="form-label">Nama kategori</label>
                    <input type="text" name="category_name" id="category_name" value="<?= set_value('category_name', $category['name']) ?>" class="form-control <?= form_error('category_name') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback">
                        <?= form_error('category_name') ?>
                    </div>
                </div>
                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>