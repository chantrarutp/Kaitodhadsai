<?php include('menu.php'); ?>

<?php 
    // ตรวจสอบว่ามีค่า id ที่ส่งมาหรือไม่
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        // ดึงข้อมูลสินค้าจากฐานข้อมูล
        $sql2 = "SELECT * FROM addon WHERE id='$id'";
        $res2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($res2);

        // ตรวจสอบว่าข้อมูลถูกดึงมาหรือไม่
        if($row2) {
            $name = $row2['name'];
            $price = $row2['price'];
            $active = $row2['active'];
        } else {
            echo "Product not found.";
            exit;
        }

    } else {
        echo "Product ID not provided.";
        exit;
    }
?>

<div class='main-content'>
    <div class='wrapper'>
        <br>
        <h1>Update product</h1>
        <br><br>

        <form action='' method='POST' enctype='multipart/form-data'>
            <table class='tbl-full'>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type='radio' name='active' value="Yes" <?php if($active == "Yes") echo "checked"; ?>>Yes
                        <input type='radio' name='active' value="No" <?php if($active == "No") echo "checked"; ?>>No
                    </td>
                </tr>
                <tr>
                    <td  colspan="2">
                        <input type='submit' name='submit' value="Update" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php 
    // ตรวจสอบว่ามีการส่งข้อมูลแบบ POST หรือไม่
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $price = $_POST['price'];
        $detell = $_POST['detell'];
        $active = $_POST['active'];

        // ทำการอัพเดทข้อมูลในฐานข้อมูล
        $sql3 = "UPDATE addon SET
                    name = '$name',
                    price = '$price',
                    active = '$active'
                    WHERE id = $id 
                ";
                
        $res3 = mysqli_query($conn, $sql3);
        if($res3){
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        }
    }
?>

<?php include('footer.php'); ?>
