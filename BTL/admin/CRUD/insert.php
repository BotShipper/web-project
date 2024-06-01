<?php
require_once "../../config/connect.php";
session_start();

// Lấy ra loại đồ ăn (sáng, trưa, ...)
$sql_category = 'SELECT * FROM category';
$result_category = $conn->query($sql_category);

if (isset($_POST['sbm'])) {
    $food_img = $_FILES['food_img']['name'];
    $food_name = $_POST['food_name'];
    $food_price = $_POST['price'];
    $food_description = $_POST['food_description'];
    $category_id = $_POST['category_id'];

    $sql_insert = "INSERT INTO food (food_img, food_name, food_price, food_description, category_id)
        VALUES ('$food_img', '$food_name', '$food_price', '$food_description', $category_id)";
    $result_insert = $conn->query($sql_insert);

    header('location: ../index.php');
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Insert</title>
</head>

<body>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Thêm món ăn</h2>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Ảnh món ăn</label><br>
                        <input type="file" name="food_img">
                    </div>

                    <div class="form-group">
                        <label for="">Tên món ăn</label>
                        <input type="text" name="food_name" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Giá món ăn</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Mô tả món ăn</label>
                        <input type="text" name="food_description" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Loại món ăn</label>
                        <select class="form-control" name="category_id">
                            <?php
                            while ($row = $result_category->fetch_assoc()) { ?>
                                <option value="<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <?php
                    if (isset($_SESSION["account"])) { ?>
                        <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>