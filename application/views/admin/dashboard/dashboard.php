<!-- Page Heading -->
<div class="d-sm-flex align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


<?php

// Manager display

if ($this->session->role_id == 1) {
?>
    <div class="row">
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Produk</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-boxes"></i></span>
                    </div>
                    <h4><b><?= $product_count ?></b></h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Kategori</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-hashtag"></i></span>
                    </div>
                    <h4><b><?= $category_count ?></b></h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Carousel</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-images"></i></span>
                    </div>
                    <h4><b><?= $carousel_count ?></b></h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Approval</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-clipboard-list"></i></span>
                    </div>
                    <h4><b><?= $pending_approval_count ?></b></h4>
                </div>
            </div>
        </div>
    </div>
<?php
    // Staff dashboard
} else { ?>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Produk</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-boxes"></i></span>
                    </div>
                    <h4><b><?= $product_count ?></b></h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Kategori</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-hashtag"></i></span>
                    </div>
                    <h4><b><?= $category_count ?></b></h4>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5>Carousel</h5>
                        <span class="badge badge-light rounded-circle p-3"><i class="fa fa-images"></i></span>
                    </div>
                    <h4><b><?= $carousel_count ?></b></h4>
                </div>
            </div>
        </div>
    </div>
<?php } ?>