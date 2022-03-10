<?php

$fileName = "my.html";

if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
	throw new Exception('Request method must be POST!');
}

$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);

$server = $_SERVER;

$myfile = fopen($fileName, "a");
if ($myfile) {
	$data = print_r($decoded, true);
	fwrite($myfile, sprintf("\n ----------- %s -------------", date("Y-m-d H:i:s")));
	
	fwrite($myfile, "\n");
	$data = print_r($server, true);
	
	fwrite($myfile, "\n". $content);
	
	fwrite($myfile, "\n". $decoded);
	
	fclose($myfile);
}

echo "done";
