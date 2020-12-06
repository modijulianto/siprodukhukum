<div class="page-title">
    <div class="title_left">
        <h3>DATA PRODUK HUKUM</h3>
    </div>
</div>
<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>DATA PRODUK HUKUM</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <a href="<?= base_url("Export/pdf_prohum") ?>" data-toggle="modal" data-target="#modalExport" class="btn btn-primary" style="float: left">
                            <i class="fa fa-download"></i>
                            Export
                        </a>
                        <a href="<?= base_url('Admin/input_produkHukum'); ?>" class="btn btn-primary" style="float: right">
                            <i class="fa fa-plus"></i>
                            Add Produk Hukum
                        </a>
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
                                            <td><?= (str_word_count($val['nama_tentang'])) > 10 ? substr($val['nama_tentang'], 0, 100) . " [..]" : $val['nama_tentang']; ?></td>
                                            <td><?= $val['nama_kategori']; ?></td>
                                            <td><?= $val['tahun']; ?></td>
                                            <td><?= $val['keterangan']; ?></td>
                                            <td><?= $val['status']; ?></td>
                                            <td>
                                                <center>
                                                    <a href="<?= site_url('Admin/detail_produkHukum/' . md5($val['id_produk'])) ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a href="<?= site_url('Admin/update_produkHukum/' . md5($val['id_produk'])) ?>" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                                    <a href="<?= site_url('Admin/delete_produkHukum/' . md5($val['id_produk'])) ?>" class="btn btn-sm btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
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

    <!-- Modal Export -->
    <div class="modal fade" id="modalExport" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Export Data Produk Hukum</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= site_url('Export/excel_prohum') ?>" method="POST" enctype="multipart/form-data">
                        <label>Export Berdasarkan</label><br>
                        <select name="filter" id="filter" class="form-control">
                            <option value="1">Semua Produk Hukum</option>
                            <option value="2">Per Tahun</option>
                        </select>

                        <div id="form-tahun">
                            <label>Tahun</label><br>
                            <select name="tahun" id="tahun" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($opt_tahun as $val) { ?>
                                    <option value="<?= $val['tahun']; ?>"><?= $val['tahun']; ?></option>
                                <?php } ?>
                            </select>
                        </div>


                        <div class="form-group mt-4">
                            <hr color="blue" class>
                            <select name="filterUnit" id="filterUnit" class="form-control">
                                <option value="1">Semua Unit</option>
                                <option value="2">Pilih Unit</option>
                            </select>
                        </div>

                        <div class="form-group mt-4" id="form-unit">
                            <!-- <label>Pilih unit : </label><br> -->
                            <?php foreach ($unit as $val) { ?>
                                <input type="checkbox" class="flat" value="<?= $val['id_unit']; ?>" name="unit[]" id="unit[]">&emsp; <?= $val['nama_unit']; ?> <br>
                            <?php } ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="excelProhum"><i class="fa fa-download"></i> Excel</button>
                            <button type="submit" class="btn btn-primary" id="pdfProhum"><i class="fa fa-download"></i> Pdf</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {
        $(document).ready(function() { // Ketika halaman selesai di load
            $('#form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

            $('#filter').change(function() { // Ketika user memilih filter
                if ($(this).val() == '1') { // Jika filter nya 1 (semua produk hukum)
                    $('#form-tahun').hide(); // sembunyikan form tahun
                    $('#tahun').val('');
                } else if ($(this).val() == '2') { // Jika filter nya 2 (per tahun)
                    $('#form-tahun').show(); // Tampilkan form tahun
                }

                $('#form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
            })

            $('#form-unit').hide();
            // jika filter untuk unit diubah
            $('#filterUnit').change(function() {
                if ($(this).val() == '1') { //jika user memilih semua
                    $('#form-unit').hide();
                } else if ($(this).val() == '2') {
                    $('#form-unit').show();
                }
            })
        })

        // PENGELUARAN
        $('#excelProhum').on('click', function() {
            $('.modal-body form').attr('action', '<?= site_url('Export/excel_prohum') ?>');
        });

        $('#pdfProhum').on('click', function() {
            $('.modal-body form').attr('action', '<?= site_url('Export/pdf_prohum') ?>');
        });
    })
</script>