<?php
include("Common.php");
include("CheckAdminLogin.php");
if(isset($_REQUEST['CustomFieldID']) && isset($_REQUEST['Option']))
{
$ID=$_REQUEST['CustomFieldID'];
$Option=$_REQUEST['Option'];

$sql = "SELECT Options FROM customfield WHERE ID=".$ID;
$res = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($res);
$arrayofoption = array();
array_push($arrayofoption,$Option);
$result=array_diff(explode(",",$row['Options']),$arrayofoption);
$Option=implode(",",$result);

$sql = "UPDATE customfield SET Options='".$Option."' where ID=".$ID;
mysql_query($sql) or die(mysql_error());

$_SESSION['msg'] ='<div class="callout callout-success">
                <p>Option has been deleted</p>
              </div>';	
redirect('EditCustomField.php?CustomFieldID='.$ID);
}
?>