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
                                    <form action="<?php echo base_url('index.php/kategori/proses_tambah'); ?>" method="post">
                                        <div class="mb-3">
                                            <label for="nama_kategori" class="form-label">Nama kategori</label>
                                            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
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