<?php
include_once 'action.php';
$products = loadData();
if($_SERVER['REQUEST_METHOD']=='GET'){
    $productSearch = [];
    $name = $_GET['search'];
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Product</title>
</head>
<body>
<h1>List Product</h1>
<br>
<a href="add-product.php">ADD NEW PRODUCT</a>
<form action="" method="get">
    <input type="text" name="search">
    <button type="submit">Search</button>
</form>
<br>
<br>
<table border="1px">
    <tr>
        <th>STT</th>
        <th>ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Description</th>
        <th colspan="2">Action</th>
    </tr>
    <?php if (empty($products)) { ?>
        <tr>
            <td colspan="8" style="text-align: center">No data</td>
        </tr>
    <?php } ?>

    <?php foreach ($products as $key => $product): ?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $product['id'] ?></td>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['category'] ?></td>
            <td><?php echo $product['price'] ?></td>
            <td><?php echo $product['desc'] ?></td>
            <td>
                <button><a href="edit-product.php?id=<?php echo $product['id'] ?>">Edit</a></button>
            </td>
            <td>
                <button><a href="delete.php?id=<?php echo $product['id'] ?>"
                           onclick="return confirm('Are you delete?')">Delete</a></button>
            </td>
        </tr>
    <?php endforeach; ?>

</table>
</body>
</html>
