<!doctype html>
<html lang="en">

<head>
    <title>新增商品</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>新增商品</h1>
        <?php echo date('Y-m-d H:i:s') ?>
        <form class="row g-3" action="doProductCreate.php" method="post">
            <div class="col-12">
                <label for="inputName" class="form-label">商品名稱</label>
                <input type="text" class="form-control" placeholder="" name="product_name">
            </div>

            <div class="col-md-6">
                <label for="inputCategory" class="form-label">分類</label>
                <select id="inputCategory" class="form-select" name="category_id">
                    <option selected>Choose...</option>
                    <option>1</option>
                    <option>2</option>
                </select>
            </div>

            <div class="col-md-6">
                <label for="inputsubCategory" class="form-label">類別</label>
                <select id="inputsubCategory" class="form-select" name="subcategory_id">
                    <option selected>Choose...</option>
                    <option>3</option>
                    <option>4</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="inputPrice" class="form-label">價錢</label>
                <input type="number" class="form-control" name="price">
            </div>
            <div class="col-md-4">
                <label for="inputSpecialoffer" class="form-label">售價</label>
                <input type="number" class="form-control" name="specialoffer">
            </div>
            <div class="col-md-4">
                <label for="inputQuantity" class="form-label">數量</label>
                <input type="number" class="form-control" name="quantity">
            </div>
            <div class="col-12">
                <label for="formFile" class="form-label">上傳圖片</label>
                <input class="form-control" type="file" name="image">
            </div>
            <div class="col-12">
                <label for="productDecsription" class="form-label">商品描述</label>
                <textarea class="form-control" rows="3" name="description"></textarea>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-info ">送出</button>
                <button type="reset" class="btn btn-danger">重設</button>
                <a class="btn btn-primary" href="product-list.php">回商品列表</a>


            </div>
        </form>
    </div>



</body>

</html>