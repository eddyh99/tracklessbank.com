<script>
function wcost() {
    var readcurrency = $("#currency_wcost").val();
    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/cost/getwcost?currency=" + readcurrency,
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $("#circuit").val(data.circuit)
            $("#outside").val(data.outside)
        },
        error: function(response) {
            alert(response);
        }
    })
}

$("#currency_wcost").on("change", function() {
    wcost();
})

function dcost() {
    var readcurrency = $("#currency_dcost").val();
    var readbank = $("#bank_dcost").val();
    if (!readcurrency) {
        document.getElementById("notifcurr").innerHTML = "Please select a Currency.";
    } else {
        document.getElementById("notifcurr").innerHTML = "";
    }
    if (!readbank) {
        document.getElementById("notifbank").innerHTML = "Please select a Bank.";
    } else {
        document.getElementById("notifbank").innerHTML = "";
    }

    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/cost/getdcost?currency=" + readcurrency + "&bank=" + readbank,
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $("#topup").val(data.topup)
            $("#wallet_sender").val(data.wallet_sender)
            $("#wallet_receiver").val(data.wallet_receiver)
            $("#walletbank_circuit").val(data.walletbank_circuit)
            $("#walletbank_outside").val(data.walletbank_outside)
            $("#swap").val(data.swap)

        },
        error: function(response) {
            alert(response);
        }
    })
}

$("#currency_dcost").on("change", function() {
    dcost();
})
$("#bank_dcost").on("change", function() {
    dcost();
})
</script>