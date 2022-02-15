<?php
session_start();
include('includes/config.php');
error_reporting(0);
//Restrict admin or Moderator to Access user.php page
if($_SESSION['user']['role']=='cheifeditor'){
 header('location:index.php');
}
elseif($_SESSION['user']['role']=='editor'){
 header('location:index.php');
}
elseif($_SESSION['user']['role']=='reporter'){
 header('location:index.php');
}
else{
	
if(isset($_POST['submituser']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$usertype=$_POST['usertype'];
$firstname=$_POST['firstname']; 
$lastname=$_POST['lastname'];
$address=$_POST['address'];
$phonenumber=$_POST['phonenumber'];
$status=1;
$query=mysqli_query($con,"insert into user(username,password,role,FirstName,LastName,Address,PhoneNumber,Is_Active) values('$username','$password','$usertype','$firstname','$lastname','$address','$phonenumber','$status')");
if($query)
{
$msg="User-Profile created ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>

        <title>BorneoPost | Add User</title>

        <!-- App css -->
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
<!-- Top Bar End -->


<!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>
 <!-- Left Sidebar End -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Add User</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li>
                                            <a href="#">User </a>
                                        </li>
                                        <li class="active">
                                            Add User
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Add User </b></h4>
                                    <hr />
                        		


<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>  



</div>
</div>





                        							<div class="row">
                        				<div class="col-md-6">
                        					<form class="form-horizontal" name="usertype" method="post">
	                                            <div class="form-group">
                                                    <label class="col-md-2 control-label">UserName</label>
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control" value="" name="username" required>
                                                    </div>
                                                </div>
                                         

				<div class="form-group">



	                                            <div class="form-group">
	                                                <label class="col-md-2 control-label">Password</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="password" required>
	                                                </div>
	                                            </div>

        		<div class="form-group">
                                     
                                                  
                                                 
	                                                <label class="col-md-2 control-label">UserType</label>
	                                                <div class="col-md-10">
	                                                  <select class="form-control" name="usertype" required>
                                                   <option value="">Select User Type </option>
                                                   <option value="admin">admin</option>
                                                   <option value="cheifeditor">cheifeditor </option>
                                                   <option value="editor">editor</option>
                                                   <option value="reporter">reporter </option>


                                                        </select> 
	                                                </div>
	                                            </div>
	                                     



    <div class="form-group">             
                                                  
                                                   <div class="form-group">
	                                                <label class="col-md-2 control-label">First Name</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="firstname" required>
	                                                </div>
	                                            </div>

        <div class="form-group">
                                                  
                                                  
                                                   <div class="form-group">
	                                                <label class="col-md-2 control-label">Last Name</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="lastname" required>
	                                                </div>
	                                            </div>

        <div class="form-group">
                                                  
                                                  
                                                  <div class="form-group">
	                                                <label class="col-md-2 control-label">Address</label>
	                                                <div class="col-md-10">
	                                                    <textarea class="form-control" rows="5" name="address" required></textarea>
	                                                </div>
	                                            </div>

        <div class="form-group">
                                                  
                                                  
                                                  
                                                  <div class="form-group">
	                                                <label class="col-md-2 control-label">Phone Number</label>
	                                                <div class="col-md-10">
	                                                    <input type="text" class="form-control" value="" name="phonenumber" required>
	                                                </div>
	                                            </div>

        <div class="form-group">
                                                   
                                                   
                                                    <label class="col-md-2 control-label">&nbsp;</label>
                                                    <div class="col-md-10">
                                                  
                                                <button type="submit" class="btn btn-custom waves-effect waves-light btn-md" name="submituser">
                                                    Submit
                                                </button>
                                                    </div>
                                                </div>

	                                        </form>
                        				</div>


                        			</div>


                        			




           
                       


                                </div>
                            </div>
                        </div>
                        <!-- end row -->


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