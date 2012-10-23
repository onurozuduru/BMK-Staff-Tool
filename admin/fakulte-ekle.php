      <div class="row">
        <div class="span12">
          <form class="form-horizontal" action="fakulte-gonder.php" method="POST">
            <legend>Fakülte Ekle</legend>            
            <div style="margin-bottom: 15px;"><?php if(isset($_GET["error"])){ echo "Lütfen tüm alanları, doğru giriniz"; } ?></div>           
            <div class="control-group">
              <label class="control-label" for="name">Fakülte Adı</label>
              <div class="controls">
                <input type="text" value="<?php if (!empty($_GET['name'])) echo $_GET['name']; ?>" name="name" id="name" placeholder="Mühendislik Fakültesi">
              </div>
            </div>                 
            <div class="form-actions">
              <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>                                              
          </form>          
        </div>
      </div>
      