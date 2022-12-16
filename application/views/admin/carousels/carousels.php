<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h4 mb-0 text-gray-800">Carousel</h1>
    <a href="<?= base_url() ?>admin/carousel/add" class="btn btn-light text-primary"><i class="fa fa-plus"></i> Tambah carousel</a>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="30%">Judul</th>
                            <th>Tautan</th>
                            <th>Status</th>
                            <th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carousels as $c) : ?>
                            <tr>
                                <td class="text-wrap">
                                    <div class="d-flex">
                                        <div class="pr-2 flex-shrink-0">
                                            <img src="<?= base_url() . $c['image'] ?>" class="img-thumbnail" width="128px" style="object-fit: contain" alt="<?= $c['title'] ?>">
                                        </div>
                                        <div class="pl-2 flex-grow-1">
                                            <p class="mb-1"><?= $c['title'] ?></p>
                                            <small class="text-muted">Carousel <?= $c['sequence'] ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td><a href="<?= $c['link'] ?>"><?= $c['link'] ?></a></td>
                                <td>
                                    <?php
                                    switch ($c['status']) {
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
                                    <a href="<?= base_url() ?>admin/carousel/edit/<?= $c['id'] ?>" class="btn btn-light btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#deleteModal<?= $c['id'] ?>" class="btn btn-light btn-sm">
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

<?php foreach ($carousels as $c) : ?>

    <div class="modal fade" id="deleteModal<?= $c['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/carousel/delete') ?>
                    <?= form_hidden('carousel_id', $c['id']) ?>
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