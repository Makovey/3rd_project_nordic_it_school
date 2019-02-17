<?php
    require_once('config.php');
    session_start();
    if( isset($_GET['product_id']) ){
        //Здесь мы будем добавлять товар в корзине
        $sql = "SELECT id, price FROM products WHERE id = {$_GET['product_id']}";
        $result = mysqli_query($link, $sql);

        $productInfo = mysqli_fetch_assoc($result);

        if( $productInfo ){
            if( !isset($_SESSION['basket']) ){
                $_SESSION['basket'] = [];    
            }

            $isFind = false;
            foreach( $_SESSION['basket'] as $index => $basketItem ){
                if( $basketItem['id'] == $productInfo['id'] ){
                    $_SESSION['basket'][$index]['count']++;
                    $isFind = true;
                    break;   
                }
            }
            if( !$isFind ){
                $_SESSION['basket'][] = [
                    'id'=> $productInfo['id'],
                    'price'=> $productInfo['price'],
                    'count'=> 1
                ];
            }

        }
    }

    //Получаем состояние корзины
   $output = [
    'count'=> 0,
    'price'=> 0
   ];

   if( !empty( $_SESSION['basket'] ) ){
       //Буду заполнять $output;
       foreach( $_SESSION['basket'] as $basketItem ){
            $output['count'] += $basketItem['count'];
            $output['price'] += $basketItem['count'] * $basketItem['price'];   
       }
   }

   echo json_encode( $output );
    


