$("#togglePassword").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#togglePassword1").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#togglePassword2").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#togglesaldo").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$("#btnuq").click(function () {
    var copyText = document.getElementById("uqcode");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

$("#btnref").click(function () {
    var copyText = document.getElementById("refcode");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

// COPY Receive Currency
$("#btnus1").click(function () {
    var copyText = document.getElementById("us1");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btnus2").click(function () {
    var copyText = document.getElementById("us2");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btnus3").click(function () {
    var copyText = document.getElementById("us3");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btnus4").click(function () {
    var copyText = document.getElementById("us4");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btnus5").click(function () {
    var copyText = document.getElementById("us5");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

$("#btninter1").click(function () {
    var copyText = document.getElementById("inter1");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btninter2").click(function () {
    var copyText = document.getElementById("inter2");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btninter3").click(function () {
    var copyText = document.getElementById("inter3");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btninter4").click(function () {
    var copyText = document.getElementById("inter4");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});
$("#btninter5").click(function () {
    var copyText = document.getElementById("inter5");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

$("#btn-copy-qr").click(function () {
    var copyText = document.getElementById("copy-qr");
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    navigator.clipboard.writeText(copyText.value);
});

// SALDO
var input = document.querySelector('#saldo'); // get the input element
input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
resizeInput.call(input); // immediately call the function

var input = document.querySelector('#uqcode'); // get the input element
input.addEventListener('input', resizeInput); // bind the "resizeInput" callback on "input" event
resizeInput.call(input); // immediately call the function

function resizeInput() {
    this.style.width = this.value.length + 1 + "ch";
}

/* SELECT OPTION JS
Reference: http://jsfiddle.net/BB3JK/47/
*/


