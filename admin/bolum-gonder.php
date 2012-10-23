<?php 
include_once "core/core.php";

$name	=	tsql($_POST["name"]);
$fac_id	=	tsql($_POST["fac_id"]);

$errors = array();

if(!empty($name)){
	$errors["name"]		=	"Lütfen adınızı giriniz.";
}

if(!empty($fac_id)){
	$errors["fac_id"]	=	"Lütfen Fakülteyi seçiniz";
}

if(empty($errors)){
	$db->query("INSERT INTO departments (name, fac_id) VALUES ('".$name."','".$fac_id."')");
	header("Location: bolum-listesi.html");
}
else{
	header("Location: index.php?s=bolum-ekle&error=true");
}

ob_end_flush();
?>