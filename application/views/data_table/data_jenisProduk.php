<div class="col-md-12 col-sm-12 ">
    <div class="page-title">
        <div class="title_left">
            <h3>DATA JENIS PRODUK</h3>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>DATA JENIS PRODUK</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <a href="<?= base_url("Export/excel_jenis") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        Excel
                    </a>
                    <a href="<?= base_url("Export/pdf_jenis") ?>" class="btn btn-primary" style="float: left">
                        <i class="fa fa-download"></i>
                        PDF
                    </a>
                    <button type="button" id="tombolTambahJenis" class="btn btn-primary tombolTambahJenis" data-toggle="modal" data-target="#modalJenis" style="float: right">
                        <i class="fa fa-plus"></i>
                        Add Jenis
                    </button>
                    <div class="card-box table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <?= $this->session->flashdata('message'); ?>
                            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('jenis'); ?>"></div>
                            <?php if ($this->session->flashdata('jenis')) : ?>
                            <?php endif; ?>
                            <br><br><br>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Jenis Produk</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($jenis as $val) { ?>
                                    <tr>
                                        <td>
                                            <center><?= $i++; ?></center>
                                        </td>
                                        <td><?= $val['nama_jenis']; ?></td>
                                        <td>
                                            <center>
                                                <button type="button" name="ubah" data-toggle="modal" data-target="#modalJenis" id="tombolUbahJenis" class="btn btn-success btn-sm tombolUbahJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></button>
                                                <a href="<?= site_url('Admin/delete_jenis/' . md5($val['id_jenis'])) ?>"><button href="<?= site_url('Admin/delete_jenis/' . md5($val['id_jenis'])) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button></a>
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



<!-- Modal Jenis Produk -->
<div class="modal fade" id="modalJenis" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/data_jenisProduk') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Jenis<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan nama jenis" required="required" value="<?= set_value('nama'); ?>" />
                            <td><?php echo form_error('jenis'); ?></td>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="judulModalJenis" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModalJenis">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/save_unit') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Jenis<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan nama jenis" required="required" value="<?= set_value('nama'); ?>" />
                            <td><?php echo form_error('jenis'); ?></td>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>