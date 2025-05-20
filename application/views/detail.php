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
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <div class="table-responsive">
                                    <table class="table table-bordered">
                                               <tr>
                                                <th>Nama Produk</th>
                                                <td><?php echo $detail->nama_produk ?></td>
                                            </tr>
                                            <tr>
                                                <th>Kategori</th>
                                                <td><?php echo $detail->kategori?></td>
                                            </tr>
                                            <tr>
                                                <th>Stok</th>
                                                <td><?php echo $detail->stok?></td>
                                            </tr>
                                            <tr>
                                                <th>Harga</th>
                                                <td><?php echo $detail->harga?></td>
                                            </tr>
                                    </table>
                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $this->load->view('layouts/footer'); ?>