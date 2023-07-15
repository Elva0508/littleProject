<?php
session_start();

if (!isset($_GET["product_id"])) {
    die("資料不存在");
}

require_once("db_connect.php");

$product_id = $_GET["product_id"];

$sql = "SELECT * FROM products WHERE product_id='$product_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

if (isset($_SESSION["update_success"]) && $_SESSION["update_success"]) {
    // echo "更新成功！";
    unset($_SESSION["update_success"]);
}

$conn->close();
?>

<!doctype html>
<html lang="en">

<head>
    <title>product</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .ratio {
            width: 250px;
            height: 250px;
        }

        .object-fit-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>商品編輯</h1>
        <div class="py-2">
            <a class="btn btn-primary" href="product.php?product_id=<?= $row["product_id"] ?>">回我的商品</a>
        </div>
        <form action="doProductUpdate.php" method="post">
            <table class="table table-bordered ">
                <tr>
                    <td colspan="2">
                        <h3>第<?= $row["product_id"] ?>項商品</h3>
                        <input type="hidden" name="product_id" value="<?= $row["product_id"] ?>">
                    </td>
                </tr>
                <tr>
                    <th>商品圖片</th>
                    <td>
                        <figure class="ratio ratio-1x1 ">
                            <img class="object-fit-cover" src="productimages/<?= $row["image"] ?>" alt="">
                        </figure>
                        <input class="form-control " type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <th>商品名稱</th>
                    <td>
                        <input type="text" class="form-control" value="<?= $row["product_name"] ?>" name="product_name">
                    </td>
                </tr>
                <tr>
                    <th>分類</th>
                    <td><input type="text" class="form-control" value="<?= $row["category_id"] ?>" name="category_id"></td>
                </tr>
                <tr>
                    <th>類別</th>
                    <td><input type="text" class="form-control" value="<?= $row["subcategory_id"] ?>" name="subcategory_id"></td>
                </tr>
                <tr>
                    <th>價錢</th>
                    <td class="d-flex align-items-center"> <span>$</span>
                        <input type="text" class="form-control" value="<?= $row["price"] ?>" name="price">
                    </td>
                </tr>
                <tr>
                    <th>售價</th>
                    <td class="d-flex align-items-center"><span>$</span>
                        <input type="text" class="form-control" value="<?= $row["specialoffer"] ?>" name="specialoffer">
                    </td>
                </tr>
                <tr>
                    <th>庫存數量</th>
                    <td><input type="text" class="form-control" value="<?= $row["quantity"] ?>" name="quantity"></td>
                </tr>
                <tr>
                    <th>月銷售量</th>
                    <td><input type="text" class="form-control" value="<?= $row["sold"] ?>" name="sold"></td>
                </tr>
                <tr>
                    <th>商品介紹</th>
                    <td><input type="text" class="form-control" value="<?= $row["description"] ?>" name="description"></td>

                </tr>
                <tr>
                    <th>新增時間</th>
                    <td><?= $row["created_at"] ?></td>
                </tr>
                <tr>
                    <th>更新時間</th>
                    <td><?php echo date('Y-m-d H:i:s') ?></td>
                </tr>

            </table>
            <div class="py-2">
                <button class="btn btn-info" type="submit">儲存</button>
            </div>
        </form>
    </div>

    