<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->AddPage('L');
// $pdf->SetFont('times', 'B', 14, 'false');
// $pdf->Write(0, 'DATA MAKANAN', '', 0, 'C', true, 0, false, false, 0);
// $pdf->SetFont('times', 'B', 12, 'false');
// $pdf->Write(0, 'Akamana Coffee', '', 0, 'C', true, 0, false, false, 0);
// $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
$tabel = '
<table>
    <tr>
        <td width="157px" rowspan="4"></td>
        <td width="70px" rowspan="3"><img src="' . base_url('assets/images/Undiksha.png') . '" width="70"></td>
        <td width="400px" align="center"><h3>UNIVERSITAS PENDIDIKAN GANESHA</h3></td>
    </tr>
    <tr>
    <td width="400px" align="center">Jalan Udayana No.11 Singaraja - Bali 81116</td>
    </tr>
    <tr>
        <td width="400px" align="center">Telephone (0362) 22570, Fax (0362) 25735, Email : humas@undiksha.ac.id</td>
    </tr>
</table>
<p  style="padding-top:20px">
<hr height="2px">
<h3 align="center"><b>DATA PRODUK HUKUM</b></h3>
<br><br>


<table border="1" cellpadding="2">
<thead>
    <tr>
        <td align="center" width="30px" style="background-color:#44749D;"><b>#</b></td>
        <td align="center" width="50px" style="background-color:#44749D;"><b>ID Produk</b></td>
        <td align="center" width="50px" style="background-color:#44749D;"><b>No</b></td>
        <td align="center" width="50px" style="background-color:#44749D;"><b>Tahun</b></td>
        <td align="center" width="150px" style="background-color:#44749D;"><b>Judul</b></td>
        <td align="center" width="100px" style="background-color:#44749D;"><b>Keterangan</b></td>
        <td align="center" width="155px" style="background-color:#44749D;"><b>Tentang</b></td>
        <td align="center" width="150px" style="background-color:#44749D;"><b>Unit</b></td>
        <td align="center" width="50px" style="background-color:#44749D;"><b>Status</b></td>
    </tr>
</thead>';

$pdf->SetFont('times', '', 12, 'false');
$unit = "";
$i = 1;
foreach ($prohum as $val) {
    $tabel .= '
        <tbody>
            <tr>
                <td width="30px" align="center">' . $i++ . '</td>
                <td width="50px" align="center">' . $val['id_produk'] . '</td>
                <td width="50px" align="center">' . $val['no'] . '</td>
                <td width="50px" align="center">' . $val['tahun'] . '</td>
                <td width="150px" align="justify">' . $val['judul'] . '</td>
                <td width="100px" align="justify">' . $val['keterangan'] . '</td>
                <td width="155px" align="justify">' . $val['nama_tentang'] . '</td>
                <td width="150px">' . $val['nama_unit'] . '</td>
                <td width="50px" align="center">' . $val['status'] . '</td>
            </tr>
        </tbody>
    ';
}

$tabel .= '
</table>';

$pdf->writeHTML($tabel);
$pdf->Output($title . '.pdf', 'D');
