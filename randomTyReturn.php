<?php
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$str = false;
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$tyCnt = maxTyId($conn);
while ($str == false){
    $str = tySelectString($conn, mt_rand(1, $tyCnt));
}
echo $str;
mysqli_closse($conn);
exit(json_encode($str));