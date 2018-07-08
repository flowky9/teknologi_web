<?php 

// $pages = isset($_GET['pages']) ? $_GET['pages'] : 1 ;
// $count_row = $dbh->query("SELECT * FROM post");
// $total_article = $count_row->rowCount();
// $limit = 10;
// $offset = ($pages-1) * $limit;
// $total_pages = ceil($total_article / $limit);
// $pagination = 3;
// // START NUMBER
// if($pages <= $pagination+1 ){
// 	$start_pagination = 1;
// }else if($pages == $total_pages){
// 	$start_pagination = $total_pages - $pagination;
// }else if($pages > $pagination+1) {
// 	$start_pagination = $pages - $pagination;

// }
// // END NUMBER
// if($pages == 1){
// 	$end_pagination = $pagination + 1;
// }else if($pages == $total_pages){
// 	$end_pagination = $total_pages;
// } else{
// 	if($pages + $pagination <= $total_pages){
// 		$end_pagination = $pages + $pagination;
// 	}else {
// 		$end_pagination = $total_pages;
// 	}
// }

pagination("post",10);
$query = $dbh->query("SELECT * FROM post LIMIT $limit OFFSET $offset ");




?>
<h2>Article</h2>
<hr>
<table border="1">
	<thead>
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Judul</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
	<?php

	
	$no = $offset+1;
	while($row = $query->fetch(PDO::FETCH_OBJ)){

	?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $row->date; ?></td>
			<td><?php echo $row->title; ?></td>
			<td><a href="<?php echo URL.'admin/pages/article_proses.php?action=delete&id='.$row->id; ?>">Hapus</a> | <a href="<?php echo URL.'admin/index.php?module=article_select_data&id='.$row->id; ?>">Edit</a> | <a href="">Unpublish</a> </td>
		</tr>
	<?php } ?>
	</tbody>
</table>


<div id="pagination">
<?php pagination_number("post",10); ?>
</div>
