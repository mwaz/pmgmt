<?php
session_start();
if(isset($_SESSION['login']))
{
    unset($_SESSION['login']);
}
if(isset($_SESSION['isAdmin']))
{
    unset($_SESSION['isAdmin']);
}
header("Location: index.php");

?>