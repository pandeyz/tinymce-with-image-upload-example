<?php
$url = $_SERVER['REQUEST_URI']; //returns the current URL
$parts = explode('/',$url);
$actual_link = $_SERVER['SERVER_NAME'];
for ($i = 0; $i < count($parts) - 1; $i++) {
 $actual_link .= $parts[$i] . "/";
}

$target_dir = "uploads/";
$target_file = $target_dir . rand(111,999) . basename($_FILES["file"]["name"]);

if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)){
	$rs = 'http://'. $actual_link . $target_file;
	
	$arr = array(
    	'url' => $rs
	); 
}else{
	$arr = array(
    	'url' => null
	);
}
echo json_encode($arr);
?>