<?php 
include 'header.php';
include "config.php";
include "database.php";
?>
<?php
    $db = new Database();
    if(isset($_POST['submit'])){
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
        $email = mysqli_real_escape_string($db->link, $_POST['email']);
        $comment = mysqli_real_escape_string($db->link, $_POST['comment']);
        if($name == '' || $email =='' || $comment ==''){
            $error = "Field must bo be empty";
        }
        else{
            $query = "INSERT INTO data_table(name,email,comment) Values('$name','$email','$comment')";
            $create = $db->insert($query);
        }
    }
?>



<?php
    if(isset($error)){
        echo "<span style='color:red'>". $error."</span>";
    }
?>


<form  action="create.php" method="post">
<table>
<tr>
    <td>Name</td>
    <td><input type="text" name="name" placeholder="Please Enter Your Name"></td>
</tr>
<tr>
    <td>Email</td>
    <td><input type="text" name="email" placeholder="Please Enter Your Name"></td>
</tr>
<tr><td>Comment</td>
    <td><input type="text" name="comment" placeholder="Please Enter Your Name"></td>
</tr>
<tr><td></td>
    <td>
        <input type="submit" name="submit" value="Submit" />
        <input type="reset" name="Cancel" />
    
    </td>
</tr>
</table>
</form>

<a href="index.php">Go Back</a>

<?php include 'footer.php'; ?>