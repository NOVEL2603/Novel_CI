<?php $this->load->view('layouts/header'); ?>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php $this->load->view('layouts/sidebar'); ?>

            <div class="layout-page">
                <nav
                    class="layout-navbar container-xxl navbar-detached navbar navbar-expand-xl align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
                            <i class="icon-base bx bx-menu icon-md"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center justify-content-end" id="navbar-collapse">
                        <div class="navbar-nav align-items-center me-auto">
                            <div class="nav-item d-flex align-items-center">
                                <span class="w-px-22 h-px-22"><i class="icon-base bx bx-search icon-md"></i></span>
                                <input
                                    type="text"
                                    class="form-control border-0 shadow-none ps-1 ps-sm-2 d-md-block d-none"
                                    placeholder="Cari..."
                                    aria-label="Cari..." />
                            </div>
                        </div>
                        <ul class="navbar-nav flex-row align-items-center ms-md-auto">
                            <li class="nav-item lh-1 me-4">
                                <a
                                    class="github-button"
                                    href="https://github.com/themeselection/sneat-bootstrap-html-admin-template-free"
                                    data-icon="octicon-star"
                                    data-size="large"
                                    data-show-count="true"
                                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                                    >Star</a
                                >
                            </li>

                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a
                                    class="nav-link dropdown-toggle hide-arrow p-0"
                                    href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="<?php echo base_url('assets/img/avatars/1.png'); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?php echo base_url('assets/img/avatars/1.png'); ?>" alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="mb-0">Novel aja</h6>
                                                    <small class="text-body-secondary">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-base bx bx-user icon-md me-3"></i><span>Profil Saya</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="icon-base bx bx-cog icon-md me-3"></i><span>Pengaturan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 icon-base bx bx-credit-card icon-md me-3"></i
                                                ><span class="flex-grow-1 align-middle">Billing Plan</span>
                                                <span class="flex-shrink-0 badge rounded-pill bg-danger">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider my-1"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="icon-base bx bx-power-off icon-md me-3"></i><span>Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>

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