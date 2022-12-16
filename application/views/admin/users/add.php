<h1 class="h3 mb-3">Tambah staff</h1>

<div class="card">
    <div class="card-body">
        <?= form_open_multipart() ?>
        <div class="mb-3">
            <label for="user_image" class="form-label">Foto profil (Maksimal 2mb)</label>
            <input type="file" name="user_image" id="user_image" class="form-control <?= isset($pic_error) ? 'is-invalid' : '' ?>" required>
            <div class="invalid-feedback">
                <?= isset($pic_error) ? $pic_error : '' ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Nama lengkap</label>
            <input type="text" name="full_name" id="full_name" value="<?= set_value('full_name') ?>" class="form-control <?= form_error('full_name') ? 'is-invalid' : '' ?>" required>
            <div class="invalid-feedback">
                <?= form_error('full_name') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="user_name" class="form-label">Username</label>
            <input type="text" name="user_name" id="user_name" value="<?= set_value('user_name') ?>" class="form-control <?= form_error('user_name') ? 'is-invalid' : '' ?>" required>
            <div class="invalid-feedback">
                <?= form_error('user_name') ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="<?= set_value('email') ?>" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" required>
            <div class="invalid-feedback">
                <?= form_error('email') ?>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-12 col-md-6">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" value="<?= set_value('password') ?>" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" required>
                <div class="invalid-feedback">
                    <?= form_error('password') ?>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <label for="password_confirm" class="form-label">Konfirmasi password</label>
                <input type="password" name="password_confirm" id="password_confirm" value="<?= set_value('password_confirm') ?>" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : '' ?>" required>
                <div class="invalid-feedback">
                    <?= form_error('password_confirm') ?>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Simpan</button>
        </div>

        <?= form_close() ?>
    </div>
</div>