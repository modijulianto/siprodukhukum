<div class="col-lg-12 col-md-12 mt-4">
    <div class="row">
        <!-- Load view cari -->
        <?php $this->load->view('frontend/cari'); ?>
    </div>
</div>

<div class="col-ld-12 col-md-12">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
                    <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; PRODUK HUKUM KATEGORI <?= strtoupper($nama_kategori['nama_kategori']); ?></b></h6>
                </div>
                <div class="card-body">
                    <?php if ($prohum == null) { ?>
                        <div class="alert alert-warning" role="alert">
                            <i class="fa fa-close"></i>&emsp; Produk Hukum Tidak Ditemukan
                        </div>
                    <?php } ?>
                    <?php foreach ($prohum as $val) { ?>
                        <div class="produk">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="produk-icon" style="float: left;">
                                        <center><i class="fa fa-book" style="font-size:30px;"></i></center>
                                    </div>
                                    <div class="produk-content text-justify" style="float: right;">
                                        <b><?= $val['judul']; ?> Nomor <?= $val['no']; ?> Tahun <?= $val['tahun']; ?></b>
                                        <br>
                                        <div class="text-secondary">
                                            <font size="2">
                                                <?= (str_word_count($val['nama_tentang'])) > 10 ? substr($val['nama_tentang'], 0, 100) . " [..]" : $val['nama_tentang']; ?>
                                            </font>
                                        </div>
                                        <div class="text-left text-secondary">
                                            Unit : <div class="badge badge-secondary"><?= $val['nama_unit']; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?= site_url('Jdih/produk/' . md5($val['id_produk'])); ?>" class="text-warning stretched-link"></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
                    <h6 class="m-0"><b><i class="fa fa-bank"></i>&emsp; UNIT</b></h6>
                </div>
                <div class="card-body">
                    <?php foreach ($unit as $val) { ?>
                        <div class="unit">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="unit-icon" style="float: left;">
                                        <center><i class="fa fa-building"></i></center>
                                    </div>
                                    <div class="unit-content" style="float: right;">
                                        <?= $val['nama_unit']; ?>
                                    </div>
                                    <div class="unit-count">
                                        <span class="badge badge-info">100</span>
                                    </div>
                                </div>
                                <a href="<?= site_url('Jdih/unit/' . md5($val['id_unit'])); ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>