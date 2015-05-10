<!DOCTYPE HTML>
<?php include_once 'config.inc.php'; ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highstock Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    var seriesOptions = [],
        seriesCounter = 0,
        names = ['device1'] , 
                    
        // create the chart when all data is loaded
        createChart = function () {

            $('#container').highcharts('StockChart', {

                rangeSelector: {
                    selected: 4
                },

                yAxis: {
                    labels: {
                        formatter: function () {
                            return (this.value > 0 ? ' + ' : '') + this.value + '%';
                        }
                    },
                    plotLines: [{
                        value: 0,
                        width: 2,
                        color: 'silver'
                    }]
                },

                plotOptions: {
                    series: {
                        compare: 'percent'
                    }
                },

                tooltip: {
                    pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.change}%)<br/>',
                    valueDecimals: 2
                },

                series: seriesOptions
            });
        };

    $.each(names, function (i, name) {

        $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=' + name.toLowerCase() + '-c.json&callback=?', function (data) {

            seriesOptions[i] = {
                name: 'Temperature',
                data: [
                    <?php $db = new Connect_MySql();
                          $sql = "select UNIX_TIMESTAMP(timestamp) as timestamp, temperature from sensor_table";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    ['<?php echo $row['timestamp'] ?>', <?php echo $row['temperature'] ?>],
                          <?php }$db->close_db(); ?>
                    ]  
                    
                
            };

            // As we're loading the data asynchronously, we don't know what order it will arrive. So
            // we keep a counter and create the chart when all the data is loaded.
            seriesCounter += 1;

            if (seriesCounter === names.length) {
                createChart();
            }
        });
    });
});
		</script>
	</head>
	<body>
<script src="js/highstock.js"></script>
<script src="js/modules/exporting.js"></script>


<div id="container" style="height: 400px; min-width: 310px"></div>
	</body>
</html>
