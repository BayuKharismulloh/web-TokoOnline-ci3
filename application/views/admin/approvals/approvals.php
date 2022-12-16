<h1 class="h3 mb-4">Approval</h1>

<div class="row">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="60%">Pengajuan</th>
                            <th>Status</th>
                            <th><span class="sr-only">Aksi</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($approvals as $a) : ?>
                            <tr>
                                <td class="text-wrap">
                                    <div class="d-flex">
                                        <div class="pr-2 flex-shrink-0">
                                            <img src="<?= base_url() . $a['image'] ?>" width="50" class="rounded-circle" alt="avatar">
                                        </div>
                                        <div class="pl-2">
                                            <p class="mb-1"><?= $a['title'] ?></p>
                                            <p class="mb-1 small text-muted"><?= date('d/m/Y', strtotime($a['created_at'])) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?php
                                    switch ($a['status']) {
                                        case 'DENIED':
                                            echo '<span class="badge badge-danger">DENIED</span>';
                                            break;

                                        case 'IN_REVIEW':
                                            echo '<span class="badge badge-warning">IN REVIEW</span>';
                                            break;

                                        case 'APPROVED':
                                            echo '<span class="badge badge-success">APPROVED</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#detailModal<?= $a['id'] ?>" class="btn btn-light btn-sm rounded-circle">
                                        <i class="fa fa-eye"></i>
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

<?php
foreach ($approvals as $a) :
    if ($a['type'] == 'product') {
        $detail = $this->product->getProduct($a['refference_id']);
    } else if ($a['type'] == 'product') {
        $detail = $this->carousel->getCarousel($a['refference_id']);
    } else {
        $detail = $this->user->getUserByID($a['refference_id']);
    }
?>
    <div class="modal fade" id="detailModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rincian pengajuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($a['type'] == 'carousel') { ?>
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <img src="<?= base_url() . $detail['image'] ?>" alt="image" class="img-fluid">
                                </td>
                            </tr>
                            <tr>
                                <th>Judul</th>
                                <td><?= $detail['title'] ?></td>
                            </tr>
                            <tr>
                                <th>Link</th>
                                <td><a href="<?= $detail['link'] ?>"><?= $detail['link'] ?></a></td>
                            </tr>
                            <tr>
                                <th>Urutan</th>
                                <td><?= $detail['sequence'] ?></td>
                            </tr>
                        </table>
                    <?php } else if ($a['type'] == 'product') { ?>
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <img src="<?= base_url() . $detail['image'] ?>" alt="image" class="img-thumbnail" width="120" height="120">
                                </td>
                            </tr>
                            <tr>
                                <th width="40%">Nama produk</th>
                                <td><?= $detail['name'] ?></td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td><span class="badge badge-light"><?= $detail['category_name'] ?></span></td>
                            </tr>
                            <tr>
                                <th>Harga beli</th>
                                <td><?= rupiah($detail['price']) ?></td>
                            </tr>
                            <tr>
                                <th>Harga jual</th>
                                <td><?= rupiah($detail['sale_price']) ?></td>
                            </tr>
                            <tr>
                                <th>Deskripsi produk</th>
                                <td><?= $detail['description'] ?></td>
                            </tr>
                        </table>
                    <?php } else { ?>
                        <table class="table table-bordered">
                            <tr>
                                <td colspan="2" class="text-center">
                                    <img src="<?= base_url() . $detail['image'] ?>" alt="image" class="rounded-circle" width="120" height="120">
                                </td>
                            </tr>
                            <tr>
                                <th width="40%">Nama lengkap</th>
                                <td><?= $detail['full_name'] ?></td>
                            </tr>

                            <tr>
                                <th>Username</th>
                                <td><?= $detail['user_name'] ?></td>
                            </tr>

                            <tr>
                                <th>Email</th>
                                <td><?= $detail['email'] ?></td>
                            </tr>
                        </table>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <?php if ($a['status'] == 'IN_REVIEW') { ?>
                        <button type="button" data-toggle="modal" data-target="#denyModal<?= $a['id'] ?>" data-dismiss="modal" class="btn btn-danger">Tolak</button>
                        <button type="button" data-toggle="modal" data-target="#approveModal<?= $a['id'] ?>" data-dismiss="modal" class="btn btn-success">Terima</button>
                    <?php } else { ?>
                        <button type="button" data-dismiss="modal" class="btn btn-light">Tutup</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="approveModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/approval/approve') ?>
                    <?= form_hidden('approval_id', $a['id']) ?>
                    <div class="text-center py-3">
                        <i class="fa fa-exclamation-circle fa-6x mb-3"></i>
                        <p>Anda akan menerima permintaan ini. Lanjutkan?</p>
                        <button type="button" data-dismiss="modal" class="btn btn-light btn-sm">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm">Terima</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="denyModal<?= $a['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <?= form_open('/admin/approval/deny') ?>
                    <?= form_hidden('approval_id', $a['id']) ?>
                    <div class="text-center py-3">
                        <i class="fa fa-exclamation-circle fa-6x mb-3"></i>
                        <p>Anda akan menolak permintaan ini. Lanjutkan?</p>
                        <button type="button" data-dismiss="modal" class="btn btn-light btn-sm">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>