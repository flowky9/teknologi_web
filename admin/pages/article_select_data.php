<?php

$id = $_GET['id'];
$queryUpdate = $dbh->query("SELECT * FROM post WHERE id = '$id'");
$rowUpdate = $queryUpdate->fetch(PDO::FETCH_OBJ);
?>

<h2>Article</h2>
<hr>
<form method="POST" action="<?php echo URL.'admin/pages/article_proses.php?action=update&id='.$rowUpdate->id; ?>" enctype="multipart/form-data">
	<div id="form-input">	
		<label for="">Title</label>
		<input type="text" name="title" value="<?php echo $rowUpdate->title; ?>">	
	</div>
	<div id="form-input">
		<label for="">Kategori</label>	
		<select name="category" id="">
		<option> - </option>
		<?php 
			$query = $dbh->query("SELECT * FROM category");
			while($row = $query->fetch(PDO::FETCH_OBJ)){
		 ?>
			<option value="<?php echo $row->id; ?>" <?php if($rowUpdate->category_id == $row->id){echo "selected";} ?> ><?php echo $row->category_name; ?></option>
		<?php } ?>
		</select>
	</div>
	
	<div id="form-input">	
		<label for="">Image</label>
		<input type="file" name="image">
	</div>
	<img width="100" height="auto" src="<?php echo URL."assets/img/".$rowUpdate->image; ?>" alt="">

	<div id="text-area">
		<label for="">Description</label>
		<textarea name="description" id="" cols="30" rows="10"><?php echo $rowUpdate->description; ?></textarea>
	</div>

	<button>Submit</button>
</form>	