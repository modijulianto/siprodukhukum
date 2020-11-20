<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#0779FB">ID</td>
            <td style="background-color:#0779FB">No</td>
            <?php if (isset($tahun) == true) { ?>
                <td style="background-color:#0779FB">Tahun</td>
            <?php } ?>
            <td style="background-color:#0779FB">Judul</td>
            <td style="background-color:#0779FB">Keterangan</td>
            <td style="background-color:#0779FB">Tentang</td>
            <td style="background-color:#0779FB">Unit</td>
            <td style="background-color:#0779FB">Status</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($prohum as $val) : ?>
            <tr>
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