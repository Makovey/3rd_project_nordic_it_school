<?php 
    require_once("../config.php");

    $sql = "SELECT * FROM products";
    $result = mysqli_query($link, $sql);
    $template['products'] = [];

    while( $row = mysqli_fetch_assoc($result) ){
        $template['products'][] = $row;    
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

            <div class="row">
                <?php foreach( $template['products'] as $product ): ?>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?=$product['img_src']?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?=$product['name']?></h5>
                            <p class="card-text"><?=$product['description']?></p>
                            <a href="/admin/edit_product.php?id=<?=$product['id']?>" class="btn btn-primary">Редактировать</a>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
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