<?php include('menu.php'); ?>

<?php 
    // ตรวจสอบว่ามีค่า id ที่ส่งมาหรือไม่
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        $sql3 = "SELECT * FROM toppings WHERE id='$id'";
        $res3 = mysqli_query($conn, $sql3);
        $row3 = mysqli_fetch_assoc($res3);
        // ตรวจสอบว่าข้อมูลถูกดึงมาหรือไม่

        if($row3) {
            $nametp = $row3['name'];
            $activetp = $row3['active'];
        } else {
            echo "Topping not found.";
            exit;
        }
    } else {
        echo "Topping ID not provided.";
        exit;
    }
?>

<div class='main-content'>
    <div class='wrapper'>
        <br>
        <h1>Update topping</h1>
        <br><br>

        <form action='' method='POST' enctype='multipart/form-data'>
            <table class='tbl-full'>
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo $nametp; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type='radio' name='active' value="Yes" <?php if($activetp == "Yes") echo "checked"; ?>>Yes
                        <input type='radio' name='active' value="No" <?php if($activetp == "No") echo "checked"; ?>>No
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
        $nametp = $_POST['name'];
        $activetp = $_POST['active'];

        // ทำการอัพเดทข้อมูลในฐานข้อมูล
        $sql4 = "UPDATE toppings SET
                    name = '$nametp',
                    active = '$activetp'
                    WHERE id = $id 
                ";
                
        $res4 = mysqli_query($conn, $sql4);
        if($res4){
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        } else {
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";
            header('location:'.SITEURL.'admin/manage-products.php');
        }
    }
?>


<?php include('footer.php'); ?>
