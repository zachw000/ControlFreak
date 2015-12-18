<?php
// Execute state shell script.
exec("sudo echo '17' > /sys/class/gpio/export 2>&1");
exec("sudo echo 'out' > /sys/class/gpio17/direction 2>&1");
echo exec("bash /var/www/html/shscript/gpiostate.sh 2>&1", $result);
//echo '' . system("/var/www/html/shscript/gpiostate.sh");
