<?php

$doc = new Doctor;

if (isset($_POST['action'])&&$_POST['action']=='doctor_edit'){
	if ($doc->add($_POST)) {
		$data = 'Данные изменены';
	}
}


$doctors = $doc -> all_info();