<?php 
$action	=	@$_GET["action"];
if($action == "sil"){
	$id 	=	$_GET["id"];
	$db->query("DELETE FROM users WHERE id=".$id."");
}
?>
      <div class="row">
        <div class="span12">
        	<div class="legendcopy">Kişi Listesi</div>

				<table class="table table-hover">
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Adı Soyadı</th>
	                  <th>Akademik D.</th>
	                  <th>E-Mail</th>
	                  <th>Telefon No.</th>
	                  <th>Ödeme</th>
	                  <th>İşlem</th>
	                </tr>
	              </thead>
	              <tbody>
	              <?php 
				  
				  $sayfa 	= @$_GET["sayfa"];
				  if(empty($sayfa) or !is_numeric($sayfa)) {
				  	$sayfa = 1;
				  }

	              $markaCount	=	$db->get_var("SELECT COUNT(*) FROM users");
	              $limit 		=	5;
	              $toplamSayfa	=	ceil($markaCount / $limit);

	              $offset		=	($sayfa - 1) * $limit;	

	              $users	=	$db->get_results("SELECT users.is_admin, users.id, users.name, users.classyear, users.email, users.cellnumber, users.pay, 
	              	faculties.name as fac_name, departments.name as dep_name 
	              	FROM users
	              	LEFT JOIN faculties ON users.fac_id = faculties.id
	              	LEFT JOIN departments ON users.dep_id = departments.id 
	             	ORDER by users.name ASC LIMIT $offset, $limit");

	              foreach($users as $each):
	              		if($each->is_admin != 1){
	              ?>
	                <tr>
	                  <td width="30px"><?php echo $each->id; ?></td>
	                  <td><strong><?php echo $each->name; ?></strong></td>
	                  <td><strong><?php echo $each->dep_name."(".$each->fac_name.") - ".$each->classyear; ?></strong></td>
	                  <td><strong><?php echo $each->email; ?></strong></td>
	                  <td><strong><?php echo $each->cellnumber; ?></strong></td>
	                  <td><strong><?php echo ($each->pay == 1) ? "Yapıldı": "Yapılmadı"; ?></strong></td>
	                  <td width="50px"><a href="<?php echo $base_url; ?>index.php?s=kisi-duzenle&id=<?php echo $each->id; ?>">Düzenle</a><br/><a href="<?php echo $base_url; ?>index.php?s=kisi-listesi&action=sil&id=<?php echo $each->id; ?>" onclick="javascript:return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>
	                </tr>
	                <?php 
	                	}
	                endforeach;
	                ?>
	              </tbody>
	            </table>        
	            <div>
            	<?php 
            	for($i = 1; $i <= $toplamSayfa; $i++){
            		if($sayfa == $i){
            			echo '<a class="linkactive" href="'.$base_url.'index.php?s=kisi-listesi&sayfa='.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
            		}
            		else{
            			echo '<a href="'.$base_url.'index.php?s=kisi-listesi&sayfa='.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
            		}
            	}
            	?>
	            </div>
        </div>
      </div>    