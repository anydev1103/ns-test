<?php

$fileName = "my.log";

$myfile = fopen($fileName, "a");
if ($myfile) {
	$data = print_r($_REQUEST, true);
	fwrite($myfile, sprintf("\n ----------- %s -------------", date("Y-m-d H:i:s")));
	fwrite($myfile, "\n". $data);
	fclose($myfile);
}

echo "done";
