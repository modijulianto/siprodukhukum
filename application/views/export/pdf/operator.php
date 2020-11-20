<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintFooter(false);
$pdf->setPrintHeader(false);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);
$pdf->AddPage('');
// $pdf->SetFont('times', 'B', 14, 'false');
// $pdf->Write(0, 'DATA MAKANAN', '', 0, 'C', true, 0, false, false, 0);
// $pdf->SetFont('times', 'B', 12, 'false');
// $pdf->Write(0, 'Akamana Coffee', '', 0, 'C', true, 0, false, false, 0);
// $pdf->Write(0, '', '', 0, 'C', true, 0, false, false, 0);
$tabel = '
<table>
    <tr>
        <td width="80px" rowspan="4"></td>
        <td width="70px" rowspan="3"><img src="' . base_url('assets/images/Undiksha.png') . '" width="70"></td>
        <td width="280px" align="center"><h3>UNIVERSITAS PENDIDIKAN GANESHA</h3></td>
    </tr>
    <tr>
        <td width="290px" align="center">Jalan Udayana No.11 Singaraja - Bali 81116</td>
    </tr>
    <tr>
        <td width="290px" align="center">Telephone (0362) 22570, Fax (0362) 25735, Email : humas@undiksha.ac.id</td>
    </tr>
</table>
<p  style="padding-top:20px">
<hr height="2px">
<h3 align="center"><b>DATA OPERATOR</b></h3>
<br><br>


<table border="1" cellpadding="2">
<thead>
    <tr>
        <td align="center" width="30px" style="background-color:#44749D;"><b>#</b></td>
        <td align="center" width="50px" style="background-color:#44749D;"><b>ID</b></td>
        <td align="center" width="175px" style="background-color:#44749D;"><b>Nama Admin</b></td>
        <td align="center" width="160px" style="background-color:#44749D;"><b>Email</b></td>
        <td align="center" width="125px" style="background-color:#44749D;"><b>Tanggal Terdaftar</b></td>
    </tr>
</thead>';

$pdf->SetFont('times', '', 12, 'false');
$i = 1;
foreach ($opr as $val) {
    $tabel .= '
        <tbody>
            <tr>
                <td width="30px" align="center" >' . $i++ . '</td>
                <td width="50px" align="center" >' . $val['id'] . '</td>
                <td width="175px">' . $val['name'] . '</td>
                <td width="160px" align="justify">' . $val['email'] . '</td>
                <td width="125px" align="center">' . date('d F Y', $val['date_created']) . '</td>
            </tr>
        </tbody>
    ';
}

$tabel .= '
</table>
<br><br><br>
Keterangan :
<br>
<table>
        <tr> 
            <td width="100px">Jumlah operator</td>
            <td>: ' . $tot_opr . ' </td>
        </tr>
    </tbody>
</table>
';

$pdf->writeHTML($tabel);
$pdf->Output('Laporan Data Operator.pdf', 'D');
