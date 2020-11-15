<div class="col-lg-12 col-md-12 mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
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
                        <button type="submit" class="btn text-white" style=" padding: 10px 30px 10px 30px; float:right; background: #288ACB">Cari</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
                    <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; DOKUMEN PRODUK HUKUM</b></h6>
                </div>
                <div class="card-body">
                    <iframe src="<?= base_url('upload/produk/' . $prohum['file']); ?>" width="100%" height="750" frameborder="0"></iframe>
                    <!-- <embed type="application/pdf" src="<?= base_url('upload/produk/' . $prohum['file']); ?>" width="100%" height="500" class="file-preview"></embed> -->
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card text-black mb-3" style="max-width: 100%;">
                <div class="card-header text-white" style="background: #288ACB;">
                    <h6 class="m-0"><b><i class="fa fa-book"></i>&emsp; DETAIL PRODUK HUKUM</b></h6>
                </div>
                <div class="card-body">
                    <b>
                        <font size="3">Nomor</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonNo">#</div>
                        </div>
                        <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['no']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonNo">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Tahun</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonTahun"><i class="fa fa-calendar"></i></div>
                        </div>
                        <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['tahun']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonTahun">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Judul</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonJudul"><i class="fa fa-bookmark"></i></div>
                        </div>
                        <input type="text" class="form-control" style="background: rgba(233, 236, 239, 0.307);" readonly value="<?= $prohum['judul']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJudul">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Tentang</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonTentang"><i class="fa fa-quote-right"></i></div>
                        </div>
                        <textarea name="" id="" class="form-control" style="background: rgba(233, 236, 239, 0.307);" aria-label="Input group example" rows="5" aria-describedby="btnGroupAddonTentang" readonly><?= $prohum['nama_tentang']; ?></textarea>
                    </div>
                    <hr>
                    <b>
                        <font size="3">Jenis</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonJenis"><i class="fa fa-quote-right"></i></div>
                        </div>
                        <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_jenis']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonJenis">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Kategori</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonKategori"><i class="fa fa-quote-right"></i></div>
                        </div>
                        <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_kategori']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonKategori">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Unit</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonUnit"><i class="fa fa-bank"></i></div>
                        </div>
                        <input type="text" style="background: rgba(233, 236, 239, 0.307);" class="form-control" readonly value="<?= $prohum['nama_unit']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonUnit">
                    </div>
                    <hr>
                    <b>
                        <font size="3">Dokumen</font>
                    </b>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text" id="btnGroupAddonDokumen"><i class="fa fa-file-pdf-o"></i></div>
                        </div>
                        <?php $fileDownloadName = str_replace("_", " ", $prohum['file']); ?>
                        <a href="<?= site_url('upload/produk/' . $prohum['file']); ?>" download="<?= $fileDownloadName; ?>" class="form-control" style="background: rgba(233, 236, 239, 0.307);">
                            <font size="3" color="black">Download</font>
                        </a>
                        <!-- <a href="<?= site_url('/'); ?>"><input type="text" class="form-control" readonly value="<?= $prohum['file']; ?>" aria-label="Input group example" aria-describedby="btnGroupAddonDokumen"></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>