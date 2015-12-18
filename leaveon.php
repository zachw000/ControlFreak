<?php
include_once 'api/essentials.php';
include_once 'dismiss.php';

// Kills the timer so it will never execute lightoff program
$kill_command = exec("sudo kill $(pgrep timer); sudo killall -v timer; sudo pkill timer; sudo kill `ps -f | grep timer | grep -v grep | awk '{print $2}'`");

dismiss();
