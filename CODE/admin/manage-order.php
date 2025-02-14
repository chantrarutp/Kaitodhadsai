<?php include('menu.php'); ?>

<div class='main-content'>
    <div class='wrapper'>
        <h2>Manage orders</h2>
        <br /><br />

        <table class='tbl-full'>
            <tr>
                <th>ID</th>
                <th>Product(S)</th>
                <th>Total</th>
                <th>Status</th>      
                <th>Confirm order</th>   
                <th>Serve</th>               
            </tr>

            <?php
                $sql = "SELECT * FROM orders";
                $res = mysqli_query($conn, $sql);

                $sn = 1;

                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        while($rows = mysqli_fetch_assoc($res)){
                            $id = $rows['id'];
                            $products = $rows['products'];
                            $total = $rows['total'];
                            $status = $rows['status'];
            ?>
            <tr>
                <th><?php echo $sn++; ?></th>
                <td><?php echo $products; ?></td>
                <th><?php echo $total; ?></th>
                <th>
                    <?php
                        if($status=="waiting") {
                            echo "<label style='color: gold;'>$status</label>";
                        } else if($status=="paid"){
                            echo "<label style='color: red;'>$status</label>";
                        } else if($status=="served"){
                            echo "<label style='color: green;'>$status</label>";
                        }
                    ?>
                </th>
                <th>
                    <!-- สร้างแบบฟอร์มในแต่ละแถวเพื่อส่ง ID ของคำสั่งซื้อไป -->
                    <form action='' method='POST'>
                        <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                        <input type='submit' name='submit1' value="Confirm" class="btn-sec">
                    </form>
                </th>
                <th>
                    <form action='' method='POST'>
                        <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                        <input type='submit' name='submit2' value="Serve" class="btn-sec">
                    </form>
                </th>
            </tr>
            <?php
                    }
                } else {
                    // ไม่มีข้อมูล
                }
            }
            ?>
        </table>

    </div>
</div>

<?php 

    // ตรวจสอบว่ามีการส่งข้อมูลแบบ POST หรือไม่
    if(isset($_POST['submit1'])){
        $order_id = $_POST['order_id'];

        // ทำการอัพเดทข้อมูลในฐานข้อมูล
        $sql3 = "UPDATE orders SET
                    status = 'paid'
                WHERE id = $order_id
                ";
                
        $res3 = mysqli_query($conn, $sql3);
        if($res3){
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";

        } else {
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";

        }
    }

    // ตรวจสอบว่ามีการส่งข้อมูลแบบ POST หรือไม่
    if(isset($_POST['submit2'])){
        $order_id = $_POST['order_id'];

        // ทำการอัพเดทข้อมูลในฐานข้อมูล
        $sql3 = "UPDATE orders SET
                    status = 'served'
                 WHERE id = $order_id
                ";
                
        $res3 = mysqli_query($conn, $sql3);
        if($res3){
            $_SESSION['update'] = "<div class='success'>Updated Successfully.</div>";

        } else {
            $_SESSION['update'] = "<div class='error'>Failed to Update.</div>";

        }
    }
?>

<?php include('footer.php'); ?>
