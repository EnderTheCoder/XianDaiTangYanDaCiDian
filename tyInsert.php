<?php
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$str = $_POST['ty'];
$token = $_POST['token'];
$result = FALSE;
//if(customTokenProcess($conn, $token)){
    $result = tyInsert($conn, $str);
//}
exit(json_encode($result));