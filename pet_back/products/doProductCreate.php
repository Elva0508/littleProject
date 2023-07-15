<?php

if (!isset($_POST["product_name"])) {
    die("請依正常管道到此頁");
}


require_once("db_connect.php");

$product_name = $_POST["product_name"];
$category_id = $_POST["category_id"];
$subcategory_id = $_POST["subcategory_id"];
$description = $_POST["description"];
$price = $_POST["price"];
$specialoffer = $_POST["specialoffer"];
$quantity = $_POST["quantity"];
$image = $_POST["image"];

// 處理圖片檔名，可使用 mysqli_real_escape_string 函式或者準備陳述式來處理特殊字元
$image = mysqli_real_escape_string($conn, $image);

// 假設 vendor_id 欄位為必填欄位，且存在有效的 vendor_id 值
$vendor_id = 80; // 假設 vendor_id 的值為 80
$sold = 0; // 假設 sold 的值為 0
$created_at = date('Y-m-d H:i:s'); //此為時間，必須設為時間格式
$updated_at = date('Y-m-d H:i:s');


$sql = "INSERT INTO products (product_name, category_id, subcategory_id, description, price, specialoffer, quantity, image, vendor_id, sold, created_at, updated_at) VALUES ('$product_name', '$category_id', '$subcategory_id','$description', '$price', '$specialoffer', '$quantity', '$image', '$vendor_id', '$sold', '$created_at', '$updated_at')";


// echo $sql;

if ($conn->query($sql) === TRUE) {
    $latestId = $conn->insert_id;
    echo "資料表 products 新增資料完成,id為$latestId";
    header("location: product-list.php");
} else {
    echo "新增資料錯誤: " . $conn->error;
}

$conn->close();
