<?php include("db_connect.php")?>
<?php
if(!isset($_GET["category"])){
    die("請依正常管道進入");
}

$id = $_GET["id"];

$sql = "DELETE FROM subcategory WHERE subcategory_id = $id";
$resultDelete = $conn->query($sql);
if($resultDelete){
    echo "資料刪除成功";
}else{
    echo "資料刪除失敗" .$conn->error;
}

$conn->close();