<?php
function user_exists($User)
{
	$unames = decode_result(exec_sql("SELECT `Username` FROM `users`"));
	// ^ this is an array with n items. Each item is an associative array with one key 'username'
	$unames_arr = get_spec_key_values($unames, 'Username');
	return in_array($User, $unames_arr) ? true: false;

}


function id_exists($idNumber)
{
	$idNumbers = decode_result(exec_sql("SELECT `idNumber` FROM `users`"));
	// ^ this is an array with n items. Each item is an associative array with one key 'id Number'
	$idNumbers_arr = get_spec_key_values($idNumbers, 'idNumber');
	return in_array($idNumber, $idNumbers_arr) ? true: false;

}

 function email_exists($email)
 {
 	$emails = decode_result(exec_sql("SELECT `Email` FROM `users`"));
 	 	// ^ this is an array with n items. Each item is an associative array with one key 'Email'
  $emails_arr = get_spec_key_values($email, 'Email');
 	return in_array($email, $emails_arr) ? true: false;
 }


 

function get_spec_key_values($array, $key)
{
    $new_arr = [];

    foreach($array as $x)
    {
        $new_arr[] = $x[$key];
    }
    return $new_arr;
}

function checkUser()
{
    session_start();
    if (!isset($_SESSION['login']))
    {
        header("Location: 404.php");
    }
   
}
function checkAdmin()
{
    //session_start();
    if (!isset($_SESSION['isAdmin']))
    {
        header("Location: 500.php");
    }
   
}
function checkUserPublic()
{
    session_start();
    if (!isset($_SESSION['user']))
    {
        header("Location: 500.php");
    }
   
}

function getUserId()
{
    $username = $_SESSION['login'];
    $user_id = decode_result(exec_sql("SELECT `user_id` FROM `users` WHERE `username`='$username'"))[0]['user_id'];
    return  $user_id;
}

?>
