<?php 
include_once "core/core.php";

$s = $_GET["s"];
if($s != "login"){
  include_once "header.php";
}

switch ($s) {
  case 'login':
    include "$s.php";
    break;  
  case 'logout':
    include "$s.php";
    break;    
  case 'anasayfa':
    include "$s.php";
    break;
  case 'kisi-listesi':
    include "$s.php";
    break;  
  case 'kayit-duzenle':
    include "$s.php";
    break;  
  case 'kayit-ekle':
    include "$s.php";
    break;
  case 'fakulte-ekle':
    include "$s.php";
    break; 
  case 'bolum-ekle':
    include "$s.php";
    break; 
  case 'bolum-gonder':
    include "$s.php";
    break;     
  case 'bolum-listesi':
    include "$s.php";
    break;     
  case 'bolum-duzenle':
    include "$s.php";
    break;       
  case 'fakulte-gonder':
    include "$s.php";
    break; 
  case 'fakulte-duzenle':
    include "$s.php";
    break;   
  case 'fakulte-listesi':
    include "$s.php";
    break;               
  default:
    include "anasayfa.php";
    break;                          
}

include_once "footer.php";
?>