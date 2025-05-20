<?php $this->load->view('layouts/header'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php $this->load->view('layouts/sidebar'); ?>
            
            <div class="layout-page">
                <?php $this->load->view('layouts/navbar'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Produk</h5>
                                    <?php echo $this->session->flashdata('message'); ?>
                                    <a class="btn btn-primary mb-3" href="<?php echo base_url('index.php/kelola_produk/tambah'); ?>">
                                        <i class="bx bx-plus me-1"></i> Tambah Produk
                                    </a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA PRODUK</th>
                                                    <th>KATEGORI</th>
                                                    <th>STOK</th>
                                                    <th>HARGA</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                if (!empty($produk)) :
                                                    foreach ($produk as $prd) : ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $prd['nama_produk']; ?></td>
                                                            <td><?php echo $prd['nama_kategori']; ?></td>
                                                            <td><?php echo $prd['stok']; ?></td>
                                                            <td><?php echo $prd['harga']; ?></td>
                                                            <td>
                                                            <a href="<?php echo base_url('index.php/kelola_produk/detail/' . $prd['id']); ?>">
                                                                    <div class="btn btn-success btn-sm">
                                                                        <i class="tf-icons bx bx-search"></i>
                                                                    </div>
                                                                </a>
                                                                <a onclick="javascript: return confirm('Anda yakin ingin menghapus produk ini?')" href="<?php echo base_url('index.php/kelola_produk/hapus/' . $prd['id']); ?>">
                                                                    <div class="btn btn-danger btn-sm">
                                                                        <i class="tf-icons bx bx-trash"></i>
                                                                    </div>
                                                                </a>
                                                                <a href="<?php echo base_url('index.php/kelola_produk/edit/' . $prd['id']); ?>">
                                                                    <div class="btn btn-primary btn-sm ms-2">
                                                                        <i class="tf-icons bx bx-edit"></i>
                                                                    </div>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;
                                                else : ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="alert alert-info">Data produk belum tersedia.</div>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('layouts/footer'); ?>