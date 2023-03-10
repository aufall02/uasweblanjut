<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
	<h1><?= $title ?></h1>
	<div class="card mb-3">
		<div class="card-header">
			<a href="<?php echo site_url('/products') ?>"><i class="fas fa-arrow-left"></i> Back</a>
		</div>
		<div class="card-body">
			<form action="/products/save" method="post" enctype="multipart/form-data">
				<?= csrf_field(); ?>
				<div class="form-group">
					<label for="name">Name*</label>
					<input class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ""; ?>" type="text" name="name" placeholder="Product name" value="<?= old('name') ?>" />
					<div class="invalid-feedback">
						<?php echo 'name' ?>
					</div>
				</div>
				<div class="form-group">
					<label for="price">Price*</label>
					<input class="form-control  <?= ($validation->hasError('price')) ? 'is-invalid' : ""; ?>" type="text" name="price" min="0" placeholder="Product price" value="<?= old('price') ?>" />
					<div class="invalid-feedback">
						<?php echo 'price' ?>
					</div>
				</div>


				<div class="form-group my-2">
					<label for="custom-file">image*</label>
					<div class="custom-file">
						<input type="file" class="image" id="image" name="image" onchange="labelImage()">
						<label class="custom-file-label" for="image" >Choose file</label>
					</div>
				</div>
				<div class="form-group my-3">
					<label for="name">Description*</label>
					<input class="form-control  <?= ($validation->hasError('description')) ? 'is-invalid' : ""; ?>" name="description" placeholder="Product description..." value="<?= old('description') ?>"></input>
					<div class="invalid-feedback">
						<?php echo 'description' ?>
					</div>
				</div>
				<input class="btn btn-primary" type="submit" name="btn" value="Save" />
			</form>
		</div>

		<div class="card-footer small text-muted">
			* required fields
		</div>
	</div>
</div>

<?= $this->endSection() ?>