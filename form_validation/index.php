<?php 
include 'header.php';
include "config.php";
include "database.php";
?>
<?php
   $db = new Database();
   $query = "SELECT * FROM data_table";
   $read = $db->select($query);
?>
<?php
    if(isset($_GET['msg'])){
        echo "<span style='color:green'>". $_GET['msg']."</span>";
    }
?>





<table class="db_table" border="2">
    <tr>
        <th>name</th>
        <th>email</th>
        <th>comment</th>
        <th>action</th>
    </tr>
    <?php
        if($read){
        while($row = $read->fetch_assoc()){
    ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
    </tr>
    <?php }
        }
    ?>
</table>


<a href="create.php">Create</a>

<?php include 'footer.php'; ?>