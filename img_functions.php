<?php

include 'db.php';
function updateDp($userid ,$name){
     $username = $_SESSION['login'];
    $img_query=" UPDATE  `users` set `profile_image`='$name' WHERE `username` = '$username'"  ;
    exec_sql($img_query);  


}
