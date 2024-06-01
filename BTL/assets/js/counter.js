document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#increase").onclick = increase;
    document.querySelector("#decrease").onclick = decrease;

});

let count = 1;

function increase() {
    count++;
    document.querySelector("#count").innerHTML = count;
}

function decrease() {
    if (count > 1) {
        count--;
        document.querySelector("#count").innerHTML = count;
    }
}
