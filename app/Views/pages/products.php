<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<!-- Cards -->
<div class="container ">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan') ?>
        </div>
    <?php endif; ?>
    <div class="row g-4" data-aos="fade-up">
        <?php foreach ($products as $product) { ?>
            <div class="col-12 col-md-6 col-lg-4 my-3">
                <div class="card">
                    <img src="<?php echo base_url('img/' . $product['image']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $product['name'] ?></h5>
                        <p class="card-text"> <?php echo $product['description'] ?>h!</p>
                        <p class="price">Rp <?php echo $product['price'] ?></p>
                        <a href="<?php echo site_url('products/edit/' . $product['product_id']) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?php echo site_url('products/delete/' . $product['product_id']) ?>" class="btn btn-secondary">Delete</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="col-12 col-md-6 col-lg-4 ">
            <div class="card d-flex justify-content-center ">
                <a href="<?php echo site_url('products/create') ?>" class="btn btn-primary"><i></i>Add</a>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>