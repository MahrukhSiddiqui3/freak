<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php /*?>Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?><?php */?>
<?php 
 $nameErr=$genderErr=$emailErr=$websiteErr=$commentErr="";
 $name=$email=$comment=$gender=$website="";
 if ($_SERVER['REQUEST_METHOD']=='POST'){
	 if(empty($_POST['name'])){
		 $nameErr="Name is required";
		 }
	 else{
	 $name=test_input($_POST['name']);
	   if(!preg_match("/^[a-zA-z]*$/",$name)){
		   echo "you can only enter letters and whitespaces";
		   }
		 }
	if(empty($_POST['email'])){
		$emailErr="email is required";
		}
	else{
	 $email=test_input($_POST['email']);
	  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		  echo"invalid email format";
		  }
	}
	if(empty($_POST['website'])){
		$websiteErr="";
		}
		else{
		$website=test_input($_POST['website']);
		}
		if(empty($_POST['gender'])){
		$genderErr="Gender is required";
		}
		else{
	 $gender=test_input($_POST['gender']);
		}
	 if(empty($_POST['comment'])){
		$ommentErr="";
		}
		else{
	 $comment=test_input($_POST['comment']);
		}
	 }
function test_input($data){
	$data=trim ($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
	
	};
	

?>
 <form method="post" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
 Name: <input type="text" name="name" value="<?php echo $name;?>"><span class="error"><?php echo $nameErr;?></span> <br/>
E-mail: <input type="text" name="email" value="<?php echo $email;?>"><span class="error"><?php echo $emailErr;?></span><br/>
Website: <input type="text" name="website" value="<?php echo $website;?>"/><span class="error"><?php echo $websiteErr;?></span><br />
Gender: <input type="radio" name="gender" value="male" <?php if(isset($gender)&&$gender=='male')  echo "checked";?>/>male
 <input type="radio" name="gender" value="female"<?php if(isset($gender)&&$gender=='female')  echo "checked";?>/>female<span class="error"><?php echo $genderErr?></span><br />
Comment: <textarea rows="5" cols="40" name="comment"><?php echo $comment;?></textarea><span class="error"><?php echo $commentErr?></span>
<br /><br />
<input type="submit"/>
 
 
 </form>
 <?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
<?php /*?><?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $website = test_input($_POST["website"]);
  $comment = test_input($_POST["comment"]);
  $gender = test_input($_POST["gender"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name">
  <br><br>
  E-mail: <input type="text" name="email">
  <br><br>
  Website: <input type="text" name="website">
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?><?php */?>
</body>
</html>