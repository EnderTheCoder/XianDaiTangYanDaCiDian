<?php
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$result = tyCnt($conn);
exit(json_encode($result));