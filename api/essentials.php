<?php
// Runs a process in the background, so therefore no delay.
function runInBackground($command) {
	exec("{$command} > /dev/null &", $arrOut);
}
