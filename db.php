<?php

require "config.php";

function init_db()
{
    $db = @new mysqli(host, username, password, dbname);
    if ($db->connect_errno) {
        throw new Exception("Could not connect to database server! Quiting");
    } else {
        return $db;
    }
}

function exec_sql($sql)
{
    $db = init_db();
    $result = $db->query($sql);
    if ($db->errno) {
        throw new Exception("Query error! " . $db->error);
    } else {
        return $result;
    }
}

function decode_result($result)
{
    $data = [];
    foreach ($result as $row) {
        $data[] = $row;
    }
    return $data;
}

?>
