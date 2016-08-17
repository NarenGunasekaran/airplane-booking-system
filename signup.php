<?php
ob_start();
session_start();
include('includes/db_config.php');
if(isset($_POST['register'])){
$name=$_POST['uname'];
$email=$_POST['email'];
$cont=$_POST['mobile'];
$quest=$_POST['quest'];
$ans=strtolower($_POST['answer']);
$pass=$_POST['pass'];
$rpass=$_POST['repass'];
if($pass == $rpass){
$query="insert into signup(name,email,contact,question,answer,password) values('$name','$email','$cont','$quest','$ans','$pass')";
if(mysql_query($query)){
header('location:index.php');
}

}
}

if(isset($_REQUEST['cancel'])){
header('location:index.php');
}
?>
<html>
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

  <body style="background-image:url(img/airplane-wallpaper-11.jpg);">

    <div class="container">

      <form class="login-form" method="post" style="margin-top:20px;">        
        <div class="login-wrap">
            <h3 class="page-header"style="text-align:center">Registration</h3>
            <div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" placeholder="Username" name="uname"  id="uname" onBlur="nameValidate()" autofocus required>
            </div>
			<div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" placeholder="Email Id" name="email" id="email" onBlur="emailValidate()" autofocus required>
            </div>
			<div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" placeholder="contact" name="mobile" id="mobile" onBlur="phoneValidate()" autofocus required>
            </div>
			<div class="input-group">
              <span class="input-group-addon"></span>
              
			  <select name="quest" id="quest" class="form-control m-bot15" required>
			  <option value="">--Select question--</option>
              <option value="1">Your favourite food ?</option>
               <option value="2">Your favourite hero ?</option>
                <option value="3">Your favourite movie ?</option>
                 <option value="4">Your favourite porn star ?</option>
			  </select>
            </div>
			<div class="input-group">
              <span class="input-group-addon"></span>
              <input type="text" class="form-control" placeholder="Answer" name="answer" autofocus required>
             
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="pass" required>
            </div>
			 <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" class="form-control" placeholder="Retype Password" name="repass" required>
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="register">Register</button>
            </form>
           <a href="signup.php?cancel" class="btn btn-danger btn-xs btn-block" name="cancel">Cancel</a>
      
        </div>
      

    </div>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
function nameValidate(){
	
var name=document.getElementById('uname').value;

var nn=/^[a-zA-Z]+$/;
if(name!=''){
	if(!nn.test(name))
		{	
		alert('Invalid User Name');
		
			return false;
		}else{}
			
}

}
function emailValidate(){
var email=document.getElementById('email').value;
var nm= /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(email!=''){
				if(!nm.test(email))
		{	
		alert('Invalid Email');
			return false;
		}else{}
	}

}
function phoneValidate(){

var phone=document.getElementById('mobile').value;	
var nh=/^[0-9]{10}$/;

if(phone!=''){
	if(!nh.test(phone))
		{	
		alert('Invalid Phone number');
			return false;
		}else{}
}
}
</script>
    <!-- custom form validation script for this page-->
    <script src="js/form-validation-script.js"></script>

  </body>
</html>
