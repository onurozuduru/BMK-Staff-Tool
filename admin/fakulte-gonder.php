<?php 
include_once "core/core.php";

$name	=	tsql($_POST["name"]);


if(!empty($name)){

	$db->query("INSERT INTO faculties (name) VALUES ('".$name."')");
	header("Location: fakulte-listesi.html");

}
else{
	header("Location: index.php?s=fakulte-ekle&error=true&name=".$name	."");
}

ob_end_flush();
?>