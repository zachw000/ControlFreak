<?php
include_once '../api/essentials.php';
include_once '../dismiss.php';
function settime($time, $returnhandle=false) {
	$handle = exec("rm /var/www/html/js/timeset.txt");
	system("echo {$time} >> /var/www/html/js/timeset.txt");
}

function gettime() {
	/*
		If the file exists open and read from it, otherwise try to create the file, if that fails then display
		an error.
	*/
	$handle = fopen('timeset.txt', 'r') or settime(10, true) or die("Unable to create or read file");
	echo fread($handle, filesize('timeset.txt'));
	fclose($handle);
}

function lighton() {
	// Set Commands
	$command_T = "sudo /var/www/html/shscript/timer";
	$command_L = "sudo /var/www/html/shscript/lighton";
	runInBackground($command_L);
	runInBackground($command_T);	
}

function lightoff() {
	$kill_command = exec("sudo kill $(pgrep timer); sudo killall -v timer; sudo pkill timer; sudo kill `ps -f | grep timer | grep -v grep | awk '{print $2}'`");
	runInBackground("sudo /var/www/html/shscript/lightoff");
	dismiss();
}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
		case '5' : echo settime(5);break;
        case '10' : echo settime(10);break;
		case '15' : echo settime(15);break;
        case '20' : echo settime(20);break;
		case '25' : echo settime(25);break;
		case '30' : echo settime(30);break;
		case '40' : echo settime(40);break;
		case '50' : echo settime(50);break;
		case '60' : echo settime(60);break;
		case 'gettime' : echo gettime(); break;
		case 'lighton' : echo lighton(); break;
		case 'lightoff' : echo lightoff(); break;
		default: gettime();break;
    }
	
	// Set a new command to kill all (if any) running processes of timer
	$result = exec("sudo bash /var/www/html/shscript/gpiostate.sh 2>&1", $result);
	if ($result == '1' && $action != 'gettime') {
		$kill_command = exec("sudo kill $(pgrep timer); sudo killall -v timer; sudo pkill timer; sudo kill `ps -f | grep timer | grep -v grep | awk '{print $2}'`");
		$command = "sudo /var/www/html/shscript/timer";
		dismiss();
		runInBackground($command);
	}
}
