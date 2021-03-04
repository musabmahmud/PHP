<?php include 'inc/header.php';
	  include 'database.php';

?>

<?php
	$db = new Database();
	$query = "SELECT * FROM tbl_user";
	$read = $db->select($query);
?>
<div class="card">
  <div class="card-body">
    <div class="table-responsive-sm">
    <table class="table table-dark table-striped table-bordered table-hover table-lg text-center">
      <thead>
        <tr class="text-uppercase text-danger">
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
<?php 
    $i = 0;
  if($read){
    while ($row = $read->fetch_assoc()) {
      $i++;
?>	
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td><a class="btn btn-primary" href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
		</tr>

<?php 	}}
	else{
?>
	<h2>Data Not Found</h2>
<?php   }?>
      </tbody>
    </table>
    </div>
</div>
</div>
<?php include 'inc/footer.php';?>