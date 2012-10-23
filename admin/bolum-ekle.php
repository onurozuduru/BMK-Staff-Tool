<?php 

if($_POST){

  $name   = tsql($_POST["name"]);
  $fac_id = tsql($_POST["fac_id"]);

  $errors = array();

  if(empty($name)){
    $errors["name"]   = "Lütfen Bölüm adını giriniz.";
  }

  if(empty($fac_id)){
    $errors["fac_id"] = "Lütfen Fakülteyi seçiniz.";
  }

  if(empty($errors)){
    $db->query("INSERT INTO departments (name, fac_id) VALUES ('".$name."','".$fac_id."')");
    header("Location: bolum-listesi.html");
  }

}

?>
      <div class="row">
        <div class="span12">
          <form class="form-horizontal" action="" method="POST">
            <legend>Bölüm Ekle</legend>            
            <div style="margin-bottom: 15px;">
            <?php 
            if(!empty($errors)){
              echo implode("<br/>", $errors);
            }
            ?>              
            </div>  
            <div class="control-group">
              <label class="control-label" for="name">Fakülte Seçin</label>
              <div class="controls"> 
                <select name="fac_id">
                  <?php 
                  $faculties = $db->get_results("SELECT * FROM faculties ORDER by name ASC");
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
              <label class="control-label" for="name">Bölüm Adı</label>
              <div class="controls">
                <input type="text" value="<?php if (!empty($_GET['name'])) echo $_GET['name']; ?>" name="name" id="name" placeholder="Bilgisayar Mühendisliği">
              </div>
            </div>                 
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>                                              
          </form>          
        </div>
      </div>
      