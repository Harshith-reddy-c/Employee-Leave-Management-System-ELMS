<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    
    if(isset($_POST['change']))
        {
    $newpassword=md5($_POST['newpassword']);
    $empid=$_SESSION['empid'];

    $con="UPDATE tblemployees set Password=:newpassword where id=:empid";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1-> bindParam(':empid', $empid, PDO::PARAM_STR);
    $chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    $msg="Your Password has be recovered. Enter new credentials to continue";
    }

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Employee Leave Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
    body {
        background-color: #f4f4f4; /* Set a light gray background color */
        font-family: 'Arial', sans-serif; /* Set a common font for the body */
    }

    .login-area {
        border-radius: 0 !important; /* Remove border-radius to make it straight */
        background-color: #fff; /* Set a white background for the login area */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
        margin-top: 50px; /* Add some top margin for better alignment */
    }

    .login-box {
        padding: 20px; /* Add padding inside the login box */
    }

    .login-form-head {
        text-align: center; /* Center-align the heading */
        margin-bottom: 30px; /* Add some bottom margin for spacing */
    }

    .login-form-head h4 {
        color: #333; /* Set the heading color */
    }

    .login-form-head p {
        color: #777; /* Set the subheading color */
        margin-top: 10px; /* Add some top margin for spacing */
    }

    .form-gp {
        margin-bottom: 25px; /* Add bottom margin for form groups */
    }

    .form-gp label {
        color: #333; /* Set the label color */
        font-size: 14px; /* Set the label font size */
    }

    .form-gp input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-top: 8px;
        box-sizing: border-box;
    }

    .form-gp i {
        position: absolute;
        top: 30px;
        right: 10px;
        color: #888; /* Set the icon color */
    }

    .submit-btn-area {
        text-align: center; /* Center-align the content inside submit-btn-area */
        margin-top: 20px; /* Adjust top margin for spacing */
    }

    .submit-btn-area button {
        width: 30%;
        padding: 10px;
        background-color: #4caf50; /* Set a green background color for the button */
        color: #fff; /* Set the button text color */
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        display: inline-block; /* Make the button display as inline-block to center it */
    }

    .submit-btn-area button:hover {
        background-color: #45a049; /* Darken the button on hover */
    }

    .form-footer {
        margin-top: 20px; /* Add top margin for the form footer */
    }

    .form-footer a {
        color: #007bff; /* Set the link color */
    }
</style>

</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    
    <div class="login-area login-s2">
        <div class="container">
        <?php if($error){?><div class="alert alert-danger alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($error); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                            
                </div><?php } 
                else if($msg){?><div class="alert alert-success alert-dismissible fade show"><strong>Info: </strong><?php echo htmlentities($msg); ?> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
             </div><?php }?>
            <div class="login-box ptb--100">

                <form method="POST" name="signin">
                    <div class="login-form-head">
                        <h4>Recover Your Password</h4>
                        <p>Please provide your employee details for recovery.</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="exampleInputEmail1" name="emailid" autocomplete="off">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Employee ID</label>
                            <input type="text" id="exampleInputPassword1" name="empid" autocomplete="off">
                            <i class="ti-id-badge"></i>
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="submit-btn-area">
                            <button id="form_submit" name="submit" type="submit">PROCEED FOR RECOVERY <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Have an Account? <a href="index.php">Login Now</a></p>
                        </div>
                    </div>
                </form>
				<?php if(isset($_POST['submit']))
                {
                $empid=$_POST['empid'];
                $email=$_POST['emailid'];
                $sql ="SELECT id FROM tblemployees WHERE EmailId=:email and EmpId=:empid";
                $query= $dbh -> prepare($sql);
                $query-> bindParam(':email', $email, PDO::PARAM_STR);
                $query-> bindParam(':empid', $empid, PDO::PARAM_STR);
                $query-> execute();
                $results=$query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount() > 0){
                foreach ($results as $result) {
                    $_SESSION['empid']=$result->id;
                } 
                    ?>

               
					<div class="login-form-body">
                        <form method="POST" name="updatepwd">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Enter New Password</label>
                            <input type="password" id="exampleInputEmail1" name="newpassword" required autocomplete="off">
                            <i class="ti-key"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Confirm Password</label>
                            <input type="password" id="exampleInputPassword1" name="confirmpassword" required autocomplete="off">
                            <i class="ti-key"></i>
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="submit-btn-area">
                            <button id="form_submit" name="change" type="submit">DONE <i class="ti-arrow-right"></i></button>
                        </div>
						</form>
                        <?php } else{ ?>
                            <?php echo "<script>alert('Sorry, Invalid Details.');</script>"; } } ?>
                    </div>
              
            </div>
            
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>