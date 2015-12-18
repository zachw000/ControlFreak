<?php
// Include dissmission file
include_once 'api/essentials.php';
include_once 'dismiss.php';

$kill_command = exec("sudo kill $(pgrep timer); sudo killall -v timer; sudo pkill timer; sudo kill `ps -f | grep timer | grep -v grep | awk '{print $2}'`");
runInBackground("sudo /var/www/html/shscript/lightoff");

dismiss();
