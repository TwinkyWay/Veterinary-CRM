<?php

if (isset($_GET['recept'])) {
	$recept = new Reception($_GET['recept']);
	$o = new Owner($recept->owner_id());
	$owner = $o->info();
	$info = $recept->all_info();
	$_REQUEST['idOwner'] = $owner['id'];
	$_REQUEST['idAnimal'] = $info['animal_id'];
	$order_info=$recept->get_order();
}