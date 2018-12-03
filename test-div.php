<?php

// include config file with database conection variables
include('config.php');
echo "(brought to you by... test-div.php!)  CLICK ME >>> ";
$sql = file_get_contents('sql/fp_test_query.sql');
$statement = $database->prepare($sql);
$statement->execute();
$query_response = $statement->fetchAll(PDO::FETCH_ASSOC);
$db_sample = $query_response[0];
VAR_DUMP($db_sample);
