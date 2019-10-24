<?php
require "./config/mysql_config.php";

function mysqlConnect(){
    $conn = new mysqli(MYSQL_HOST, MYSQL_USER_NAME, MYSQL_PASSWORD);
    if (!$conn) {
        return false;
    }
    mysqli_query($conn, "set names utf8");
    mysqli_select_db($conn, MYSQL_DB_NAME);
    return $conn;
}

function tyCnt($conn){
    $sql = "SELECT count(*) FROM main";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_row($result);
    $rowcount = $rows[0];
    return $rowcount;
}

function maxTyId($conn){
    $sql = "select MAX(id) from main";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);;
    return $rows[0];
}

function tySelectString($conn, $tyNum){
    $sql = 'SELECT * FROM main where id = ' . "$tyNum";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows != 0){
        $row = $result->fetch_assoc();
        $view = $row['view'] + 1;
        $sql = "UPDATE main SET view = {$view} WHERE id = {$tyNum}";
        mysqli_query($conn, $sql);
        return $row['ty'];
    }
    return false;
}

function tyInsert($conn, $str){
    $sql = "INSERT INTO main(ty) VALUES('$str')";
    if ($conn->query($sql) === TRUE) {
        return TRUE;
    } else {
        echo "Error: " . $sql . "<br/>" . $conn->error;
        return FALSE;
    }
}

function customTokenProcess($conn, $token){
    $sql = 'SELECT text FROM token where num = ' . "$token";
    if ($conn->query($sql) == TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}