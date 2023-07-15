
<?php

if (!isset($_POST["product_name"])) {
    die("請依正常管道到此頁");
}

require_once("db_connect.php");

$product_id = $_POST["product_id"];

$product_name = $_POST["product_name"];
$category_id = $_POST["category_id"];
$subcategory_id = $_POST["subcategory_id"];
$description = $_POST["description"];
$price = $_POST["price"];
$specialoffer = $_POST["specialoffer"];
$quantity = $_POST["quantity"];
$image = $_POST["image"];
$sold = $_POST["sold"];
$updated_at=$_POST["updated_at"];

// 處理圖片檔名，可使用 mysqli_real_escape_string 函式或者準備陳述式來處理特殊字元
$image = mysqli_real_escape_string($conn, $image);
$updated_at = date('Y-m-d H:i:s');


// 假設 vendor_id 欄位為必填欄位，且存在有效的 vendor_id 值
$vendor_id = 80; // 假設 vendor_id 的值為 80
$updated_at = date('Y-m-d H:i:s');

$sql = "UPDATE products SET product_name='$product_name', category_id='$category_id', subcategory_id='$subcategory_id', price='$price', specialoffer='$specialoffer', quantity='$quantity', image='$image', vendor_id='$vendor_id', sold='$sold', updated_at='$updated_at' WHERE product_id='$product_id'";

if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION["update_success"] = true;
    header("Location: product.php?product_id=" . $product_id);
    exit();
} else {
    echo "更新資料錯誤: " . $conn->error;
}

$conn->close();
?>






