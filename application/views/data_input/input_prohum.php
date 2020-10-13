<div class="page-title">
    <div class="title_left">
        <h3>INPUT DATA PRODUK HUKUM</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>INPUT DATA PRODUK HUKUM</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= site_url('Admin/save_produkHukum') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" id="id" name="id">
                        <div class="row form-group">
                            <label class="col-form-label col-md-2 col-sm-2">Nomor<font color="red">*</font></label>
                            <div class="col-md col-sm">
                                <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Masukkan nomor produk hukum" required="required" value="<?= set_value('nomor'); ?>" />
                                <td><?php echo form_error('nomor'); ?></td>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-form-label col-md-2 col-sm-2">Judul<font color="red">*</font></label>
                            <div class="col-md col-sm">
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukkan judul produk hukum" required="required" value="<?= set_value('judul'); ?>" />
                                <td><?php echo form_error('judul'); ?></td>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-form-label col-md-2 col-sm-2">Tentang<font color="red">*</font></label>
                            <div class="col-md-8 col-sm-8">
                                <select class="form-control" name="tentang" id="tentang" required></select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-2 col-sm-2">Kategori</label>
                            <div class="col-md col-sm ">
                                <select name="id_kategori" id="id_kategori" class="form-control">
                                    <?php foreach ($kat as $val) { ?>
                                        <option value="<?= $val['id_kategori']; ?>"><?= $val['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-form-label col-md-2 col-sm-2">Keterangan<font color="red">*</font></label>
                            <div class="col-md col-sm">
                                <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukkan keterangan produk hukum" required="required" value="<?= set_value('keterangan'); ?>" />
                                <td><?php echo form_error('keterangan'); ?></td>
                            </div>
                        </div>
                        <div class="row form-group">
                            <label class="col-form-label col-md-2 col-sm-2">File</label>
                            <div class="col-md col-sm">
                                <input type="file" name="produk" />
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="old_image" id="old_image">
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>