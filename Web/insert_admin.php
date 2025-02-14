<?php
include('../conncect/conncet.php');
if(isset($_POST) && !empty($_POST)){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $active = $_POST['active'];
    $sql = "INSERT INTO size (name, price, active)
            VALUES ('$name','$price','$active')";
    $query = mysqli_query($conn, $sql);
    if($query){
        echo 'insert success';
    }else{
        echo 'no insert';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
</head>
<body>

<h2>Admin</h2>
<form method="post" action="">
    <br>
    <label>name</label>
    <input type="text" name="name"><br>
    <label>price</label>
    <input type="text" name="price"><br>
    <label>active</label>
    <input type="text" name="active"><br>
    <input type="submit" value="save">
</form>
</body>
</html>
