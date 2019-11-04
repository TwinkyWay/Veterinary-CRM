<?php
//include_once 'file_path.php';

if (isset($_REQUEST['idOwner'])&&isset($_REQUEST['idAnimal'])) {
	$ow = new Owner($_REQUEST['idOwner']);
	$owner = $ow->info();
	$owner['animals'] = $ow->animal_not_recept($_REQUEST['idAnimal']);
	$animalInfo = Animal::info($_REQUEST['idAnimal']);
}
