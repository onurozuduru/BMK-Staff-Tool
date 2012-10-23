<?php 

//Core
ob_start();
session_start();
header("Content-Type: text/html; charset=UTF-8");
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//Site
$admin_url	=	"http://localhost:8888/bmk/admin/";
$site_url	=	"http://localhost:8888/bmk/";

//Database
include_once "ez_sql_core.php";
include_once "ez_sql_mysql.php";

if($_SERVER['HTTP_HOST'] == "localhost:8888"){
	$dbuser			=	"root";
	$dbpass			=	"root";
	$dbname			=	"baubmk";
	$dbhost			=	"localhost";
}
else{
	$dbuser			=	"";
	$dbpass			=	"";
	$dbname			=	"";
	$dbhost			=	"";
}

$db = new ezSQL_mysql($dbuser, $dbpass, $dbname, $dbhost);
$db->query("SET NAMES 'utf8'");
$db->query("SET CHARACTER SET utf8");
$db->query("SET COLLATION_CONNECTION = 'utf8_general_ci'");

//XSS Security
function tsql($text) {
	$text = trim ( $text );
	$text = strip_tags ( $text ,'<br>');
	$text = stripslashes ( $text );
	$text = htmlspecialchars ( $text, ENT_QUOTES );
	$text = mysql_real_escape_string ( $text );
	return $text;
}

//SEF LINK
function turkceyap($deger){
    $trchar  = array("_", "ş", "Ş", "ı", "(", ")", "'", "ü", "Ü", "ö", "Ö", "ç", "Ç", " ", "/", "*", "?", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
    $sefchar = array("-", "s", "S", "i", "", "", "", "u", "U", "o", "O", "c", "C", "-", "-", "-", "", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U");
    $dondur  = str_replace($trchar, $sefchar, $deger);
    $dondur  = preg_replace("@[^A-Za-z0-9_\-]+@i","", $dondur);
    return strtolower($dondur);
}

//TR - Unix to Human
function unixtohuman($date){
    if(!empty($date)){
        return date("d.m.Y H:i", $date);
    }
    else{
        return FaLSE;
    }
}

//Check URI
function checkurl(){
	$uri 	=	explode("/", $_SERVER["REQUEST_URI"]);
	return $uri[1]."-".$uri[2];
}

if(checkurl() == "bmk-admin"){
	if($_SESSION["login"]	==	false && $_GET["s"] != "login"){
		header("Location: login.html");
	}
}

?>