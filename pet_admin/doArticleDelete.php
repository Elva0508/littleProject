<?php

if(!isset($_GET["id"])){
   die("無法作業"); 
}
require_once("db_connect.php");

$id=$_GET["id"];

$sql="UPDATE article SET valid = 0 WHERE id = '$id'";

if ($conn->query($sql) === TRUE) {

    header("location: article-list.php");

} else {
    echo "刪除文章錯誤: " . $conn->error;
}

