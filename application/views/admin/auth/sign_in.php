<div class="row justify-content-center">
    <div class="col-4">
        <div class="card my-5 border-0 shadow">
            <div class="card-body">
                <div class="text-center mb-3">
                    <img src="<?= site_logo() ?>" alt="site-logo" class="w-75">
                </div>

                <hr class="my-3" />

                <?php
                if (validation_errors()) {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ' . validation_errors('<span>', '</span>') . '
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
                }
                ?>

                <?= form_open() ?>
                <div class="mb-3">
                    <label for="user_name" class="form-label">Username</label>
                    <input type="text" name="user_name" id="user_name" value="<?= set_value('user_name') ?>" class="form-control <?= form_error('user_name') ? 'is-invalid' : '' ?>" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control <?= form_error('user_name') ? 'is-invalid' : '' ?>" required>
                </div>

                <button type="submit" class="btn btn-success btn-block">Masuk</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>