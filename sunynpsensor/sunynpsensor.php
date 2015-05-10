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
	
	Highcharts.setOptions({
global: {
    useUTC: false
}
});
  //  $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=new-intraday.json&callback=?', function (data) {

        // create the chart
        $('#container').highcharts('StockChart', {


            title: {
                text: 'TEMPERATURE'
            },

            subtitle: {
                text: 'Current temperature is ' + <?php $db = new Connect_MySql();
                          $sql = "select CAST(temperature as DECIMAL(5,2)) * 1.8 + 32 as temperature from sensor_table where temperature != \"\" order by timestamp desc limit 1 ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    '<?php echo $row['temperature'] ?>'
                          <?php }$db->close_db(); ?>
            },

            xAxis: {
                gapGridLineWidth: 0
            },

            rangeSelector : {
                buttons : [{
                    type : 'hour',
                    count : 1,
                    text : '1h'
                }, {
                    type : 'day',
                    count : 1,
                    text : '1D'
                }, {
                    type : 'all',
                    count : 1,
                    text : 'All'
                }],
                selected : 1,
                inputEnabled : false
            },

            series : [{
                name : 'Temperature',
                type: 'area',
                data : [
                    <?php $db = new Connect_MySql();
                          $sql = "select UNIX_TIMESTAMP(timestamp)*1000 as timestamp, CAST(temperature as DECIMAL(5,2)) * 9/5 + 32 as temperature from sensor_table where temperature != \"\" ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    ['<?php echo $row['timestamp'] ?>', <?php echo $row['temperature'] ?>],
                          <?php }$db->close_db(); ?>
                    ]  ,
                gapSize: 5,
                tooltip: {
                    valueDecimals: 2
                },
                fillColor : {
                    linearGradient : {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops : [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                threshold: null
            }]
        });
   // });
});


$(function () {
  //  $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=new-intraday.json&callback=?', function (data) {

        // create the chart
        $('#container2').highcharts('StockChart', {


            title: {
                text: 'HUMIDITY'
            },

            subtitle: {
                text: 'Current humidity is ' + <?php $db = new Connect_MySql();
                          $sql = "select SUBSTRING_INDEX(humidity,'\n', 1) as humidity from sensor_table where humidity != \"\" order by timestamp desc limit 1 ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    '<?php echo $row['humidity'] ?>' 
                          <?php }$db->close_db(); ?>
            },

            xAxis: {
                gapGridLineWidth: 0
            },

            rangeSelector : {
                buttons : [{
                    type : 'hour',
                    count : 1,
                    text : '1h'
                }, {
                    type : 'day',
                    count : 1,
                    text : '1D'
                }, {
                    type : 'all',
                    count : 1,
                    text : 'All'
                }],
                selected : 1,
                inputEnabled : false
            },

            series : [{
                name : 'Humidity',
                type: 'area',
                data : [
                    <?php $db = new Connect_MySql();
                          $sql = "select UNIX_TIMESTAMP(timestamp)*1000 as timestamp, SUBSTRING_INDEX(humidity,'\n', 1) as humidity from sensor_table where humidity != \"\" ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    ['<?php echo $row['timestamp'] ?>', <?php echo $row['humidity'] ?>],
                          <?php }$db->close_db(); ?>
                    ]  ,
                gapSize: 5,
                tooltip: {
                    valueDecimals: 2
                },
                fillColor : {
                    linearGradient : {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops : [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                threshold: null
            }]
        });
   // });
});


$(function () {
  //  $.getJSON('http://www.highcharts.com/samples/data/jsonp.php?filename=new-intraday.json&callback=?', function (data) {

        // create the chart
        $('#container3').highcharts('StockChart', {


            title: {
                text: 'BAROMETER'
            },

            subtitle: {
                text: 'Current barometric pressure is ' + <?php $db = new Connect_MySql();
                          $sql = "select SUBSTRING_INDEX(barometer,'\n', 1) as barometer from sensor_table where barometer != \"\" order by timestamp desc limit 1 ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    '<?php echo $row['barometer'] ?>' 
                          <?php }$db->close_db(); ?>
            },

            xAxis: {
                gapGridLineWidth: 0
            },

            rangeSelector : {
                buttons : [{
                    type : 'hour',
                    count : 1,
                    text : '1h'
                }, {
                    type : 'day',
                    count : 1,
                    text : '1D'
                }, {
                    type : 'all',
                    count : 1,
                    text : 'All'
                }],
                selected : 1,
                inputEnabled : false
            },

            series : [{
                name : 'Barometer',
                type: 'area',
                data : [
                    <?php $db = new Connect_MySql();
                          $sql = "select UNIX_TIMESTAMP(timestamp)*1000 as timestamp, SUBSTRING_INDEX(barometer,'\n', 1) as barometer from sensor_table where barometer != \"\" ";
                          $que = $db->execute($sql);
                          while ($row=$db->fetch_row($que)){?>
                    ['<?php echo $row['timestamp'] ?>', <?php echo $row['barometer'] ?>],
                          <?php }$db->close_db(); ?>
                    ]  ,
                gapSize: 5,
                tooltip: {
                    valueDecimals: 2
                },
                fillColor : {
                    linearGradient : {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops : [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                threshold: null
            }]
        });
   // });
});

setTimeout(function () {
    location.reload();
}, 10000);

		</script>
	</head>
	<body>
<div id="container" style="height: 400px; min-width: 310px"></div>
<div id="container2" style="height: 400px; min-width: 310px"></div>
<div id="container3" style="height: 400px; min-width: 310px"></div>

<script src="js/highstock.js"></script>
<script src="js/modules/exporting.js"></script>
	</body>
</html>
