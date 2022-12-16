<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Kategori</h1>
    <a href="<?= base_url() ?>admin/category/add" class="btn btn-light text-primary"><i class="fa fa-plus"></i> Tambah kategori</a>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $c) : ?>
                            <tr>
                                <td>
                                    <h5><span class="badge badge-light"><?= $c['name'] ?></span></h5>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>admin/category/edit/<?= $c['id'] ?>" class="btn btn-light btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editModal<?= $c['id'] ?>" class="btn btn-light btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($categories as $c) : ?>

    <div class="modal fade" id="editModal<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/category/delete') ?>
                    <?= form_hidden('category_id', $c['id']) ?>
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