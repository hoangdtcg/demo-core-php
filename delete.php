<?php
include_once 'action.php';
$products = loadData();

$id = $_GET['id'];//duoc value cua id
$index = -1;

foreach ($products as $key=>$product){
    if($product['id'] == $id){
        $index = $key;
    }
}

array_splice($products,$index,1);
saveData($products);

header('location: index.php');