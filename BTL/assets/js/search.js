document.addEventListener("DOMContentLoaded", function () {
    // Gọi hàm search khi trang đã tải xong
    search();

    // Lắng nghe sự kiện input trên trường nhập
    document
        .querySelector("#search_food")
        .addEventListener("input", () => search());
});

function search() {
    var search_food = document.querySelector("#search_food").value;

    // Sử dụng Fetch API
    fetch("CRUD/list.php", {
        method: "POST",
        headers: {
            // Định dạng dữ liệu
            "Content-Type": "application/x-www-form-urlencoded",
        },
        // dữ liệu gửi đi
        body: "search_food=" + search_food,
    })
        .then((response) => response.text())
        // kết quả được gán vào id mà không cần tải lại trang
        .then(
            (data) => document.querySelector("#search_results").innerHTML = data
        );
}
