<?php $this->load->view('layouts/header'); ?>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php $this->load->view('layouts/sidebar'); ?>
      
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php $this->load->view('layouts/navbar'); ?>



        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Tambah Produk</h5>
                  <form action="<?php echo base_url(); ?>index.php/Kelola_produk/submit" method="post">
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                      <input type="text" name="nama_produk" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                      <label for="id" class="form-label">Kategori</label>
                      <select class="form-select" id="id" name="kategori" required>
                        <option value="">Pilih Kategori</option>
                        <?php foreach ($kategori as $kat): ?>
                          <option value="<?php echo $kat->id; ?>"><?php echo $kat->nama_kategori; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Stok</label>
                      <input type="text" name="stok" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text"></div>
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Harga</label>
                      <input type="text" name="harga" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- / Content -->

        <?php $this->load->view('layouts/footer'); ?>