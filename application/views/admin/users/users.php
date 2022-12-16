<div class="d-flex justify-content-between mb-3">
    <h1 class="h3">Staff</h1>
    <a href="<?= base_url() ?>admin/user/add" class="btn btn-light text-primary"><i class="fa fa-plus"></i> Tambah staff</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Staff</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u) : ?>
                    <tr>
                        <td>
                            <div class="d-flex">
                                <div class="pr-2">
                                    <img src="<?= base_url() . $u['image'] ?>" class="rounded-circle" width="48">
                                </div>
                                <div class="pl-2">
                                    <h6 class="mb-1"><b><?= $u['full_name'] ?></b></h6>
                                    <span class="text-capitalize"><?= $u['role_name'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td><?= $u['user_name'] ?></td>
                        <td><?= $u['email'] ?></td>
                        <td>
                            <?php
                            switch ($u['status']) {
                                case 'inactive':
                                    echo '<span class="badge badge-danger">Inactive</span>';
                                    break;

                                case 'active':
                                    echo '<span class="badge badge-success">active</span>';
                                    break;
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?= base_url() ?>admin/user/edit/<?= $u['id'] ?>" class="btn btn-light btn-sm">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#deleteModal<?= $u['id'] ?>" class="btn btn-light btn-sm">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php foreach ($users as $u) : ?>

    <div class="modal fade" id="deleteModal<?= $u['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/user/delete') ?>
                    <?= form_hidden('user_id', $u['id']) ?>
                    <div class="text-center py-3">
                        <i class="fa fa-exclamation-circle fa-6x mb-3"></i>
                        <p>Apa anda yakin ingin menghapus data ini?</p>
                        <button type="button" data-dismiss="modal" class="btn btn-light btn-sm">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>