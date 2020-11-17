<div class="col-md-12">
    <div class="card text-black mb-3" style="max-width: 100%;">
        <div class="card-header text-white" style="background: #288ACB;">
            <h6 class="m-0"><b><i class="fa fa-search"></i>&emsp; CARI PRODUK HUKUM</b></h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('Jdih/cari'); ?>" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <input type="text" class="form-control" id="prohum" name="prohum" placeholder="Cari produk hukum" autocomplete="off">
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
                <input type="submit" name="submit" class="btn text-white" style=" padding: 10px 30px 10px 30px; float:right; background: #288ACB">
                <!-- <button type="submit" class="btn text-white" style=" padding: 10px 30px 10px 30px; float:right; background: #288ACB">Cari</button> -->
            </form>
        </div>
    </div>
</div>