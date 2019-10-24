<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$callback = $_GET['callback'];
$result = tyCnt($conn);
mysqli_close($conn);
echo $callback.'('.json_encode($result).')';