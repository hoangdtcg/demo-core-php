<?php
function saveData($products){
    $dataJson = json_encode($products);
    file_put_contents('data.json',$dataJson);
}

function loadData(){
    $dataJson = file_get_contents('data.json');
    $products = json_decode($dataJson,true);
    return $products;
}