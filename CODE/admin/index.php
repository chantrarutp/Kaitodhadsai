<?php include('menu.php'); ?>


<div class='main-content'>
    <div class='wrapper'>
        <h2><?php echo date('Y-m-d'); ?> |<span id="real-time"></span></h2>
        <br>

        <script>
        // Function to update real-time
        function updateTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();

            // Formatting the time to HH:MM:SS format
            var formattedTime = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');

            // Displaying the formatted time in the 'real-time' span
            document.getElementById('real-time').innerText = ' ' + formattedTime;

            // Update the real-time every second
            setTimeout(updateTime, 1000);
        }

        // Initial call to updateTime function
        updateTime();
    </script>

        <div class='col-3'>
            <?php
                $sql = "SELECT * FROM products";
                $res = mysqli_query($conn, $sql);
                $sql2 = "SELECT * FROM products WHERE active='Yes'";
                $res2 = mysqli_query($conn, $sql2);
                $count = mysqli_num_rows($res);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?> /<?php echo $count; ?></h1><br>
            Chicken
        </div>

        <div class='col-3'>
            <?php
                $sql = "SELECT * FROM toppings";
                $res = mysqli_query($conn, $sql);
                $sql2 = "SELECT * FROM toppings WHERE active='Yes'";
                $res2 = mysqli_query($conn, $sql2);
                $count = mysqli_num_rows($res);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?> /<?php echo $count; ?></h1><br>
            Topping(s)
        </div>

        <div class='col-3'>
            <?php
                $sql = "SELECT * FROM addon";
                $res = mysqli_query($conn, $sql);
                $sql2 = "SELECT * FROM addon WHERE active='Yes'";
                $res2 = mysqli_query($conn, $sql2);
                $count = mysqli_num_rows($res);
                $count2 = mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2; ?> /<?php echo $count; ?></h1><br>
            Side dish(es)
        </div>

        <div class='col-3'>
            <?php
                $sql = "SELECT * FROM orders WHERE status != 'served'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1><br>
            Pending order(s)
        </div>

        <div class='col-3'>
            <?php
                $sql = "SELECT * FROM orders WHERE status = 'served'";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
            ?>
            <h1><?php echo $count; ?></h1><br>
            Total order(s)
        </div>

        <div class='col-3'>
            <?php
                $sql = "SELECT SUM(total) AS total FROM orders WHERE status = 'served'";
                $res = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($res);
                $total = 0 + $row['total'];
            ?>
            <h1>$ <?php echo $total; ?>.00</h1><br>
            Revenue generated 
        </div>

        <div class='clearfix'></div>

    </div>    
</div>

<?php include('footer.php'); ?>
