 <?php
include("Common.php");

$sql="SELECT ID,Image FROM Brandarea";
  $res=mysql_query($sql) or die(mysql_error());
 ?>
  
    <!-- Start Brand Area -->
            <div class="brand-area pb-90">
                <div class="container">
                    <div class="row">
                        <div class="brand-list">
                        <?php
						/*$sql = "SELECT ID,Image FROM brands";
                        $res = mysql_query($sql) or die(mysql_error());
                        */while($row = mysql_fetch_array($res))
						{
		                  ?>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="<?php echo DIR_UPLOADING_BRANDAREA.$row['Image']?>" alt="Brandarea">
                                    </a>
                                </div>
                            </div>
                            <?php
                            }
							?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
          