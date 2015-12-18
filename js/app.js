var displayObject = function (jsonobj) {
	var appendData = "<tr><td>" + jsonobj.timeon + "</td><td>" + jsonobj.timeoff + "</td><td>" + 43.636363636363636363636 * jsonobj.timediff / 3600 + "W</td><td>" + (43.6363636363636363636363 * jsonobj.timediff / 3600) * 0.305 / 1000 + "&cent;</tr>";
	$("#data_stats").append(appendData);
};

var toggle = false;
var obj;
var obj_length;
$(document).ready(function () {
	// reset the default variable
	$.ajax({ url: 'js/settime.php',
		data: {action: 'gettime'},
		type: 'post',
		success: function(output) {
			// test output with an alert box.
			document.getElementById("time_setting").innerHTML = output;
		}
	});

	$.ajax({ url: 'gettimes.php', data: {action: 'update'}, type: 'post'});
	
	$.ajax({ url: 'js/getstate.php',
		data: {action: 'getstate'},
		type: 'post',
		success: function(output) {
			// Removing loading symbol
			$("#stat_current").html("");	
			// Update data, revert to default if processing failure
			if (output == "0") {
				$("#gpio_state").html("off");
				$("#onbtn").removeAttr("disabled");
				document.getElementById('offbtn').disabled = 'true';
			}

			if (output == "1") { 
				$("#gpio_state").html("on");
				$("#offbtn").removeAttr("disabled");
				document.getElementById("onbtn").disabled = 'true';
			}
		}
	});

	var xmlhttp = new XMLHttpRequest();
	var url = 'datatxt.txt';
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			obj = JSON.parse(xmlhttp.responseText);
			//alert(obj);
			obj_length = obj.times.length;
			for (i = 0; i < obj_length; i++) {
				displayObject(obj.times[i]);
			}
		}
	}
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
	
	$(".upd8").on('click', function () {
		document.getElementById("time_setting").innerHTML = $(this).html();
		// $.post("../gpiostats/resettime", function($(this).html()) {});
		$.ajax({ url: 'js/settime.php',
         		data: {action: $(this).html()},
         		type: 'post',
         		success: function(output) {
                  		// Run a second AJAX request to a PHP script to
						// end the current script job
						$('.notifyalert').append("<div class='alert alert-success'><a class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success!</strong> Time successfully updated!</div>");
						// Do another AJAX call to restart a Shell script
                	}
		});
	});

	// When show data is clicked show the data
	$("#showstats").on('click', function () {
		if (toggle) {
			$("#stats").slideToggle();
			toggle = !toggle;
			$("#showstats").html("Show Energy Statistics <span id='energystat'>&uarr;</span>");
		} else if (!toggle) {
			$("#stats").slideToggle();
			toggle = !toggle;
			$("#showstats").html("Show Energy Statistics <span id='energystat'>&darr;</span>");
		}
	});

	// When the refresh button is clicked gather new data.
	$("#light_stat_refresh").on('click', function() {
		$("#stat_current").html(" <i class='icon-spin icon-spinner'></i> Gathering Data. . .");

		// Next do an AJAX request to refresh the data
		$.ajax({ url: 'js/getstate.php',
				data: {action: 'getstate'},
				type: 'post',
				success: function(output) {
						// Turn off loading symbol
						$("#stat_current").html("");
						
						// Update fields
						if (output == '0') {
							$("#gpio_state").html("off");
							$("#onbtn").removeAttr("disabled");
							document.getElementById("offbtn").disabled = 'true';
						} else if (output == '1') {
							$("#gpio_state").html("on");
							$("#offbtn").removeAttr("disabled");
							document.getElementById("onbtn").disabled = 'true';
						}
					}
		});
	});

	// When the 'turn on' light button is clicked
	$("#onbtn").on('click', function () {
		$.ajax({ url: 'js/settime.php',
			data: {action: 'lighton'},
			type: 'post',
			success: function (output) {
					document.getElementById("onbtn").disabled = 'true';
					$("#offbtn").removeAttr("disabled");
					$("#gpio_state").html("on");
				}
		});
	});

	$("#offbtn").on('click', function () {
		$.ajax({ url: 'js/settime.php',
			data: {action: 'lightoff'},
			type: 'post',
			success: function (output) {
					document.getElementById("offbtn").disabled = 'true';
					$("#onbtn").removeAttr("disabled");
					$("#gpio_state").html("off");
				}
		});
	});
});
