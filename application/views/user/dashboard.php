<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/highcharts/highcharts.js") ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/highcharts/jquery.highchartTable-min.js") ?>"></script>
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>

<div class="col-lg-12 col-md-12">
    <?php foreach ($status as $sts) { ?>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-book"></i></div>
                <div class="count">
                    <div class="col-md-12">
                        <font size="5"><?= $sts['status']; ?></font>
                    </div>
                </div>
                <?php $jml = $this->M_dashboard->getJmlProduk_byStatus($sts['status']) ?>
                <h4 style="margin-left: 10px"><?= $jml; ?></h4>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->session->userdata('role_id') == 1) { ?>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-user"></i></div>
                <div class="count">
                    <font size="5">Admin</font>
                </div>
                <h4 style="margin-left: 10px"><?= $jmlAdm; ?></h4>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count">
                    <font size="5">Operator</font>
                </div>
                <h4 style="margin-left: 10px"><?= $jmlOpr; ?></h4>
            </div>
        </div>
    <?php } ?>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Jenis Produk Hukum</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jenis as $jen) { ?>
                        <tr>
                            <td><?= $jen['nama_jenis']; ?></td>
                            <?php $berlaku = $this->M_dashboard->getBerlakuByJenis($jen['id_jenis']) ?>
                            <?php $tdkBerlaku = $this->M_dashboard->getTidakBerlakuByJenis($jen['id_jenis']) ?>
                            <td><?= $berlaku; ?></td>
                            <td><?= $tdkBerlaku; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Statistik Kategori Produk Hukum</h2>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">Berlaku</th>
                        <th data-graph-stack-group="1" data-graph-datalabels-color="blue">Tidak Berlaku</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($katProduk as $kat) { ?>
                        <tr>
                            <td><?= $kat['nama_kategori']; ?></td>
                            <?php $jmlBerlaku = $this->M_dashboard->getJmlProdukBerlaku($kat['id_kategori']) ?>
                            <?php $jmlTidakBerlaku = $this->M_dashboard->getJmlProdukTidakBerlaku($kat['id_kategori']) ?>
                            <td><?= $jmlBerlaku ?></td>
                            <td><?= $jmlTidakBerlaku ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>