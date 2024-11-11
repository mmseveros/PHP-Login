<?php session_start();
//check if current page is index or extra

$currentPage = basename($_SERVER['PHP_SELF']);
if(!in_array($currentPage, ['index.php', 'extra.php']))
{
    if($_SESSION['Active'] == false) {//redirects to login page
        header("location:login.php");
    }
} ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">

</html>
</head>