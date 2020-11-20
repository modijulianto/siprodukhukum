<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#0779FB">#</td>
            <td style="background-color:#0779FB">ID Produk</td>
            <td style="background-color:#0779FB">No</td>
            <td style="background-color:#0779FB">Tahun</td>
            <td style="background-color:#0779FB">Judul</td>
            <td style="background-color:#0779FB">Keterangan</td>
            <td style="background-color:#0779FB">Tentang</td>
            <td style="background-color:#0779FB">Unit</td>
            <td style="background-color:#0779FB">Status</td>
        </tr>
    </thead>

    <tbody>
        <?php
        $unit = "";
        $i = 1;
        ?>
        <?php foreach ($prohum as $val) : ?>
            <?php
            if ($unit != $val['nama_unit']) {
                $unit = $val['nama_unit'];
                $i = 1 ?>
                <tr>
                    <td colspan="9" style="background: rgb(175, 175, 175);"><?= $unit; ?></td>
                </tr>
            <?php } ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $val['id_produk'] ?></td>
                <td><?= $val['no'] ?></td>
                <td><?= $val['tahun'] ?></td>
                <td><?= $val['judul'] ?></td>
                <td><?= $val['keterangan'] ?></td>
                <td><?= $val['nama_tentang'] ?></td>
                <td><?= $val['nama_unit'] ?></td>
                <td><?= $val['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>