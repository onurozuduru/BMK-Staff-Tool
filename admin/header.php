<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Bahçeşehir Üniversitesi BMK - Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Enüstkat Interactive">

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
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="<?php echo $admin_url; ?>index.html">Anasayfa</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Kayıt <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $admin_url; ?>kisi-listesi.html">Kayıtları Listele</a></li>
                  <li><a href="<?php echo $admin_url; ?>kayit-ekle.html">Kayıt Oluştur</a></li>
                </ul>
              </li>  
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Fakülteler <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $admin_url; ?>fakulte-listesi.html">Fakülteleri Listele</a></li>
                  <li><a href="<?php echo $admin_url; ?>fakulte-ekle.html">Fakülte Ekle</a></li>
                </ul>
              </li>   
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bölümler <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo $admin_url; ?>bolum-listesi.html">Bölümleri Listele</a></li>
                  <li><a href="<?php echo $admin_url; ?>bolum-ekle.html">Bölüm Ekle</a></li>
                </ul>
              </li>                                             
            </ul>
            <div class="pull-right">
              <ul class="nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hesabınız <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo $admin_url; ?>logout.html">Çıkış</a></li>
                  </ul>
                </li>                
              <ul>
            </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">
