<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Produk</h1>
    <a href="<?= base_url() ?>/admin/product/add" class="btn btn-light text-primary"><i class="fa fa-plus"></i> Tambah produk</a>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="35%">Produk</th>
                            <th>Harga beli</th>
                            <th>Harga jual</th>
                            <th>Status</th>
                            <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $p) : ?>
                            <tr>
                                <td class="text-wrap">
                                    <div class="d-flex">
                                        <div class="pr-2 flex-shrink-0">
                                            <img src="<?= base_url() . $p['image'] ?>" class="img-thumbnail" width="64px" height="64px" style="object-fit: contain" alt="<?= $p['name'] ?>">
                                        </div>
                                        <div class="pl-2 flex-grow-1">
                                            <p class="mb-1"><?= $p['name'] ?></p>
                                            <span class="badge badge-light"><?= $p['category_name'] ?></span>
                                        </div>
                                    </div>
                                </td>

                                <td><?= rupiah($p['price']) ?></td>
                                <td><?= rupiah($p['sale_price']) ?></td>
                                <td>
                                    <?php
                                    switch ($p['status']) {
                                        case 'DRAFT':
                                            echo '<span class="badge badge-danger">DRAFT</span>';
                                            break;

                                        case 'IN_REVIEW':
                                            echo '<span class="badge badge-warning">IN REVIEW</span>';
                                            break;

                                        case 'PUBLISHED':
                                            echo '<span class="badge badge-success">PUBLISHED</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url() ?>/admin/product/edit/<?= $p['id'] ?>" class="btn btn-light btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#editModal<?= $p['id'] ?>" class="btn btn-light btn-sm">
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

<?php foreach ($products as $p) : ?>

    <div class="modal fade" id="editModal<?= $p['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/product/delete') ?>
                    <?= form_hidden('product_id', $p['id']) ?>
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