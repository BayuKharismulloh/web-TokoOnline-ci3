<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h4 mb-0 text-gray-800">Tambah carousel</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?= form_open_multipart() ?>

                <div class="mb-3">
                    <label for="carousel_image" class="form-label">Gambar carousel (Maksimal 2mb)</label>
                    <input type="file" name="carousel_image" id="carousel_image" class="form-control <?= isset($pic_error) ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback">
                        <?= isset($pic_error) ? $pic_error : '' ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="carousel_title" class="form-label">Judul</label>
                    <input type="text" name="carousel_title" id="carousel_title" value="<?= set_value('carousel_title') ?>" class="form-control <?= form_error('carousel_title') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback">
                        <?= form_error('carousel_title') ?>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="carousel_link" class="form-label">Link</label>
                    <textarea name="carousel_link" id="carousel_link" class="form-control <?= form_error('carousel_link') ? 'is-invalid' : '' ?>" rows="5"><?= set_value('carousel_link') ?></textarea>
                    <div class="invalid-feedback">
                        <?= form_error('carousel_link') ?>
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