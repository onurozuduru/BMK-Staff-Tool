<?php 

if($_POST){

  $fac_id       = tsql($_POST["fac_id"]);
  $dep_id       = tsql($_POST["dep_id"]);
  $classyear    = tsql($_POST["classyear"]);
  $name         = tsql($_POST["name"]);
  $cellnumber   = tsql($_POST["cellnumber"]);
  $email        = tsql($_POST["email"]);
  $pay          = tsql($_POST["pay"]);
  $password     = md5("123456");

  $errors = array();

  if(empty($fac_id)){
    $errors["fac_id"]     = "Lütfen Fakülteyi seçiniz.";
  }
  if(empty($dep_id)){
    $errors["dep_id"]     = "Lütfen Bölüm seçiniz.";
  }
  if(empty($classyear)){  
    $errors["classyear"]  = "Lütfen Sınıf seçiniz.";
  }
  if(empty($name)){
    $errors["name"]       = "Lütfen Adı, Soyadı giriniz.";
  }
  if(empty($cellnumber)){
    $errors["cellnumber"] = "Lütfen Telefon numarası giriniz.";
  }
  if(empty($email)){
    $errors["email"]      = "Lütfen E-Mail adresi giriniz.";
  }        

  if(empty($errors)){
    $db->query("INSERT INTO users (email, password, name, fac_id, dep_id, cellnumber, pay, is_admin, classyear) VALUES 
    ('".$email."','".$password."', '".$name."', '".$fac_id."', '".$dep_id."', '".$cellnumber."', '".$pay."', '0', '".$classyear."')");
    header("Location: kisi-listesi.html");
  }

}

?>
      <div class="row">
        <div class="span12">
          <form class="form-horizontal" action="" method="POST">
            <legend>Kayıt Ekle</legend>            
            <div style="margin-bottom: 15px;">
            <?php 
            if(!empty($errors)){
              echo implode("<br/>", $errors);
            }
            ?>              
            </div>  
            <div class="control-group">
              <label class="control-label" for="fac_id">Fakülte Seçin</label>
              <div class="controls"> 
                <select name="fac_id" id="fac_id">
                  <option value="">Seçiniz</option>
                  <?php 
                  $faculties = $db->get_results("SELECT name,id FROM faculties ORDER by name ASC");
                  foreach($faculties as $each):
                  ?>                   
                  <option value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>
                  <?php 
                  endforeach;
                  ?>
                </select>
              </div>
            </div>                     
            <div class="control-group">
              <label class="control-label" for="dep_id">Bölüm Seçin</label>
              <div class="controls"> 
                <select name="dep_id" id="dep_id">                
                  <div id="deparments"></div>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="classyear">Sınıf Seçin</label>
              <div class="controls"> 
                <select name="classyear" id="classyear">  
                  <option></option>              
                  <option value="P">Hazırlık</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                </select>
              </div>
            </div>  
            <div class="control-group">
              <label class="control-label" for="name">Adı Soyadı</label>
              <div class="controls">
                <input type="text" value="<?php if (!empty($_GET['name'])) echo $_GET['name']; ?>" name="name" id="name">
              </div>
            </div> 
            <div class="control-group">
              <label class="control-label" for="cellnumber">Telefon Numarası</label>
              <div class="controls">
                <input type="text" value="<?php if (!empty($_GET['cellnumber'])) echo $_GET['cellnumber']; ?>" name="cellnumber" id="cellnumber">
              </div>
            </div>               
            <div class="control-group">
              <label class="control-label" for="email">E-Mail Adresi</label>
              <div class="controls">
                <input type="text" value="<?php if (!empty($_GET['email'])) echo $_GET['email']; ?>" name="email" id="email">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="checkbox">Ödeme Durumu</label>              
              <div class="controls">
                <label class="checkbox">
                  <input value="1" name="pay" type="checkbox"> Alındı
                </label>
              </div>
            </div>                                                                                       
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>                                              
          </form>          
        </div>
      </div>
<script>
$(function(){
$('#fac_id').change(function() {
    $.ajax({
      type: "GET",
      data: "fac_id=" + $("#fac_id").val(),
      url:  "get_departments.php",
      success: function(msg){
        $("#dep_id").html(msg)
      }
  });  
});
});
</script>      
      