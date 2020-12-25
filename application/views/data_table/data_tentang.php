<div class="col-md-12 col-sm-12 ">
    <div class="page-title">
        <div class="title_left">
            <h3>DATA TENTANG</h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA TENTANG</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <button type="button" class="btn btn-primary tombolTambahTentang" data-toggle="modal" data-target=".bs-example-modal-lg" style="float: right;"><i class="fa fa-plus"></i> Add Tentang</button>
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <?= $this->session->flashdata('message'); ?>
                                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('tentang'); ?>"></div>
                                <?php if ($this->session->flashdata('tentang')) : ?>
                                <?php endif; ?>
                                <br><br><br>
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Tentang</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tentang as $val) { ?>
                                        <tr>
                                            <td>
                                                <center><?= $i++; ?></center>
                                            </td>
                                            <td><?= $val['nama_tentang']; ?></td>
                                            <td>
                                                <center>
                                                    <!-- <button type="button" name="ubah" data-toggle="modal" data-target="#modalJenis" id="tombolUbahJenis" class="btn btn-success btn-sm tombolUbahJenis" data-id="<?= $val['id_jenis']; ?>"><i class="fa fa-pencil"></i></button> -->
                                                    <button type="button" name="ubah" data-toggle="modal" data-target=".bs-example-modal-lg" id="tombolUbahTentang" class="btn btn-success btn-sm tombolUbahTentang" data-id="<?= $val['id_tentang']; ?>"><i class="fa fa-pencil"></i></button>
                                                    <button href="<?= site_url('Tentang/delete_tentang/' . md5($val['id_tentang'])) ?>" type="button" class="btn btn-danger btn-sm tombol-hapus"><i class="fa fa-trash"></i></button>
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

<!-- Large Modal Tentang -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="judulModal">Input Data</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('Tentang') ?>" method="POST">
                    <input type="hidden" id="id" name="id">
                    <div class="row form-group">
                        <label class="col-form-label col-md-2 col-sm-2">Tentang<font color="red">*</font></label>
                        <div class="col-md col-sm">
                            <!-- <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Masukkan nama jenis" required="required" value="<?= set_value('nama'); ?>" /> -->
                            <textarea name="tentang" id="inputTentang" placeholder="Masukkan Tentang" style="width: 100%;" rows="5" required></textarea>
                            <td><?php echo form_error('tentang'); ?></td>
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
    //UPDATE TENTANG
    $('.tombolUbahTentang').on('click', function() {
        $('#judulModal').html('Update Data Tentang');
        $('.modal-footer button[type=submit]').html('Update Data');
        $('.modal-body form').attr('action', '<?= base_url('Tentang/saveUpdate_tentang') ?>');

        const id = $(this).data('id');

        $.ajax({
            url: '<?= base_url('Tentang/update_tentang') ?>',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id_tentang);
                $('#inputTentang').val(data.nama_tentang);
            }
        });
    });
</script>