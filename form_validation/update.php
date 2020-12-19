<?php 
include 'header.php';
include "config.php";
include "database.php";
?>
<?php
    $id = $_GET['id'];
    $db = new Database();
    $query = "SELECT * FROM data_table WHERE id= $id";
    $getData = $db->select($query)->fetch_assoc();




    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $comment = mysqli_real_escape_string($db->link, $_POST['comment']);
        if($name == '' || $email =='' || $comment ==''){
            $error = "Field must bo be empty";
        }
        else{
            $query = "UPDATE data_table
            SET
            name = '$name',
            email = '$email',
            comment = '$comment'
            WHERE id = $id";

            $update = $db-> update($query);
        }
    }
?>
<?php
    if(isset($_POST['delete'])){
        $query = "DELETE FROM data_table WHERE id = $id";
        $deleteData = $db->delete($query);
    }


?>


<?php
    if(isset($error)){
        echo "<span style='color:red'>". $error."</span>";
    }
?>


<form  action="update.php?id=<?php echo $id; ?>" method="post">
<table>
<tr>
    <td>Name</td>
    <td><input type="text" name="name" Value="<?php echo $getData['name'] ?>"/></td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email" Value="<?php echo $getData['email'] ?>"/></td>
</tr>
<tr><td>Comment</td>
    <td><input type="text" name="comment" Value="<?php echo $getData['comment'] ?>"/></td>
</tr>
<tr>
    <td></td>
    <td>
        <input type="submit" name="submit" value="Update" />
        <input type="reset" name="Cancel" />
        <input type="submit" name="delete" value="Delete" />
        
    
    </td>
</tr>
</table>
</form>

<a href="index.php">Go Back</a>

<?php include 'footer.php'; ?>