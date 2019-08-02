<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php /*?><form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name<input type="text" name="fname" />
<input type="button" value="submit" />
</form><?php */?>

<?php 
if ( $_SERVER["REQUEST_METHOD"]=="POST")
 {$name=$_REQUEST['fname'];
 if ( empty($name)) {
	 echo"Name is empty";}
	 else
	{ echo $name;}
 }
?>

 <?php 
 $car=array(
 array("BMW",21,34),
 array("Honda",21,24),
 array("Toyata",21,84),
 array("Civics",21,24),
 array("Mercedes",21,14)
 
 );
 for($row=0;$now<5;$row++)
 {
	 echo "Row Number is $row";
	 for($col=0;$col<3;$col++)
	 {   echo"<ul";
	 
	 echo "<li>".$car[$row][$col]."</li>";
	     echo"</ul>";
		 }
	 
	 }
 
 
 ?>
 
 


</body>
</html>