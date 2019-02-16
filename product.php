<?php 
    $product_id = $_GET['id'];

    $link = mysqli_connect('localhost', 'root', '', '24092018_3project');
    mysqli_set_charset($link, 'utf8');
    $sql_product = "SELECT * FROM products WHERE id = {$product_id}";

    $result_product = mysqli_query($link, $sql_product);
    $result_product_info = mysqli_fetch_assoc($result_product);

    $sql_size_count = "SELECT * FROM products_size_counts 
                        WHERE product_id={$product_id}";

    $result_size_count = mysqli_query($link, $sql_size_count);

    $result_product_size_ar = [];
    while($row = mysqli_fetch_assoc($result_size_count)){
        $result_product_size_ar[] = $row;    
    }


    echo "<pre>";
    print_r($result_product_info);
    print_r($result_product_size_ar);
    echo "</pre>";

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

</body>
</html>