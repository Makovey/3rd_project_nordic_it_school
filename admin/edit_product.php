<?php 
    require_once("../config.php");

    if( !empty( $_POST ) ){

        $img_src = '';
        if( !empty($_FILES) ){

            $name = $_GET['id'].'_'.$_FILES['img_src']['name'];
            copy($_FILES['img_src']['tmp_name'], '../images/upload/'.$name);
            
            $img_src = "/images/upload/".$name;
            echo "<pre>";
            print_r( $_FILES );
            echo "</pre>";
        }

       
        $update_sql = "UPDATE products SET name='{$_POST['name']}', 
                price = {$_POST['price']},
                img_src = '{$img_src}',
                description = '{$_POST['description']}',
                sku = '{$_POST['sku']}'
         WHERE id = {$_GET['id']}
        ";

        echo $update_sql;

        $result = mysqli_query( $link, $update_sql );

    }

    if( isset( $_GET['id'] ) ){

        $sql = "SELECT * FROM products WHERE id = {$_GET['id']}";

        $result = mysqli_query($link, $sql);

        $template['product'] = mysqli_fetch_assoc($result);
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
                <h2>Изменение товара с id=<?=$template['product']['id']?></h2>
                <form enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="productName">Название</label>
                        <input type="text" name="name" value="<?=$template['product']['name']?>" class="form-control" id="productName" aria-describedby="emailHelp" placeholder="Название">
                    </div>
                    <div class="form-group">
                        <label for="productPrice">Цена</label>
                        <input type="text" name="price" value="<?=$template['product']['price']?>" class="form-control" id="productPrice" placeholder="Цена">
                    </div>
                    <div class="form-group">
                        <label for="productDescription">Описание</label>
                        <textarea class="form-control"  name='description' id="productDescription"><?=$template['product']['description']?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="productSku">Sku</label>
                        <input type="text" name="sku" value="<?=$template['product']['sku']?>" class="form-control" id="productSku" placeholder="Sku">
                    </div>
                    <div class="form-group">
                        <label for="productImgSrc">Загрузите фотографию</label>
                        <input type="file" name='img_src' class="form-control-file" id="productImgSrc">
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
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