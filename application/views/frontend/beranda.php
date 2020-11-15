<div class="col-lg-12 col-md-12 mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-black mb-3" style="max-width: 100%;">
                        <div class="card-header text-white bg-secondary ">
                            <h6 class="m-0"><b><i class="fa fa-search"></i>&emsp; CARI PRODUK HUKUM</b></h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <input type="text" class="form-control" id="prohum" name="prohum" placeholder="Cari produk hukum">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <label for="no">Nomor</label>
                                            <input type="text" class="form-control" id="no" name="no" placeholder="Nomor">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <label for="no">Tahun</label>
                                            <select name="tahun" id="tahun" class="form-control custom-select">
                                                <option value="">Semua</option>
                                                <?php foreach ($tahun as $val) { ?>
                                                    <option value="<?= $val['tahun']; ?>"><?= $val['tahun']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="no">Unit</label>
                                            <select name="unit" id="unit" class="form-control custom-select">
                                                <option value="">Semua</option>
                                                <?php foreach ($unit as $val) { ?>
                                                    <option value="<?= $val['id_unit']; ?>"><?= $val['nama_unit']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="no">Kategori</label>
                                            <select name="id_kategori" id="id_kategori" class="form-control custom-select">
                                                <option value="">Semua</option>
                                                <?php foreach ($kategori as $val) { ?>
                                                    <option value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="form-group">
                                            <label for="no">Status</label>
                                            <select name="status" id="status" class="form-control custom-select">
                                                <option value="">Semua</option>
                                                <?php foreach ($status as $val) { ?>
                                                    <option value="<?= $val['status']; ?>"><?= $val['status']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" class="btn text-white bg-secondary" style=" padding: 10px 20px 10px 20px; float:right">Cari</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card text-black mb-3" style="max-width: 100%;">
                        <div class="card-header text-white" style="background: #288ACB;">
                            <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; PRODUK HUKUM TERBARU</b></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($baru as $val) { ?>
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
                            <!-- <br><br><br> -->
                            <!-- <table class="table table-hover table-borderless m-0">
                                <tbody>
                                    <?php foreach ($baru as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><i class="fa fa-book"></i></center>
                                            </td>
                                            <td class="text-justify">
                                                <b><?= $val['judul']; ?> Nomor <?= $val['no']; ?> Tahun <?= $val['tahun']; ?></b>
                                                <br>
                                                <div class="text-secondary">
                                                    <?= (str_word_count($val['nama_tentang'])) > 10 ? substr($val['nama_tentang'], 0, 100) . " [..]" : $val['nama_tentang']; ?>
                                                </div>
                                                <div class="text-left text-secondary">
                                                    Unit : <div class="badge badge-secondary"><?= $val['nama_unit']; ?></div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
                    <h6 class="m-0"><b><i class="fa fa-institution"></i>&emsp; UNIT</b></h6>
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
                                <a href="<?= site_url('Jdih/produk/' . md5($val['id_unit'])); ?>" class="stretched-link"></a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <table class="table table-hover table-borderless m-0">
                        <tbody>
                            <?php $i = 0;
                            foreach ($unit as $val) { ?>
                                <tr>
                                    <th scope="row"><i class="fa fa-book"></i></th>
                                    <td><?= $val['nama_unit']; ?></td>
                                    <td><span class="badge badge-info">100</span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table> -->
                </div>
            </div>
        </div>
    </div>
</div>