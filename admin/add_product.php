<?php 
    if( !empty( $_POST ) ){
        require_once("../config.php");

        // echo "<pre>";
        // print_r( $_POST );
        // echo "</pre>";

        $sql = "INSERT INTO products (id, name, price, description, img_src, sku) 
            VALUE (NULL, '{$_POST['name']}', {$_POST['price']}, '{$_POST['description']}', 
            '{$_POST['img_src']}', '{$_POST['sku']}')
        ";

        $result = mysqli_query($link, $sql);

        if( $result ){
            // 
        }

        
    }

?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="/admin/css/style.css">
    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <h1>Админка</h1>
        <div class="row">
            <div class="col-3">
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#">Active</a>
                    <a class="nav-link" href="/admin/add_product.php">Добавить товар</a>
                    <a class="nav-link" href="#">Link</a>
                    <a class="nav-link disabled" href="#">Disabled</a>
                </nav>
            </div>
            <div class="col-9">
                <h2>Добавление товара</h2>
                <form method="POST">
                    <div class="form-group">
                        <label for="productName">Название</label>
                        <input type="text" name="name" class="form-control" id="productName" aria-describedby="emailHelp" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Цена</label>
                        <input type="text" name="price" class="form-control" id="productPrice" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Описание</label>
                        <textarea class="form-control" name='description' id="productDescription" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productSku">Sku</label>
                        <input type="text" name="sku" class="form-control" id="productSku" placeholder="Sku">
                    </div>
                    <div class="form-group">
                        <label for="productImgSrc">Загрузите фотографию</label>
                        <input type="file" name='img_src' class="form-control-file" id="productImgSrc">
                    </div>
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </form>
            </div>
        </div>
        
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>