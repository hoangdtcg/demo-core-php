<?php
//$products = array(
//    ["id"=>"I1","name"=>"Iphone 12 Pro Max","category"=>"Điện thoại","price"=>"1500","desc"=>"Hang chat luong cao"],
//    ["id"=>"S2","name"=>"Samsung 10A","category"=>"Điện thoại","price"=>"1000","desc"=>"Hang cua han quoc"],
//    ["id"=>"O3","name"=>"OPPO MTP","category"=>"Điện thoại","price"=>"500","desc"=>"Hang tau"],
//);
include_once 'action.php';
$products = loadData();
$id = $_GET['id'];
$product;
$index = -1;
foreach ($products as $key=>$item){
    if($item['id'] == $id){
        $product = $item;
        $index = $key;
    }
}
?>
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
        <input type="text" name="id" placeholder="ID" value="<?php echo $product['id']?>">
        <input type="text" name="name" placeholder="Name" value="<?php echo $product['name']?>">
        <select name="category" value="<?php echo $product['category']?>">
            <option value="Điện thoại">Điện thoại</option>
            <option value="Máy tính<">Máy tính</option>
            <option value="Đồ gia dụng">Đồ gia dụng</option>
        </select>
        <input type="number" name="price" placeholder="Price" value="<?php echo $product['price']?>">
        <input type="text" name="desc" placeholder="Description" value="<?php echo $product['desc']?>">
        <button type="submit">Update</button>
        <button type="button"><a href="index.php">Cancel</a></button>
    </fieldset>
</form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];

    $products[$index] = array(
        "id"=>$id,
        "name"=>$name,
        "category"=>$category,
        "price"=>$price,
        "desc"=>$desc,
    );

    saveData($products);

    header('location:index.php');
}