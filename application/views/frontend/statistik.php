<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/highcharts/highcharts.js") ?>"></script>
<script language="JavaScript" type="text/javascript" src="<?= base_url("assets/build/js/highcharts/jquery.highchartTable-min.js") ?>"></script>
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>

<table class="highchart" data-graph-container="highchart-container" data-graph-type="column">
    <caption>Column example</caption>
    <thead>
        <tr>
            <th>Month</th>
            <th>Sales</th>
            <th>Benefits</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>January</td>
            <td>8000</td>
            <td>2000</td>
        </tr>
    </tbody>
</table>