<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
<!DOCTYPE HTML>
<HTML>
<head>
<title>PHP Learning</title>
</head>
<body>
<?php 
$name="Maha";
$age=21;
echo "My name is " . $name." and my age is" .$age; 
echo "My beginning started";
function letstest(){
	$x=20;
	static $y=31;
	global $age;
	echo"My age is $age";
	echo"<br>";
	echo"My age is $x";
	echo"<br>";
	echo $y;
	echo"<br>";
	$y++;
	$like=array("abdur","Rahim","Natalia","hannah");
	var_dump($like);
	function name($fname){
		echo" $fname Siddiqui"; 
		echo"<br>";
		};
	name("Mahrukh");
	name("Shahrukh");
	name("Shayan");
	name("Aslam");
	
	}
	$GLOBALS['x']=8;
	$GLOBALS['y']=9;
	function sum(){
		
		$GLOBALS['z']=$x+$y;
		
		
		};
	sum(); echo $z;
	sum(); 
	sum();
	
letstest();
letstest();
letstest();
echo" age is $age";
echo"<br>";
echo"age is $x";
?>
<?php
$marks=80;
switch($marks){
	case '90' :
	echo "Your grade is A"; break;
	case '80' :
	echo "Your grade is B";break;
	case '70' :
	echo "Your grade is C";break;
	default :
	echo "You are faile";break;
	
	}

?>
</body>

</HTML>