<?php
require_once "../../config/connect.php";
session_start();
?>
<table class="table text-center">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Describe</th>
            <th>Session</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($_POST["search_food"])) {
            $search_food = $_POST["search_food"];

            $sql_food = "SELECT * FROM food 
                    INNER JOIN category ON food.category_id = category.category_id
                    WHERE food_name LIKE '%$search_food%' OR food_id = '$search_food' OR category_name LIKE '%$search_food%'
                    ORDER BY food_id";
            $result_food = $conn->query($sql_food);
            if ($result_food->num_rows > 0) {
                while ($row = $result_food->fetch_assoc()) { ?>
                    <tr>
                        <td class="align-middle"><?php echo $row['food_id']; ?></td>
                        <td class="align-middle">
                            <img style="width: 100px;" src="../assets/imgs/<?php echo $row['food_img']; ?>">
                        </td>
                        <td class="align-middle"><?php echo $row['food_name']; ?></td>
                        <td class="align-middle"><?php echo $row['food_price']; ?></td>
                        <td class="align-middle"><?php echo $row['food_description']; ?></td>
                        <td class="align-middle"><?php echo $row['category_name']; ?></td>
                        <?php
                        if (isset($_SESSION["account"])) { ?>
                            <td class="align-middle">
                                <a href="CRUD/update.php?food_id=<?php echo $row['food_id']; ?>">Change</a>
                            </td>
                            <td class="align-middle">
                                <a onclick="return Del('<?php echo $row['food_name']; ?>')" href="CRUD/delete.php?food_id=<?php echo $row['food_id']; ?>">Delete</a>
                            </td>
                        <?php } else { ?>
                            <td class="align-middle">
                                <a href="../php/order.php?food_id=<?php echo $row['food_id']; ?>">Order</a>
                            </td>
                        <?php } ?>

                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="8"><?php echo "<b>There are no suitable dishes.</b>"; ?></td>
                </tr>
        <?php }
        }
        $conn->close();
        ?>
    </tbody>
</table>
<?php if (isset($_SESSION["account"])) { ?>
    <a class="btn btn-primary" href="CRUD/insert.php">Add dishes</a>
<?php }

?>