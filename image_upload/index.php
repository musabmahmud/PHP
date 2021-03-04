<?php include 'inc/header.php';
    include 'config.php';
    include 'database.php';
?>
<?php    
	$db = new Database();
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$permited = array('jpg', 'png', 'jpeg');
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr( md5(time()), 0,10).'.'.$file_ext;
		$folder = "uploads/".$unique_image;


		if(empty($file_name)){
			echo "Please Insert an Image";
		}
		elseif($file_size > 3000000){
			echo "Image size Must less than 5 Mb";
		}
		elseif(in_array($file_ext, $permited) === false){
			echo "Image Must be jpg, png or jpeg";
		}
		else{
			move_uploaded_file($file_tmp, $folder);
			$query = "INSERT INTO tbl_image(image) VALUES('$unique_image')";
			$insert = $db->insert($query);
			if($insert){
				echo "Inserted Successfully";
			}
			else{
				echo "failed to upload";
			}
		}
	}
?>
<form action="index.php" method="POST" enctype="multipart/form-data">
	<div class="form-group">
      <label>Image Upload:</label>
      <input type="file" class="form-control" name="image">
    </div>
	<div class="form-group">
	    <button type="submit" class="btn btn-primary" name="upload">Image Upload</button>
	</div>
</form>

<?php
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		$query = "delete from tbl_image where id='$id'";
		$delete = $db->delete($query);
		if ($delete) {
			echo "Delete Successfully";
		}
		else{
			echo "failed to delete";
		}
	}

?>


<table class="table table-striped table-bordered table-hover table-sm text-center">
    <tr class="text-uppercase bg-dark text-white">
		<td>ID</td>
		<td>Image</td>
		<td>Action</td>
	</tr>
<?php
	$query = "SELECT * FROM tbl_image order by id DESC";
	$getImage = $db->select($query);
	if($getImage){
		$i = 0;
		while ($result = $getImage->fetch_assoc()) {
			$i++;
?>
	<tr>
		<td><?php echo $i;?></td>
		<td><img src="uploads/<?php echo $result['image'];?>" width="50" height="50"></td>
		<td><a class="btn btn-primary" href="?del=<?php echo $result['id'];?>">Delete</a></td>
	</tr>

<?php
		}
	}
?>
</table>
<?php include 'inc/footer.php';
?>
