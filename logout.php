<?php 
require_once 'include/initialize.php';
// Four steps to closing a session
// (i.e. logging out)

// 1. Find the session
@session_start();

// 2. Unset all the session variables
unset( $_SESSION['StudentID'] );
unset( $_SESSION['Fname'] );
unset( $_SESSION['Lname'] ); 
unset( $_SESSION['STUDUSERNAME'] );  
unset( $_SESSION['STUDPASS'] );  
 
 	
// 4. Destroy the session
// session_destroy();
redirect("index.php?logout=1");
?>