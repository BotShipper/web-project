<?php
require_once "../../config/connect.php";
session_start();

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $sql_category = 'SELECT * FROM category';
    $result_category = $conn->query($sql_category);

    $sql_food = "SELECT * FROM food WHERE food_id = $food_id";
    $result_food = $conn->query($sql_food);
    $row_food = $result_food->fetch_assoc();
}

if (isset($_POST['sbm'])) {
    if ($_FILES['food_img']['name'] == '') {
        $food_img = $row_food['food_img'];
    } else {
        $food_img = $_FILES['food_img']['name'];
    }

    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_description = $_POST['food_description'];
    $category_id = $_POST['category_id'];

    $sql_update = "UPDATE food SET food_img = '$food_img', food_name = '$food_name', food_price = '$food_price', food_description = '$food_description', category_id = '$category_id' WHERE food_id = '$food_id'";
    $result_update = $conn->query($sql_update);

    $conn->close();
    header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Sửa món ăn</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Ảnh món ăn</label><br>
                        <input type="file" name="food_img">
                    </div>

                    <div class="form-group">
                        <label for="">Tên món ăn</label>
                        <input type="text" name="food_name" class="form-control" value="<?php if (isset($_GET['food_id'])) {
                                                                                            echo $row_food['food_name'];
                                                                                        } ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="">Giá món ăn</label>
                        <input type="number" step="0.01" name="food_price" class="form-control" value="<?php if (isset($_GET['food_id'])) {
                                                                                                            echo $row_food['food_price'];
                                                                                                        } ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả món ăn</label>
                        <input type="text" name="food_description" class="form-control" value="<?php if (isset($_GET['food_id'])) {
                                                                                                    echo $row_food['food_description'];
                                                                                                }  ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="">Loại món ăn</label>
                        <select class="form-control" name="category_id">
                            <?php
                            if (isset($_GET['food_id'])) {
                                while ($row = $result_category->fetch_assoc()) {
                                    if ($row['category_id'] === $row_food['category_id']) { ?>
                                        <option value="<?php echo $row['category_id']; ?>" selected><?php echo $row['category_name']; ?></option>
                                    <?php continue;
                                    } ?>
                                    <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <?php
                    if (isset($_SESSION["account"])) { ?>
                        <button name="sbm" class="btn btn-success" type="submit">Sửa</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>