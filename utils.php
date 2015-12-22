<?php
function user_exists($User)
{
	$usernames = decode_result(exec_sql("SELECT `Username` FROM `User`"));
	// ^ this is an array with n items. Each item is an associative array with one key 'username'
	$usernames_arr = get_spec_key_values($usernames, 'Username');
	return in_array($User, $usernames_arr) ? true: false;

}

function id_exists($idNumber)
{
	$idNumbers = decode_result(exec_sql("SELECT `idNumber` FROM `User`"));
	// ^ this is an array with n items. Each item is an associative array with one key 'id Number'
	$idNumbers_arr = get_spec_key_values($idNumbers, 'idNumber');
	return in_array($idNumber, $idNumbers_arr) ? true: false;

}

 function email_exists($email)
 {
 	$emails = decode_result(exec_sql("SELECT `Email` FROM `User`"));
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

?>
