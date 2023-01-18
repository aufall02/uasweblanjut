<?= $this->extend('index') ?>
<?= $this->section('content') ?>

<!-- Cards -->
<div class="container">
    <div class="row g-4" data-aos="fade-up">
        <?php foreach ($products as $product) { ?>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card">
                    <img src="<?php echo base_url('img/' . $product['image']) ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <?php echo $product['name'] ?></h5>
                        <p class="card-text"> <?php echo $product['description'] ?>h!</p>
                        <p class="price">Rp <?php echo $product['price'] ?></p>
                        <a href="https://shopee.co.id/Kaos-distro-Hobbeys-Ride-With-Passion-i.366030836.3972722486?sp_atk=26a11508-e6d2-4e8c-9e1d-30678354be7b&xptdk=26a11508-e6d2-4e8c-9e1d-30678354be7b" class="btn btn-primary" target="_blank">Get it on Shopee</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?= $this->endSection() ?>