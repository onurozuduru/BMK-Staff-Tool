<?php 
$id   = @($_GET["id"]);
if(empty($id)){
  //Post olmuş olabilir. Hidden'dan alalım.
  $id   = $_POST["id"];
}

$fakulte = $db->get_row("SELECT *, departments.name as dep_name FROM departments INNER JOIN faculties ON departments.fac_id = faculties.id WHERE departments.id=".$id.""); 

if(empty($id) or empty($fakulte)){
  header("Location: bolum-ekle.html");
}


if($_POST){

  $errors = array();

  $name           = tsql($_POST["name"]);
  $fac_id         = tsql($_POST["fac_id"]);

  //Update Sorgusu  
  $db->query("UPDATE departments SET name = '".$name."', fac_id = '".$fac_id."' WHERE id='".$id."'");
  echo mysql_error();
  if($db->rows_affected == 1){
    header("Location: index.php?s=bolum-duzenle&success=true&id=".$id."");
    exit();
  }
  else{
    print_r($errors);
  }  

}
?>
      <div class="row">
        <div class="span12">
          <form class="form-horizontal" action="" method="POST">
            <legend>Bölüm Düzenle</legend>            
            <div style="margin-bottom: 15px;"><?php if(isset($_GET["error"])){ echo "Lütfen tüm alanları, doğru giriniz"; } ?></div>        
            <div style="margin-bottom: 15px;"><?php if(isset($_GET["success"])){ echo "Bölüm başarıyla düzenlenmiştir!"; } ?></div>                          
            

            <div class="control-group">
              <label class="control-label" for="name">Fakülte Seçin</label>
              <div class="controls"> 
                <select name="fac_id">
                  <?php 
                  $faculties = $db->get_results("SELECT * FROM faculties ORDER by name ASC");
                  foreach($faculties as $each):
                  ?>                   
                  <option <?php if($each->id == $fakulte->id){ echo 'selected="selected"'; } ?> value="<?php echo $each->id; ?>"><?php echo $each->name; ?></option>
                  <?php 
                  endforeach;
                  ?>
                </select>
              </div>
            </div> 

            <div class="control-group">
              <label class="control-label" for="title_de">Bölüm Adı</label>
              <div class="controls">
                <input type="text" value="<?php echo $fakulte->dep_name; ?>" name="name" id="name" placeholder="Mühendislik Fakültesi">
              </div>
            </div>     

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>  
            <input type="hidden" value="<?php echo $each->id; ?>" name="id"/>                                            
          </form>          
        </div>
      </div>