<div class="col-md-12 col-sm-12 ">
    <div class="page-title">
        <div class="title_left">
            <h3>DATA KATEGORI</h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA KATEGORI</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" id="tombolTambahKategori" class="btn btn-primary tombolTambahKategori" data-toggle="modal" data-target="#modalKategori" style="float: right">
                            <i class="fa fa-plus"></i>
                            Add Kategori
                        </button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('kategori'); ?>"></div>
                                <?php if ($this->session->flashdata('kategori')) : ?>
                                <?php endif; ?>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Nama Kategori</th>
                                        <th class="text-center">Jenis Produk Hukum</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kat as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['nama_kategori']; ?></td>
                                            <td><?= $val['nama_jenis']; ?></td>
                                            <td>
                                                <center>
                                                    <button type="button" name="ubah" data-toggle="modal" data-target="#modalKategori" id="tombolUbahKategori" class="btn btn-success btn-sm tombolUbahKategori" data-id="<?= $val['id_kategori']; ?>"><i class="fa fa-pencil"></i></button>
                                                    <button href="<?= site_url('Admin/delete_kategori/' . md5($val['id_kategori'])) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button>
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
</div>


<!-- Modal Kategori -->
<div class="modal fade" id="modalKategori" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Input Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Admin/data_kategori') ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group row">
                        <label class="control-label col-md-2 col-sm-2">Jenis Produk</label>
                        <div class="col-md col-sm ">
                            <select name="id_jenis" id="id_jenis" class="form-control">
                                <?php foreach ($jenis as $val) { ?>
                                    <option value="<?= $val['id_jenis']; ?>"><?= $val['nama_jenis']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Kategori<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Masukkan nama kategori" required="required" value="<?= set_value('kategori'); ?>" />
                            <td><?php echo form_error('kategori'); ?></td>
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

<script>
    //UPDATE KATEGORI
    $('.tombolUbahKategori').on('click', function() {
        $('#judulModal').html('Update Data Kategori');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '<?= base_url('Admin/saveUpdate_kategori') ?>');

        const id = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Admin/update_kategori') ?>',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_kategori);
                $('#id_jenis').val(data.id_jenis);
                $('#kategori').val(data.nama_kategori);
            }
        });
    });
</script>