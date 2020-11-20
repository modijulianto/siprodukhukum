<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">
    <thead>
        <tr>
            <td style="background-color:#44749D">ID</td>
            <td style="background-color:#44749D">Nama Admin</td>
            <td style="background-color:#44749D">Email</td>
            <td style="background-color:#44749D">Tanggal Terdaftar</td>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($admin as $val) : ?>
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
        <td>Jumlah admin</td>
        <td><?= $tot_admin ?></td>
    </tr>
</table>