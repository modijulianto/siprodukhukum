<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#44749D">#</td>
            <td style="background-color:#44749D">ID</td>
            <td style="background-color:#44749D">No</td>
            <?php if (isset($tahun) == true) { ?>
                <td style="background-color:#44749D">Tahun</td>
            <?php } ?>
            <td style="background-color:#44749D">Judul</td>
            <td style="background-color:#44749D">Keterangan</td>
            <td style="background-color:#44749D">Tentang</td>
            <td style="background-color:#44749D">Unit</td>
            <td style="background-color:#44749D">Status</td>
        </tr>
    </thead>

    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($prohum as $val) : ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><?= $val['id_produk'] ?></td>
                <td><?= $val['no'] ?></td>
                <?php if (isset($tahun) == true) { ?>
                    <td><?= $val['tahun'] ?></td>
                <?php } ?>
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