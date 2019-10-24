<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$str = false;
$maxSelectCnt = 0;
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$tyCnt = maxTyId($conn);
while ($str == false && $maxSelectCnt != 3){
    $str = tySelectString($conn, mt_rand(1, $tyCnt));
    $maxSelectCnt++;
}
//echo $str;
mysqli_close($conn);
$callback = $_GET['callback'];
echo $callback.'('.json_encode($str).')';