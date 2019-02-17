<?php
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $link = mysqli_connect('localhost', 'root', '', '24092018_3project');
    mysqli_set_charset($link, 'utf8');
    $sql_product = "SELECT * FROM products WHERE id = {$product_id}";

    $result_product = mysqli_query($link, $sql_product);
    $result_product_cart = mysqli_fetch_assoc($result_product);

    $sql_size_count = "SELECT * FROM products_size_counts WHERE product_id={$product_id}";

    $result_size_count = mysqli_query($link, $sql_size_count);

    while ($row = mysqli_fetch_assoc($result_size_count)) {
        $result_product_size_ar[] = $row;
    }

    if (isset($result_product_size_ar)) {
        $size = [];
        foreach ($result_product_size_ar as $value) {
            $size[] = $value['size'];
        }
        asort($size);
    }
} else {
    header('Location: /catalog.php ');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="product__cart">
    <img class="product__cart-img" src="<?= $result_product_cart['img_src'] ?>" alt="product_img">
    <p class="product__cart-title"><?= $result_product_cart['name'] ?></p>
    <p class="product__cart-sku"><?= $result_product_cart['sku'] ?></p>
    <p class="product__cart-price"><?= $result_product_cart['price'] ?></p>
    <p class="product__cart-desc"><?= $result_product_cart['description'] ?></p>
</div>
<div class="product__size">
    <p class="product__size-title">Размер</p>
    <div class="product__size-cont">
        <?php if (isset($size)): ?>
            <?php foreach ($size as $value): ?>
                <span class="product__size-val"><?= $value ?></span>
            <?php endforeach; ?>
        <?php else: ?>
            <span class="product__size-noval">К сожалению, на данный момент нет размеров, заходите позже</span>
        <?php endif; ?>
    </div>
</div>
</body>
</html>