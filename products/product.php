<?php
require_once("db_connect.php");

// if (!isset($_GET["product_id"])) {
//     die("資料不存在");
// }

$product_id = $_GET["product_id"];

$sql = "SELECT * FROM products WHERE product_id = '$product_id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
// var_dump($row);

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
        <h1>商品介紹</h1>
        <div class="py-2">
            <a class="btn btn-primary" href="product-list.php">回我的商品列表</a>
        </div>
        <table class="table table-bordered ">

            <tr>
                <td colspan="2">
                    <h3>第<?= $row["product_id"] ?>項商品</h3>
                </td>
            </tr>
            <tr>
                <th>商品圖片</th>
                <td>
                    <figure class="ratio ratio-1x1 ">
                        <img class="object-fit-cover" src="productimages/<?= $row["image"] ?>" alt="">
                    </figure>
                </td>
            </tr>
            <tr>
                <th>商品名稱</th>
                <td><?= $row["product_name"] ?></td>
            </tr>
            <tr>
                <th>分類</th>
                <td><?= $row["category_id"] ?></td>

            </tr>
            <tr>
                <th>類別</th>
                <td><?= $row["subcategory_id"] ?></td>
            </tr>
            <tr>
                <th>價錢</th>
                <td class="d-flex align-items-center"><span>$</span>
                    <?= $row["price"] ?></td>
            </tr>
            <tr>
                <th>售價</th>
                <td class="d-flex align-items-center"><span>$</span>
                    <?= $row["specialoffer"] ?></td>
            </tr>
            <tr>
                <th>庫存數量</th>
                <td><?= $row["quantity"] ?></td>
            </tr>
            <tr>
                <th>月銷售量</th>
                <td><?= $row["sold"] ?></td>
            </tr>
            <tr>
                <th>商品介紹</th>
                <td><?= $row["description"] ?></td>
            </tr>
            <tr>
                <th>建立時間</th>
                <td><?= $row["created_at"] ?></td>
            </tr>
            <tr>
                <th>上次更新時間</th>
                <td><?= $row["updated_at"] ?></td>
            </tr>
        </table>
        <div class=" py-2">
            <a class="btn btn-info" href="product-edit.php? product_id=<?= $row["product_id"] ?>">編輯</a>
            <a href="doProductDelete.php?product_id=<?= $row["product_id"] ?>" class="btn btn-danger ">刪除</a>
        </div>

    </div>









    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>