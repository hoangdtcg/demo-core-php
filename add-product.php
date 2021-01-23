<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
<form action="" method="post">
    <fieldset>
        <legend>Add Product</legend>
        <input type="text" name="id" placeholder="ID">
        <input type="text" name="name" placeholder="Name">
        <select name="category">
            <option value="Điện thoại">Điện thoại</option>
            <option value="Máy tính<">Máy tính</option>
            <option value="Đồ gia dụng">Đồ gia dụng</option>
        </select>
        <input type="number" name="price" placeholder="Price">
        <input type="text" name="desc" placeholder="Description">
        <button type="submit">Add</button>
        <button type="button"><a href="index.php">Cancel</a></button>
    </fieldset>
</form>
</body>
</html>
<?php
    include_once 'action.php';
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $category = $_POST['category'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];

        $product = array(
            "id"=>$id,
            "name"=>$name,
            "category"=>$category,
            "price"=>$price,
            "desc"=>$desc,
        );

        $products = loadData();
        array_push($products,$product);
        saveData($products);

        header('location:index.php');
    }