document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#add").onclick = add;
});

function add() {
    // Lấy giá trị từ thẻ có ID là "count"
    let count = document.querySelector("#count").innerHTML;

    // Sử dụng Fetch API để gửi giá trị đến tập tin PHP
    fetch("../php/add_to_cart.php?count=" + count)
        .then((response) => response.text())
        .then((data) => alert("Added dishes successfully"));
}
