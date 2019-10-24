<?php
header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json; charset=utf-8');
require "./core/mysql_core.php";
$conn = mysqlConnect();
if(!$conn){
    die("mysql error!");
}
$str = $_POST['ty'];
$token = $_POST['token'];
$callback = $_GET['callback'];
$result = FALSE;
//if(customTok
//enProcess($conn, $token)){
    $result = tyInsert($conn, $str);
//}
mysqli_close($conn);
echo $callback.'('.json_encode($result).')';