<?php 
include_once "core/core.php";

$fac_id		=	tsql($_GET["fac_id"]);
if(empty($fac_id)){
	$fac_id	=	1;
}

$query 		= 	$db->get_results("SELECT * FROM departments WHERE fac_id = '".$fac_id."'");
foreach($query as $each):
	echo '<option value="'.$each->id.'">'.$each->name.'</option>';
endforeach;

?>