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
        document.querySelector("#error").innerHTML = "You must fill in all information";
        return false;
    }

    // Yêu cầu: Số điện thoại phải có ít nhất 10 số
    if (phoneNumber.length < 10) {
        document.querySelector("#error").innerHTML = "The phone number must have at least 10 digits";
        return false;
    }


    // Yêu cầu: Email phải chứa @
    if (email.indexOf("@") === -1) {
        document.querySelector("#error").innerHTML = "Email must contain the @ character";
        return false;
    }

    var userInput = confirm("Confirm the information entered");

    if (userInput) {
        // Thực hiện xác nhận thông tin thành công
        alert("Order Success!");
        // Gửi dữ liệu đi
        document.querySelector("form").submit();
    } else {
        // Người dùng đã hủy bỏ
        return false;
    }
}
