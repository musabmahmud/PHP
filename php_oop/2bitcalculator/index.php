<?php include 'header.php'; 
include 'calculate.php'; 
?>
	


<form action="" method="POST">
	<table>
		<tr>
			<td>ENTER FIRST NUMBER :</td>
			<td><input type="number" name="firstnumber"/ required="1"></td>
		</tr>
		<tr>
			<td>ENTER Second NUMBER :</td>
			<td><input type="number" name="secnumber"/ required="1"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="calculate" value="Calculate"><input type="reset" name="reset" value="Reset"></td>
		</tr>
	</table>
</form>

<?php 
	if(isset($_POST['calculate'])){
		$numOne = $_POST['firstnumber'];
		$numtwo = $_POST['secnumber'];

	$cal = new calC;
	$cal->add($numOne,$numtwo);
	$cal->substract($numOne,$numtwo);
	$cal->mulT($numOne,$numtwo);
	$cal->div($numOne,$numtwo);
	$cal->modulas($numOne,$numtwo);
	
	}
?>














<?php include 'footer.php'; ?>