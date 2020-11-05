<div class="page-title">
    <div class="title_left">
        <h3>DATA PRODUK HUKUM</h3>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA PRODUK HUKUM</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <a href="<?= base_url("Export/excel_prohum") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        Excel
                    </a>
                    <a href="<?= base_url("Export/pdf_prohum") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        PDF
                    </a>
                    <a href="<?= base_url('Admin/input_produkHukum'); ?>" class="btn btn-primary" style="float: right">
                        <i class="fa fa-plus"></i>
                        Add Produk Hukum</a>
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('prohum'); ?>"></div>
                            <?php if ($this->session->flashdata('prohum')) : ?>
                            <?php endif; ?>
                            <br><br><br>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Judul</th>
                                    <th class="text-center">Tentang</th>
                                    <th class="text-center">Kategori</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Keterangan</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">File</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($prohum as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i++; ?></center>
                                        </td>
                                        <td><?= $val['no']; ?></td>
                                        <td><?= $val['judul']; ?></td>
                                        <td><?= $val['nama_tentang']; ?></td>
                                        <td><?= $val['nama_kategori']; ?></td>
                                        <td><?= $val['tahun']; ?></td>
                                        <td><?= $val['keterangan']; ?></td>
                                        <td><?= $val['status']; ?></td>
                                        <td><?= $val['file']; ?></td>
                                        <td>
                                            <center>
                                                <button type="button" name="ubah" data-toggle="modal" data-target="#modalProdukHukum" id="tombolUbahProdukHukum" class="btn btn-success btn-sm tombolUbahProdukHukum" data-id="<?= $val['id_produk']; ?>"><i class="fa fa-pencil"></i></button>
                                                <button href="<?= site_url('Admin/delete_produkHukum/' . md5($val['id_produk'])) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button>
                                            </center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalProdukHukum" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/data_produkHukum') ?>" method="POST" enctype="multipart/form-data">
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
                        <div class="col-md col-sm">
                            <select class="form-control" name="tentang" id="tentang" required></select>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>