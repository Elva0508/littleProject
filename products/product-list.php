<?php
require_once("db_connect.php");


$page = $_GET["page"] ?? 1;
$type = $_GET["type"] ?? 1;

$sqlTotal = "SELECT product_id FROM products ";
$resultTotal = $conn->query($sqlTotal);
$totalProduct = $resultTotal->num_rows;

$perPage = 10;
$startItem = ($page - 1) * $perPage;

$totalPage = ceil($totalProduct / $perPage);

if ($type == 1) {
    $orderBy = "ORDER BY product_id ASC";
} elseif ($type == 2) {
    $orderBy = "ORDER BY product_id DESC";
} elseif ($type == 3) {
    $orderBy = "ORDER BY price ASC";
} elseif ($type == 4) {
    $orderBy = "ORDER BY price DESC";
} elseif ($type == 5) {
    $orderBy = "ORDER BY specialoffer ASC";
} elseif ($type == 6) {
    $orderBy = "ORDER BY specialoffer DESC";
} elseif ($type == 7) {
    $orderBy = "ORDER BY quantity ASC";
} elseif ($type == 8) {
    $orderBy = "ORDER BY quantity DESC";
} elseif ($type == 9) {
    $orderBy = "ORDER BY sold ASC";
} elseif ($type == 10) {
    $orderBy = "ORDER BY sold DESC";
} else {
    header("location: 404.php");
}

// $sql = "SELECT * FROM products WHERE product_id $orderBy  LIMIT $startItem,$perPage";
// $result = $conn->query($sql);

$sql = "SELECT products.*, category.category_name AS category_name, subcategory.subcategory_name AS subcategory_name
FROM products
JOIN category ON category.category_id = products.category_id
JOIN subcategory ON subcategory.subcategory_id = products.subcategory_id
WHERE products.product_id $orderBy
LIMIT $startItem, $perPage";

$result = $conn->query($sql);



?>

<!doctype html>
<html lang="en">

<head>
    <title>我的商品</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        th {
            white-space: nowrap;
        }

        .dash {

            text-align: center;
            align-items: center;
        }

        .ratio {
            width: 150px;
            height: 150px;
        }

        .object-fit-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        th,
        td {
            width: 5%;
            text-align: center;
        }
    </style>


</head>

<body>
    <div class="container">
        <h1>我的商品</h1>
        <form class="row g-3 p-2" action="search.php">

            <div class="col-12 mb-3 ">
                <label for="inputname" class="form-label">商品名稱</label>
                <input type="text" class="form-control" id="inputname" placeholder="請輸入關鍵字" name="product_name">
            </div>
            <hr>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">分類</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>

                    <option><?= $row["category_name"] ?></option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputsubCategory" class="form-label">類別</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    <option><?= $row["subcategory_name"] ?></option>
                </select>
            </div>


            <div class="col-md-6">
                <label for="inputprice" class="form-label">價錢篩選</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputprice" class="form-label">售價篩選</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="inputquantity" class="form-label">商品數量</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <label for="inputsold" class="form-label">售出數量</label>
                <div class="row col-md">
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="min" value="">
                    </div>

                    <div class="col-md dash">
                        ~
                    </div>

                    <div class="col-md-5">
                        <input type="number" class="form-control" name="max" value="">
                    </div>
                </div>
            </div>


            <div class="col-12">
                <button type="submit" class="btn btn-primary">搜尋</button>
                <button type="reset" class="btn  btn-outline-secondary">重設</button>
            </div>

        </form>
        <hr>


        <!-- <?php echo date('Y-m-d H:i:s') ?> -->

        <div class="col-12 d-flex justify-content-end align-items-center p-2">

            <div class=" p-2">
                <?php
                $products_count = $result->num_rows;
                ?>
                共<?= $totalProduct ?> 件商品，第 <?= $page ?> 頁

            </div>

            <div class="btn-group m-2">
                <a href="product-list.php?page=<?= $page ?>&type=1" class="btn btn btn-outline-secondary
                <?php if ($type == 1) echo "active"; ?>"><i class="fa-solid fa-arrow-up"></i>編號</a>

                <a href="product-list.php?page=<?= $page ?>&type=2" class="btn btn-outline-dark
                <?php if ($type == 2) echo "active"; ?>"><i class="fa-solid fa-arrow-down"></i>編號</a>
            </div>

            <div class="btn-group m-2">
                <a href="product-list.php?page=<?= $page ?>&type=3" class="btn btn btn-outline-secondary
                <?php if ($type == 3) echo "active"; ?>"><i class="fa-solid fa-arrow-up"></i>價錢</a>

                <a href="product-list.php?page=<?= $page ?>&type=4" class="btn btn-outline-dark
                <?php if ($type == 4) echo "active"; ?>"><i class="fa-solid fa-arrow-down"></i>價錢</a>
            </div>

            <div class="btn-group m-2">
                <a href="product-list.php?page=<?= $page ?>&type=5" class="btn btn btn-outline-secondary
                <?php if ($type == 5) echo "active"; ?>"><i class="fa-solid fa-arrow-up"></i>售價</a>

                <a href="product-list.php?page=<?= $page ?>&type=6" class="btn btn-outline-dark
                <?php if ($type == 6) echo "active"; ?>"><i class="fa-solid fa-arrow-down"></i>售價</a>
            </div>

            <div class="btn-group m-2">
                <a href="product-list.php?page=<?= $page ?>&type=7" class="btn btn btn-outline-secondary
                <?php if ($type == 7) echo "active"; ?>"><i class="fa-solid fa-arrow-up"></i>庫存數量</a>

                <a href="product-list.php?page=<?= $page ?>&type=8" class="btn btn-outline-dark
                <?php if ($type == 8) echo "active"; ?>"><i class="fa-solid fa-arrow-down"></i>庫存數量</a>
            </div>

            <div class="btn-group m-2">
                <a href="product-list.php?page=<?= $page ?>&type=9" class="btn btn btn-outline-secondary
                <?php if ($type == 9) echo "active"; ?>"><i class="fa-solid fa-arrow-up"></i>月銷售量</a>

                <a href="product-list.php?page=<?= $page ?>&type=10" class="btn btn-outline-dark
                <?php if ($type == 10) echo "active"; ?>"><i class="fa-solid fa-arrow-down"></i>月銷售量</a>
            </div>
            <a class="btn btn-primary m-2" href="create-product.php">新增商品</a>
        </div>


        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>圖片</th>
                    <th>商品名稱</th>
                    <!-- <th>廠商</th> -->
                    <th>分類</th>
                    <th>類別</th>
                    <!-- <th>描述</th> -->
                    <th>價錢</th>
                    <th>售價</th>
                    <th>庫存數量</th>
                    <th>月銷售量</th>
                    <th>建立時間</th>
                    <th>更新時間</th>
                    <th class="text-nowrap ">操作</th>
                    <!-- <th>created_at</th> -->
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row["product_id"] ?></td>
                        <td>
                            <!-- <?= $row["image"] ?> -->
                            <figure class="ratio ratio-1x1 ">
                                <img class="object-fit-cover" src="productimages/<?= $row["image"] ?>" alt="">
                            </figure>
                        </td>
                        <td><?= $row["product_name"] ?></td>
                        <!-- <td><?= $row["vendor_id"] ?></td> -->
                        <td><?= $row["category_name"] ?></td>
                        <td><?= $row["subcategory_name"] ?></td>
                        <!-- <td><?= $row["description"] ?></td> -->
                        <td>$<?= $row["price"] ?></td>
                        <td>$<?= $row["specialoffer"] ?></td>
                        <td><?= $row["quantity"] ?></td>
                        <td><?= $row["sold"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td>
                            <a href="product.php?product_id=<?= $row["product_id"] ?>" class="btn btn-success mt-2">詳細</a>
                            <a href="product-edit.php?product_id=<?= $row["product_id"] ?>" class="btn btn-info ">編輯</a>
                            <a href="doProductDelete.php?product_id=<?= $row["product_id"] ?>" class="btn btn-danger ">刪除</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center align-items-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                        <li class="page-item 
                        <?php
                        if ($i == $page) echo "active"; ?>"><a class="page-link " href="product-list.php?page=<?= $i ?>&type=<?= $type ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>


    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>