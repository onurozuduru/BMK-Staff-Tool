<?php 
$action	=	@$_GET["action"];
if($action == "sil"){
	$id 	=	$_GET["id"];
	$db->query("DELETE FROM faculties WHERE id=".$id."");
}
?>
      <div class="row">
        <div class="span12">
        	<div class="legendcopy">Fakülte Listesi</div>

				<table class="table table-hover">
	              <thead>
	                <tr>
	                  <th>#</th>
	                  <th>Fakülte</th>
	                  <th>İşlem</th>
	                </tr>
	              </thead>
	              <tbody>
	              <?php 
				  
				  $sayfa 	= @$_GET["sayfa"];
				  if(empty($sayfa) or !is_numeric($sayfa)) {
				  	$sayfa = 1;
				  }

	              $markaCount	=	$db->get_var("SELECT COUNT(*) FROM faculties");
	              $limit 		=	5;
	              $toplamSayfa	=	ceil($markaCount / $limit);

	              $offset		=	($sayfa - 1) * $limit;	

	              $faculties	=	$db->get_results("SELECT * FROM faculties ORDER by faculties.name ASC LIMIT $offset, $limit");

	              foreach($faculties as $each):
	              ?>
	                <tr>
	                  <td width="30px"><?php echo $each->id; ?></td>
	                  <td><strong><?php echo $each->name; ?></strong></td>
	                  <td width="50px"><a href="<?php echo $base_url; ?>index.php?s=fakulte-duzenle&id=<?php echo $each->id; ?>">Düzenle</a><br/><a href="<?php echo $base_url; ?>index.php?s=fakulte-listesi&action=sil&id=<?php echo $each->id; ?>" onclick="javascript:return confirm('Silmek istediğinize emin misiniz?')">Sil</a></td>
	                </tr>
	                <?php 
	                endforeach;
	                ?>
	              </tbody>
	            </table>        
	            <div>
            	<?php 
            	for($i = 1; $i <= $toplamSayfa; $i++){
            		if($sayfa == $i){
            			echo '<a class="linkactive" href="'.$base_url.'index.php?s=fakulte-listesi&sayfa='.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
            		}
            		else{
            			echo '<a href="'.$base_url.'index.php?s=fakulte-listesi&sayfa='.$i.'">'.$i.'</a>&nbsp;&nbsp;&nbsp;';
            		}
            	}
            	?>
	            </div>
        </div>
      </div>    