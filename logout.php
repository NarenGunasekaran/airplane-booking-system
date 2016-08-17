<?php
ob_start();
session_start();
if(isset($_SESSION['username'])!=''){
unset($_SESSION['username']);
unset($_SESSION['userid']);
header('Location:index.php');
}

?>
