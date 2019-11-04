<?php
function errorMesSQL($text,$e)
{
	//if ($e==0) global $e;
	$error = $text.'<br/>'.$e -> GetMessage();
	include 'error.html.php';
	exit();
}
function errorMessage($text)
{
	$error = $text;
	include 'error.html.php';
	exit();
}