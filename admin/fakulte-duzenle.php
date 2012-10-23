<?php 
$id   = @($_GET["id"]);
if(empty($id)){
  //Post olmuş olabilir. Hidden'dan alalım.
  $id   = $_POST["id"];
}

if(empty($id)){
  header("Location: fakulte-ekle.html");
  exit();
}

$fakulte = $db->get_row("SELECT * FROM faculties WHERE id=".$id.""); 

if($_POST){

  $errors = array();

  $name         = tsql($_POST["name"]);

  //Update Sorgusu  
  $db->query("UPDATE kategoriler SET name = '".$name."' WHERE id='".$id."'");
  echo mysql_error();
  if($db->rows_affected == 1){
    header("Location: index.php?s=fakulte-duzenle&success=true&id=".$id."");
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
            <legend>Fakülte Düzenle</legend>            
            <div style="margin-bottom: 15px;"><?php if(isset($_GET["error"])){ echo "Lütfen tüm alanları, doğru giriniz"; } ?></div>        
            <div style="margin-bottom: 15px;"><?php if(isset($_GET["success"])){ echo "Kategori başarıyla düzenlenmiştir!"; } ?></div>                          
            
            <div class="control-group">
              <label class="control-label" for="title_de">Fakülte Adı</label>
              <div class="controls">
                <input type="text" value="<?php echo $fakulte->name; ?>" name="name" id="name" placeholder="Mühendislik Fakültesi">
              </div>
            </div>     

            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>  
            <input type="hidden" value="<?php echo $each->id; ?>" name="id"/>                                            
          </form>          
        </div>
      </div>