<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharttable.org/master/jquery.highchartTable-min.js"></script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
            ['Work', 11],
            ['Eat', 2],
            ['Commute', 2],
            ['Watch TV', 2],
            ['Sleep', 7]
        ]);

        var options = {
            title: 'My Daily Activities',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<script>
    $(document).ready(function() {
        $('table.highchart').highchartTable();
    });
</script>

<div class="row" style="display: inline-block;">
    <div class="top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                <div class="count">179</div>
                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count">179</div>
                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                <div class="count">179</div>
                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 ">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-check-square-o"></i></div>
                <div class="count">179</div>
                <h3>New Sign ups</h3>
                <p>Lorem ipsum psdea itgum rixt.</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Top Profiles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <table class="highchart" data-graph-container-before="1" data-graph-type="column" style="display:none" data-graph-datalabels-enabled="1" data-graph-datalabels-color="white">
                <thead>
                    <tr>
                        <th></th>
                        <th data-graph-stack-group="1">John</th>
                        <th data-graph-stack-group="1" data-graph-datalabels-color="blue">Jane</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rowsTahun as $tahun) { ?>
                        <tr>
                            <td><?= $tahun['tahun']; ?></td>
                            <td>5</td>
                            <td>2</td>
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
                <h2>Top Profiles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div id="piechart" style="width: 900px; height: 500px; "></div>
        </div>
    </div>
</div>