document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("button").onclick = kiemTra;
});

function kiemTra() {
    let fullName = document.querySelector("#fullName").value;
    let phoneNumber = document.querySelector("#phoneNumber").value;
    let email = document.querySelector("#email").value;
    let address = document.querySelector("#address").value;

    // Yêu cầu: Nhập đủ thông tin
    if (
        fullName === "" ||
        phoneNumber === "" ||
        address === "" ||
        email === ""
    ) {
        document.querySelector("#error").innerHTML = "Bạn phải điền đủ thông tin";
        return false;
    }

    // Yêu cầu: Số điện thoại phải có ít nhất 10 số
    if (phoneNumber.length < 10) {
        document.querySelector("#error").innerHTML = "Số điện thoại phải có ít nhất 10 số";
        return false;
    }


    // Yêu cầu: Email phải chứa @
    if (email.indexOf("@") === -1) {
        document.querySelector("#error").innerHTML = "Email phải chứa ký tự @";
        return false;
    }

    var userInput = confirm("Xác nhận thông tin đã nhập");

    if (userInput) {
        // Thực hiện xác nhận thông tin thành công
        alert("Đặt hàng thành công!");
        // Gửi dữ liệu đi
        document.querySelector("form").submit();
    } else {
        // Người dùng đã hủy bỏ
        return false;
    }
}
