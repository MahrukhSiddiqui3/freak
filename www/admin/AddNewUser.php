<?php
include("Common.php");
include("CheckAdminLogin.php");
$msg = '';
$Status = 0;
$RoleID = 0;
$Username = '';
$Address='';
$Cellnumber='';
$NIC='';
$Password = '';
$EmailAddress = '';
$ImageFile='';

if(isset($_POST["submit_key"])&& $_POST['submit_key'] == 'submit_value')
{
	if(isset($_POST["Status"]) && ($_POST["Status"]==1 || $_POST["Status"]==0))
	        $Status=trim($_POST["Status"]);
	if(isset($_FILES["ImageFile"]))
	 $ImageFile=trim($_FILES["ImageFile"]["name"]);
	if(isset($_POST["RoleID"]) && ctype_digit($_POST["RoleID"]))
	        $RoleID=trim($_POST["RoleID"]);
	if(isset($_POST["Username"]))
	        $Firstname=trim($_POST["Username"]);
	if(isset($_POST["Password"]))
	        $Password=trim($_POST["Password"]);
	if(isset($_POST["Address"]))
	        $Address=trim($_POST["Address"]);
	if(isset($_POST["Cellnumber"]))
	        $Cellnumber=trim($_POST["Cellnumber"]);
	if(isset($_POST["NIC"]))
	        $NIC=trim($_POST["NIC"]);
	if(isset($_POST["EmailAddress"]))
	        $EmailAddress=trim($_POST["EmailAddress"]);
			
	if($ImageFile=="")
	{
	  $msg ='<div class="callout callout-danger">

                <p>Please Upload Image</p>
              </div>';
	}
		
	
	else if($Username=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter Username</p>
              </div>';
	}
	
    else if($RoleID==0)
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Select Role</p>
              </div>';
	}
    else if($Password=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter Password</p>
              </div>';
	}
	else if($Address=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter Address</p>
              </div>';
	}
	else if($Cellnumber=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter Cell Number</p>
              </div>';
	}
	else if($NIC=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter NIC</p>
              </div>';
	}
	else if($EmailAddress=="")
	{
		 $msg ='<div class="callout callout-danger">

                <p>Please Enter EmailAddress</p>
              </div>';
	}
	if($msg == "")
	{
		$query = "INSERT INTO users SET 
				Status = '".(int)$Status."',
				RoleID = '".(int)$RoleID."',
				Username = '".$Username."',
				Password = '".$Password."',
				Address = '".$Address."',
				Cellnumber = '".$Cellnumber."',
				NIC = '".$NIC."',
				EmailAddress = '".$EmailAddress."',
				Image='".$ImageFile."',
				DateAdded = NOW()
				";
		mysql_query($query) or die(mysql_error());
		$lastid=mysql_insert_id();
		if($ImageFile!='')
		{ $ext=explode('.',$ImageFile);
		  $ext=end($ext);
		  $ImageFile='C-'.$lastid.'.'.$ext;
		}
          $moved = move_uploaded_file($_FILES['ImageFile']['tmp_name'],DIR_UPLOADING_CATEGORIES.$ImageFile);
			if($moved)
			{
				$sql = "UPDATE categories SET Image = '".$ImageFile."' WHERE ID = ".$lastid;
				mysql_query($sql) or die(mysql_error());
			}
		
		$_SESSION['msg'] ='<div class="callout callout-success">

                <p>User has been added</p>
              </div>';	
		redirect($self);
	}
}

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | General Form Elements</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 <?php include("Header.php"); ?>  
 <!-- Left side column. contains the logo and sidebar -->
 <?php include("Sidebar.php"); ?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add New User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New User</h3>
              <button type="submit" onClick="location.href='Users.php'" class="btn btn-default pull-right">Cancel</button>
            </div>
			<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				$_SESSION['msg'] = '';
			}
			echo $msg;
			?>
            <!-- /.box-header -->
            <!-- form start -->
             <form class="form-horizontal" action="<?php echo $self;?>" method="post" enctype="multipart/form-data">
              <div class="box-body">
			  
			    <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                      <label>
                        <input type="radio" value="1" <?php echo($Status == 1 ? 'checked' : ''); ?> name="Status"> Enable
                      </label>
					  <br>
					  <label>
                        <input type="radio" value="0" <?php echo($Status == 0 ? 'checked' : ''); ?> name="Status"> Disable
                      </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> Select Image</label>

                  <div class="col-sm-10">
                    <input type="file" name="ImageFile" id="ImageFile" />
                  </div>
                </div>
                
              <div class="form-group">
			      <label for="inputEmail3" class="col-sm-2 control-label">Select Role</label>
				  <div class="col-sm-10">
                  <select class="form-control" name="RoleID">
				  <option value="0">Select Role</option>
				  <?php
				  $sql = "SELECT RoleName,ID FROM roles WHERE ID <> 0";
				  $res = mysql_query($sql) or die(mysql_error());
				  while($rows = mysql_fetch_array($res))
				  {
				  ?>
                    <option <?php echo ($RoleID==$rows['ID'] ? 'selected' : '');?> value="<?php echo $rows['ID'];?>"><?php echo $rows['RoleName'];?></option>				  <?php
				  }
				  ?>
                  </select>
				  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="Username" value="<?php echo $Username; ?>" placeholder="Enter First Name">
                  </div>
                </div>
               
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword3" name="Password" value="<?php $Password; ?>" placeholder="Password">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="Address" value="<?php echo $Address; ?>" placeholder="Enter Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Cell Number</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="Cellnumber" value="<?php echo $Cellnumber; ?>" placeholder="Enter Cellnumber">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">NIC</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="NIC" value="<?php echo $NIC; ?>" placeholder="Enter NIC">
                  </div>
                </div>
				
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" name="EmailAddress" value="<?php $EmailAddress; ?>" placeholder="Email">
                  </div>
                </div>
				
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Add</button>
              </div>
              <!-- /.box-footer -->
			  <input type="hidden" name="submit_key" value="submit_value"/>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include("Footer.php"); ?> 
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
