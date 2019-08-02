<?php
session_start();
include("DBConnection.php");
define('DIR_UPLOADING_CATEGORIES','assets/categories/');
define('DIR_UPLOADING_USERS','assets/users/');
define('DIR_UPLOADING_PRODUCTS','assets/products/');
define('DIR_UPLOADING_BRAND','assets/brands/');
define("INDENT", "&nbsp;&nbsp;&nbsp;");
$type = array("Text","RadioButton","Checkbox");
	
	
function redirect($url)
{
	header('Location:'.$url);
	exit();
}
function get_categoryname($CatIDs)
{
		if($CatIDs != '')
		{			
	
		  $query="select CategoryName from categories where ID IN (".$CatIDs.")";
		  $res = mysql_query($query) or die(mysql_error());
		  $CatNames = array();
		  while($rows = mysql_fetch_array($res))
		  {
			$CatNames[] =$rows['CategoryName'];
		  }
		
		  $CatNames = implode(",",$CatNames);
		  return $CatNames;
		}
		
}

$self = $_SERVER['PHP_SELF'];

?>