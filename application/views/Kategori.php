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
                                    <h5 class="card-title">Data Kategori</h5>
                                    <?php echo $this->session->flashdata('message'); ?>
                                    <a class="btn btn-primary mb-3" href="<?php echo base_url('index.php/kategori/tambah'); ?>">
                                        <i class="bx bx-plus me-1"></i> Tambah Kategori
                                    </a>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>NO</th>
                                                    <th>NAMA KATEGORI</th>
                                                    <th>AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody class="table-border-bottom-0">
                                                <?php if (empty($kategori)): ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center">Data kategori tidak tersedia.</td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php $no = 1; ?>
                                                    <?php foreach ($kategori as $row): ?>
                                                        <tr>
                                                            <td><?php echo $no++; ?></td>
                                                            <td><?php echo $row['nama_kategori']; ?></td>
                                                            <td>
                                                                <a href="<?php echo base_url('index.php/kategori/edit/' . $row['id']); ?>" class="btn btn-sm btn-warning"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                <a href="<?php echo base_url('index.php/kategori/hapus/' . $row['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"><i class="bx bx-trash me-1"></i> Hapus</a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('layouts/footer'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
</body>