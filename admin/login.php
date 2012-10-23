<?php 
include_once "core/core.php";

if($_POST){
  $email      = tsql($_POST["email"]);
  $password   = md5(tsql($_POST["password"]));

  $login      = $db->get_var("SELECT COUNT(*) FROM users WHERE email='".$email."' and password='".$password."'");

  if($login > 0){
    $_SESSION['login']  = true;
    header("Location: anasayfa.html");  
  }
  else{
    header("Location: index.php?s=login&error=true");  
  }
}

if($_SESSION["login"] == true){
  header("Location: anasayfa.html");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bahçeşehir Üniversitesi BMK - Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Le styles -->
    <link href="<?php echo $admin_url; ?>assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="<?php echo $admin_url; ?>assets/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le javascript
    ================================================== -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>    
    <script src="<?php echo $admin_url; ?>assets/js/bootstrap.js"></script>    

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $admin_url; ?>assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $admin_url; ?>assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $admin_url; ?>assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $admin_url; ?>assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $admin_url; ?>assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="<?php echo $admin_url; ?>index.html">Bahçeşehir Üniversitesi BMK</a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="row">
        <div class="span12">
          <form class="form-horizontal" method="POST" action="">

            <legend>Giriş Yap!</legend>            
            <div class="control-group">
              <?php 
              if($_GET["error"] == true){
              ?>
              <div style="margin-bottom: 20px;">E-Mail adresiniz veya Parolanız hatalı!</div>
              <?php } ?>
              <label class="control-label" for="inputEmail">E-Mail</label>
              <div class="controls">
                <input type="text" name="email" id="inputEmail" placeholder="E-Mail">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="inputPassword">Parola</label>
              <div class="controls">
                <input type="password" name="password" id="inputPassword" placeholder="Password">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button type="submit" class="btn">Giriş</button>
              </div>
            </div>
          </form>          
        </div>
      </div>