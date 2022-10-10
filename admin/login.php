<?php
session_start();
error_reporting(0);



if(isset($_POST['login']))
  {
    $dbserver="localhost";
    $dbuser="root";
    $password="";
    $dbname="mpmsdb";

    $conn=mysqli_connect($dbserver,$dbuser,$password,$dbname);

    if($conn){
        // echo "Connected Successfully \r\n";
    }
    else{
        echo "\r\nDid not connect" .mysqli_connect_error();
    }

    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="SELECT * FROM tbladmin WHERE UserName='$username' AND Password='$password' ";

    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $_SESSION['mpmsaid']=$row['ID'];
      $_SESSION['login']=$_POST['username'];
      echo "<script>window.location.href = 'dashboard.php';</script>";
    }
    else {
      echo "<br />user or password may be wrong";
    }
}

?>
<!DOCTYPE html>
<html>

<head>

    <title>Packers N Movers Management System | Login Page</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
   <link href="assets/css/style.css" rel="stylesheet" />
      <link href="assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">

        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <strong style="color: white;font-size: 50px">MPMS</strong>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" name="login">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User Name" name="username" required="true" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" name="password" required="true">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <a href="../index.php">Back Home!!</a>
                                    </label>

<label style="padding-left: 95px">
    <a href="forgot-password.php">Forgot Password?</a></label>
                                </div>

                                <!-- Change this to a button or input when using this as a form -->

                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block" name="login" >
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
