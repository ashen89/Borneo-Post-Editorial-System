<?php
session_start();
include('includes/config.php');
error_reporting(0);
//Restrict admin or Moderator to Access user.php page


if($_SESSION['user']['role']=='reporter'){
 header('location:index.php');
}


else{
if($_GET['action']=='del' && $_GET['scid'])
{
	$id=intval($_GET['scid']);
	$query=mysqli_query($con,"update  tbluserprofile set Is_Active='0' where UserProfileId='$id'");
	$msg="UserProfile deleted ";
}
// Code for restore
if($_GET['resid'])
{
	$id=intval($_GET['resid']);
	$query=mysqli_query($con,"update  tbluserprofile set Is_Active='1' where UserProfileId='$id'");
	$msg="UserProfile restored successfully";
}

// Code for Forever deletionparmdel
if($_GET['action']=='perdel' && $_GET['scid'])
{
	$id=intval($_GET['scid']);
	$query=mysqli_query($con,"delete from   tbluserprofile  where UserProfileId='$id'");
	$delmsg="UserProfile deleted forever";
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <title> News | Manage User Profiles</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
<?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
<?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Manage UserProfile</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">UserProfile </a>
                                        </li>
                                        <li class="active">
                                           Manage UserProfile
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


<div class="row">
<div class="col-sm-6">  
 
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<?php if($delmsg){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($delmsg);?></div>
<?php } ?>


</div>
                                 
                                 
                                    


                                   


                                    <div class="row">
										<div class="col-md-12">
											<div class="demo-box m-t-20">
<div class="m-b-30">
<a href="add-user.php">

</a>
 </div>

												<div class="table-responsive">
                                                    <table class="table m-0 table-colored-bordered table-bordered-primary">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>User Name</th>
                                                                <th>Role</th>
                                                                <th>Address</th>
                                                                <th>Phone Number</th>
                                                          
                                                                <th>Posting Date</th>
                                                                  <th>Last updation Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$query=mysqli_query($con,"Select username,role,Address,PhoneNumber,PostingDate,UpdationDate from  user where Is_Active=1");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>


 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['username']);?></td>
<td><?php echo htmlentities($row['role']);?></td>
<td><?php echo htmlentities($row['Address']);?></td>
<td><?php echo htmlentities($row['PhoneNumber']);?></td>
<td><?php echo htmlentities($row['PostingDate']);?></td>
<td><?php echo htmlentities($row['UpdationDate']);?></td>
<td></td>
</tr>
<?php
$cnt++;
 } ?>
</tbody>
                                                  
                                                    </table>
                                                </div>




											</div>

										</div>

							
									</div>
                                    <!--- end row -->


                                    
<div class="row">
<div class="col-md-12">
<div class="demo-box m-t-20">
<div class="m-b-30">

 <h4><i class="fa fa-trash-o" ></i> Deleted UserProfile</h4>

 </div>

<div class="table-responsive">
   <table class="table m-0 table-colored-bordered table-bordered-danger">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>User Name</th>
                                                                <th>Role</th>
                                                                <th>Address</th>
                                                                <th>Phone Number</th>
                                                          
                                                                <th>Posting Date</th>
                                                                 <th>Last Updation Date</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
<?php 
$query=mysqli_query($con,"Select username,role,Address,PhoneNumber,PostingDate,UpdationDate from  user where Is_Active=0");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>

 <tr>
<th scope="row"><?php echo htmlentities($cnt);?></th>
<td><?php echo htmlentities($row['username']);?></td>
<td><?php echo htmlentities($row['role']);?></td>
<td><?php echo htmlentities($row['Address']);?></td>
<td><?php echo htmlentities($row['PhoneNumber']);?></td>
<td><?php echo htmlentities($row['PostingDate']);?></td>
<td><?php echo htmlentities($row['UpdationDate']);?></td>
<td><a href="manage-userprofile.php?resid=<?php echo htmlentities($row['UserProfileId']);?>"><i class="ion-arrow-return-right" title="Restore this UserProfile"></i></a> 
	&nbsp;<a href="manage-userprofile.php?rid=<?php echo htmlentities($row['UserProfileId']);?>&&action=parmdel" title="Delete forever"> <i class="fa fa-trash-o" style="color: #f05050"></i> </td>
</tr>
<?php
$cnt++;
  }?>
</tbody>
                                                  
                                                    </table>
                                                </div>



                                                
											</div>

										</div>

							
									</div>                  
                                  



                                   






                        






                    </div> <!-- container -->

                </div> <!-- content -->
<?php include('includes/footer.php');?>
            </div>

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>