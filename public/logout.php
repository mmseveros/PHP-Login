<?php
//session_start(); //Start the session first
//session_destroy(); //Destroy started session
//header("location:login.php"); //Redirect to loggin page

require_once '../src/session.php';

use src\session;

$session = new session();
$session->forgetSession();
?>

