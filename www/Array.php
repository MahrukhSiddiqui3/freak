<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
 <?php 
 $car=array(
 array("BMW",21,34),
 array("Honda",21,24),
 array("Toyata",21,84),
 array("Civics",21,24),
 array("Mercedes",21,14)
 
 );
 for($row=0;$row<5;$row++)
 {
	 echo "Row Number is $row";
	 echo "<br/>";
	 echo"<ul";
	 for($col=0;$col<3;$col++)
	 {   echo "<li>".$car[$row][$col]."</li>";
	     
		 }
	 echo"</ul>";
	 }
 
 
 ?>
 <?php
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );
    
for ($row = 0; $row < 4; $row++) {
  echo "<p><b>Row number $row</b></p>";
  echo "<ul>";
  for ($col = 0; $col < 3; $col++) {
    echo "<li>".$cars[$row][$col]."</li>";
  }
  echo "</ul>";
}
?>
<?php 
 $myfile=fopen('NATLALIA.txt','r') or die("File not found");
 while(!feof($myfile))
 {  echo fread($myfile,filesize('NATALIA.txt'));
	 }
	 fclose($myfile);


?>


</body>
</html>