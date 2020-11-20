<?php include 'header.php';

$arr = array("HTML","CSS","JAVASCRIPT","jQuery");
$coding = new ArrayObject($arr);
$iterator = $coding->getIterator();

while($iterator->valid()){
	echo $iterator->current()."<br>";
	$iterator->next();
}

 include 'footer.php';
 ?>