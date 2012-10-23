<?php 
include_once "core/core.php";

$marka_id	=	tsql($_POST["marka_id"]);
$title_tr	=	tsql($_POST["title_tr"]);
$title_en	=	tsql($_POST["title_en"]);
$title_de	=	tsql($_POST["title_de"]);

if($marka_id > 0 && !empty($title_tr) && !empty($title_en) && !empty($title_de)){

	$db->query("INSERT INTO kategoriler (marka_id, title_tr, title_en, title_de) VALUES ('".$marka_id."','".$title_tr."','".$title_en."','".$title_de."')");
	header("Location: kategori-listesi.html");

}
else{
	header("Location: index.php?s=kategori-ekle&error=true&title_tr=".$title_tr."&title_en=".$title_en."&title_de=".$title_de."");
}

ob_end_flush();
?>