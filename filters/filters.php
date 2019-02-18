<?php
    $link=mysqli_connect('localhost','root','','filters');
    mysqli_set_charset($link,'utf8');
    $sql="select*from products";
    $category_exist=$_POST['category']!='Не важно';
    $size_exist=$_POST['size']!='Не важно';
    $price_exist=$_POST['price']!='Не важно';
    if($category_exist)$sql.=" where category='{$_POST["category"]}'";
    if($category_exist&&$size_exist)$sql.=" and size{$_POST["size"]}7";
    elseif($size_exist)$sql.=" where size{$_POST["size"]}7";
    if(($category_exist||$size_exist)&&$price_exist)$sql.=" and price{$_POST["price"]}7";
    elseif($price_exist)$sql.=" where price{$_POST["price"]}7";
    $result=mysqli_query($link,$sql);
    while($products[]=mysqli_fetch_assoc($result)){}
    echo(json_encode($products));
?>