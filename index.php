<?php
ob_start();
session_start();
include('includes/db_config.php');
if(isset($_POST['submit'])){
$email=$_POST['email'];
$pass=$_POST['password'];
$query=mysql_query("select * from signup");

while($res=mysql_fetch_assoc($query)){
if($res['email']==$email && $res['password']==$pass){
if($res['email']=='admin@gmail.com'){
$_SESSION['userid']=$res['id'];
$_SESSION['username']=$res['name'];
header('location:admin.php');
}else{
$_SESSION['userid']=$res['id'];
$_SESSION['username']=$res['name'];
header('location:main.php');
}
}else{}

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Login Page 2 | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body style="background-image:url(img/airplane-generic.jpg)">

    <div class="container">

      <form class="login-form" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" placeholder="Email id" name="email" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <label class="checkbox">
                                <span class="pull-right"> <a href="forgot.php"> Forgot Password?</a></span>
            </label>
            <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" />
            <a href="signup.php" class="btn btn-info btn-lg btn-block">Signup</a>
        </div>
      </form>

    </div>


  </body>
</html>
