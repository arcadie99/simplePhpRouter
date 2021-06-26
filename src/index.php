<?php

require_once("RequestController.php");

$request = new RequestController();

$value = $request->get_param("key"); 

$value = $request->get_params();


echo PHP_EOL."_______________".PHP_EOL;

print_r($value);

echo PHP_EOL."_______________".PHP_EOL;



// print_r($_SERVER);


