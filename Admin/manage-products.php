<?php include('menu.php'); ?>

<div class='main-content'>
    <div class='wrapper'>
        <h2>Manage products</h2>
        <br /><br />

        <?php 
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <h3 class='tbl-head'>Chicken</h3>
        <table class='tbl-full'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Active</th>
                <th>Stock</th>                    
            </tr>

            <?php
                $sql = "SELECT * FROM products";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $id = 1;
                        while($rows = mysqli_fetch_assoc($res)){
                            $id++;
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $price = $rows['price'];
                            $active = $rows['active'];
            ?>
            <tr>
                <th><?php echo $id; ?></th>
                <td><?php echo $name; ?></td>
                <th><?php echo $price; ?></th>
                <th><label style="color: <?php echo ($active == "Yes") ? "green" : "red"; ?>"><?php echo $active; ?></label></th>
                <th><a href='updateproduct.php?id=<?php echo $id; ?>' class='btn-primary'>Update</a></th>
            </tr>
            <?php
                    }
                } else {
                    // ไม่มีข้อมูล
                }
            }
            ?>
        </table>

        <br><br>
        <h3 class='text-center'>Toppings</h3>
        <table class='tbl-full'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Stock</th>                    
            </tr>

            <?php
                $sql = "SELECT * FROM toppings";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $id = 1;
                        while($rows = mysqli_fetch_assoc($res)){
                            $id++;
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $active = $rows['active'];
            ?>
            <tr>
                <th><?php echo $id; ?></th>
                <td><?php echo $name; ?></td>
                <th><label style="color: <?php echo ($active == "Yes") ? "green" : "red"; ?>"><?php echo $active; ?></label></th>
                <th><a href='updatetopping.php?id=<?php echo $id; ?>' class='btn-primary'>Update</a></th>
            </tr>
            <?php
                    }
                } else {
                    // ไม่มีข้อมูล
                }
            }
            ?>
        </table>

        <br><br>
        <h3 class='text-center'>Side dishes</h3>
        <table class='tbl-full'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Active</th>
                <th>Stock</th>                    
            </tr>

            <?php
                $sql = "SELECT * FROM addon";
                $res = mysqli_query($conn, $sql);

                if($res == TRUE){
                    $count = mysqli_num_rows($res);
                    if($count > 0){
                        $id = 1;
                        while($rows = mysqli_fetch_assoc($res)){
                            $id++;
                            $id = $rows['id'];
                            $name = $rows['name'];
                            $price = $rows['price'];
                            $active = $rows['active'];
            ?>
            <tr>
                <th><?php echo $id; ?></th>
                <td><?php echo $name; ?></td>
                <th><?php echo $price; ?></th>
                <th><label style="color: <?php echo ($active == "Yes") ? "green" : "red"; ?>"><?php echo $active; ?></label></th>
                <th><a href='updateaddon.php?id=<?php echo $id; ?>' class='btn-primary'>Update</a></th>
            </tr>
            <?php
                    }
                } else {
                    // ไม่มีข้อมูล
                }
            }
            ?>
        </table>
        <br><br>

    </div>
</div>

<?php include('footer.php'); ?>
