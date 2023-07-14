<?php

//待完成

$name

// if (isset($_GET["product_name"])) {
//     $product_name = $_GET["product_name"];
//     require_once("/db_connect.php");

//     $sql = "SELECT product_id, product_name, FROM products WHERE name LIKE '%$product_name%' ";
//     $result = $conn->query($sql);
//     $rows = $result->fetch_all(MYSQLI_ASSOC);
//     $user_count = $result->num_rows;
// } else {
//     $user_count = 0;
// }


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

    <style>
        th {
            white-space: nowrap;
        }

        .dash {

            text-align: center;
            align-items: center;
        }

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
        <h1>我的商品</h1>
        <form class="row g-3 p-2">
            <div class="col-12">
                <label for="inputname" class="form-label">商品名稱</label>
                <input type="text" class="form-control" id="inputname" placeholder="請輸入關鍵字">
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">分類</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">類別</label>
                <select id="inputCategory" class="form-select">
                    <option selected>Choose...</option>
                    <option>...</option>
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


        <!-- <?php echo date('Y-m-d H:i:s') ?> -->



        <div class="col-12 d-flex justify-content-between align-items-center">
            <?php
            $products_count = $result->num_rows;
            ?>
            共<?= $totalProduct ?> 件商品，第 <?= $page ?> 頁
            <a class="btn btn-primary m-2" href="create-product.php">新增商品</a>
        </div>

        <table class="table table-bordered">
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
                    <th>數量</th>
                    <th>已售出</th>
                    <th>created_at</th>
                    <th>updated_at</th>
                    <th>操作</th>
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
                                <img class="object-fit-cover" src="images/<?= $row["image"] ?>" alt="">
                            </figure>
                        </td>
                        <td><?= $row["product_name"] ?></td>
                        <!-- <td><?= $row["vendor_id"] ?></td> -->
                        <td><?= $row["parent_id"] ?></td>
                        <td><?= $row["category_id"] ?></td>
                        <!-- <td><?= $row["description"] ?></td> -->
                        <td><?= $row["price"] ?></td>
                        <td><?= $row["specialoffer"] ?></td>
                        <td><?= $row["quantity"] ?></td>
                        <td><?= $row["sold"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td>
                            <a href="product.php?product_id=<?= $row["product_id"] ?>" class="btn btn-success">詳細</a>
                            <a href="product-edit.php?product_id=<?= $row["product_id"] ?>" class="btn btn-info">調整</a>
                            <a class="btn btn-danger" href="">刪除</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <div class="col-12 d-flex justify-content-center align-items-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
                        <li class="page-item <?php
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