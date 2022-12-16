<div class="row justify-content-center">
    <div class="col-4">
        <div class="card my-5 border-0 shadow">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="<?= site_logo() ?>" alt="site-logo" class="w-75">
                </div>

                <hr class="my-3" />

                <?php if ($this->session->flashdata('success')) {
                    echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
                } ?>

                <?= form_open() ?>
                <div class="mb-3">
                    <label for="full_name" class="form-label">Nama lengkap</label>
                    <input type="text" name="full_name" id="full_name" value="<?= set_value('full_name') ?>" class="form-control <?= form_error('full_name') ? 'is-invalid' : '' ?>" required autofocus>
                    <div class="invalid-feedback"><?= form_error('full_name') ?></div>
                </div>

                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" name="user_name" id="user_name" value="<?= set_value('user_name') ?>" class="form-control <?= form_error('user_name') ? 'is-invalid' : '' ?>" required autofocus>
                    <div class="invalid-feedback"><?= form_error('user_name') ?></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" value="<?= set_value('email') ?>" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" required autofocus>
                    <div class="invalid-feedback"><?= form_error('email') ?></div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback"><?= form_error('password') ?></div>
                </div>

                <div class="mb-3">
                    <label for="password_confirm" class="form-label">Konfirmasi password</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control <?= form_error('password_confirm') ? 'is-invalid' : '' ?>" required>
                    <div class="invalid-feedback"><?= form_error('password_confirm') ?></div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Daftar</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>