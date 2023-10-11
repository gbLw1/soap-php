<?php

if ($_GET) {
	$controle = $_GET["controle"];
	$metodo = $_GET["metodo"];
	require_once "Controller/". $controle . ".class.php";

	$obj = new $controle();
	$obj->$metodo();
} else {
	require_once "Controller/inicioController.class.php";
	
	$obj = new inicioController();
	$obj->inicio();
}