<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<!-- <div class="container-fluid"> -->
<h1><?= $title ?></h1>
<input type="hidden" name="fileLama" id="fileLama" value="<?= $product['image'] ?>">
<div class="card mb-3">
	<div class="card-header">
		<a href="<?php echo site_url('/products') ?>"><i class="fas fa-arrow-left"></i> Back</a>
	</div>
	<div class="card-body">
		<form action="/products/update/<?= $product['product_id'] ?>" method="post" enctype="multipart/form-data">
			<?= csrf_field(); ?>
			<input type="hidden" name="fileLama" id="fileLama" value="<?= $product['image'] ?>">
			<div class="form-group">
				<label for="name">Name*</label>
				<input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ""; ?>" type="text" name="name" placeholder="Product name" value="<?= $product['name'] ?>" />
				<div class="invalid-feedback">
					<?php echo 'name' ?>
				</div>
			</div>

			<div class="form-group">
				<label for="price">Price*</label>
				<input class="form-control  <?= ($validation->hasError('price')) ? 'is-invalid' : ""; ?>" type="text" name="price" min="0" placeholder="Product price" value="<?= $product['price'] ?>" />
				<div class="invalid-feedback">
					<?php echo 'price' ?>
				</div>
			</div>


			<div class="form-group my-2">
				<label for="custom-file">image*</label>
				<div class="custom-file">
					<input type="file" class="image" id="image" name="image" onchange="labelImage()">
					<label class="custom-file-label" for="image"><?= $product['image'] ?></label>
				</div>
			</div>

			<div class="form-group my-3">
				<label for="name">Description*</label>
				<input class="form-control  <?= ($validation->hasError('description')) ? 'is-invalid' : ""; ?>" name="description" placeholder="Product description..." value="<?= $product['description'] ?>"></input>
				<div class="invalid-feedback">
					<?php echo 'description' ?>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Ubah product</button>
		</form>
	</div>
	<div class="card-footer small text-muted">
		* required fields
	</div>
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>