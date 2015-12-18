<!DOCTYPE html>
<html lang="en">
<head>
	<title>Control Freak</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet" />
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet" />
	<script type="text/javascript">
	WebFontConfig = {
		google: { families: [ 'Merriweather::latin' ] }
	};
	(function() {
		var wf = document.createElement('script');
		wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
			'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
		wf.type = 'text/javascript';
		wf.async = 'true';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(wf, s);
	})(); 
	</script>
	<script type="text/javascript" src="js/app.js"></script>
	<style type="text/css">
		/* DEFAULT */
		.page-header, .sub-header {
			font-family: 'Merriweather', serif;
		}
		
		.container img#logo { 
			display: inline-block;
			*display: inline;
			*zoom: 1;
		}
	</style>
</head>
<body>
<!-- Beautification Update 0.1 -->
<div class="page-header">
	<div class="container">
		<h1>Control Freak</h1>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<div class="jumbotron">
				<div class="container sub-header"><h2>Lighting Statistics</h2></div>
			</div>
			<a id="showstats" class="btn btn-primary">Show Energy Statistics <span id="energystat">&darr;</span></a>
			<div id="stats" class="table-responsive" style="display: hidden;">
				<!-- Use $("#data_stats").append("<table_data>"); //-->
				<table id="data_stats" class="table table-bordered">
					<tr id="th" class="info">
						<td>Time On</td>
						<td>Time Off</td>
						<td>Energy Used</td>
						<td>Total Cost</td>
					</tr>
					<!-- Use jQuery to append incoming data onto the table -->
				</table>
			</div>
		</div>
		<div class="col-sm-8">
			<div class="jumbotron">
				<div class="container sub-header"><h1>Lighting Control</h1></div>
			</div>
			<div class="col-sm-4">
				<div class="dropdown">
					<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Minutes Before Notification
						<span class="caret"></span></button>
					<ul class="dropdown-menu">
						<li><a class="upd8">5</a></li>
						<li><a class="upd8">10</a></li>
						<li><a class="upd8">15</a></li>
						<li><a class="upd8">20</a></li>
						<li><a class="upd8">25</a></li>
						<li><a class="upd8">30</a></li>
					</ul>
				</div>
				<br />
				<form role="form" method="POST">
					<div class="form-group">
						<input type="button" class="btn btn-default" id="onbtn" value="Turn On" disabled />
						<input type="button" class="btn btn-default" id="offbtn" value="Turn Off" />
					</div>
				</form>
				<hr />
				<div class="row notifyalert" style="padding:0; margin:0;">
					<h3>Current Time Setting</h3>
					<hr />
					Notifications appear every: <b><span id="time_setting">10</span></b> minutes. <!-- Default Value is 10 minutes //-->
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-primary" style="width:100%;">
					<div class="panel-heading">Current Light Status</div>
					<div class="panel-body"><a class="btn" id="light_stat_refresh"><i class="icon-repeat"></i> Reload</a><span id="stat_current"> <i class="icon-spin icon-spinner"></i> Gathering Data. . .</span>
						<br />
						<span id="gpio_out">
							<hr />
							The light is currently <strong><span id="gpio_state">on</span></strong>. <!-- Using on as the default value //-->
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
