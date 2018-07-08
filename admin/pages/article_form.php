<h2>Article</h2>
<hr>
<form method="POST" action="<?php echo URL.'admin/pages/article_proses.php?action=input'; ?>" enctype="multipart/form-data">
	<div id="form-input">	
		<label for="">Title</label>
		<input type="text" name="title">	
	</div>
	<div id="form-input">
		<label for="">Kategori</label>	
		<select name="category" id="">
		<option> - </option>
		<?php 
			$query = $dbh->query("SELECT * FROM category");
			while($row = $query->fetch(PDO::FETCH_OBJ)){
		 ?>
			<option value="<?php echo $row->id; ?>"><?php echo $row->category_name; ?></option>
		<?php } ?>
		</select>
	</div>
	
	<div id="form-input">	
		<label for="">Image</label>
		<input type="file" name="image">
	</div>

	<div id="text-area">
		<label for="">Description</label>
		<textarea name="description" id="" cols="30" rows="10"></textarea>
	</div>

	<button>Submit</button>
</form>	