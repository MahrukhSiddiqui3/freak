 <?php
include("Common.php");

$sql="SELECT ID,Brandname,Status,Description,DATE_FORMAT(DateAdded,'%b %d %Y') as Added ,DATE_FORMAT(DateModified,'%b %d %Y') FROM Brandarea WHERE Brandname='".$Brandname."'";
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
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/4.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/5.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/6.png" alt="">
                                    </a>
                                </div>
                            </div>
                             <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/1.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/2.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="single-brand text-center">
                                    <a href="#">
                                        <img src="images/brand/3.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Of Brand Area -->
          