<?= $this->extend('index') ?>
<?= $this->section('content') ?>
<body id="page-top">


<div id="wrapper">
  <div id="content-wrapper">

    <div class="container-fluid">
    <h1 style="text-transform: capitalize;" ><?= $title; ?></h1>
   <?php if ( session()->getFlashdata('pesan')): ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan') ?>
      </div>
    <?php endif; ?>
      <!-- DataTables -->
      <div class="card mb-3">
        <div class="card-header">
          <a href="<?php

 echo site_url('products/create') ?>"><i class="fas fa-plus"></i> Add New</a>
        </div>
        <div class="card-body">
          

          <div class="table-responsive">
            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($products as $product){ ?>
                <tr>
                  <td width="150">
                    <?php echo $product['name'] ?>
                  </td>
                  <td>
                    <?php echo $product['price'] ?>
                  </td>
                  <td>
                    <img src="<?php echo base_url('img/'.$product['image']) ?>" width="64"  />
                  </td>
                  <td class="small">
                    <?php echo substr($product['description'], 0, 120) ?>...</td>
                  <td width="250">
                    <a href="<?php echo site_url('products/edit/'.$product['product_id']) ?>"
                     class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                    <a href="<?php echo site_url('products/delete/'.$product['product_id']) ?>" class="btn btn-small text-danger"><i class="fas fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

</body>
<?= $this->endSection() ?>