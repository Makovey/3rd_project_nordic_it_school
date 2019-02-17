<?php 
    require_once('config.php');
    
    /*
        1. Сразу нужно предусмотреть отсуствие данных при передаче
    */
    $data = [
        'error'=>[],
        'productCards'=>[],
        'paginationInfo'=>[
            'nowPage'=> 1,
            'countPage'=> 1
        ]
    ];

    $limit_cards = 6;
    $page = 1;

    if( isset( $_GET['page'] ) ){
        $page = (int) $_GET['page'];    
    }

    $data['paginationInfo']['nowPage'] = $page;

    $num_start_show = $limit_cards * ($page-1);

    $sql_count_page = 'SELECT COUNT(id) as len FROM products';
    $result_count_page = mysqli_query($link, $sql_count_page);
    $count_products = (int) mysqli_fetch_assoc($result_count_page)['len'];
    $count_page = ceil($count_products / $limit_cards);
    $data['paginationInfo']['countPage'] = $count_page;

    $sql = "SELECT * FROM products limit {$num_start_show}, {$limit_cards}";
    $result = mysqli_query($link, $sql);

    while( $row = mysqli_fetch_assoc($result) ){
        $data['productCards'][] = $row;   
    }


    sleep(2);
    echo json_encode($data);
