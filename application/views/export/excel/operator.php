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
            <td style="background-color:#0779FB">Nama Operator</td>
            <td style="background-color:#0779FB">Email</td>
            <td style="background-color:#0779FB">Tanggal Terdaftar</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($opr as $val) : ?>
            <tr>
                <td><?= $val['id'] ?></td>
                <td><?= $val['name'] ?></td>
                <td><?= $val['email'] ?></td>
                <td><?= date('d F Y', $val['date_created']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<br>

Keterangan :
<table>
    <tr>
        <td>Jumlah operator</td>
        <td><?= $tot_opr ?></td>
    </tr>
</table>