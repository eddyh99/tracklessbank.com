<script>
function bcost() {
    var readcurrency = $("#currency_bcost").val();
    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/cost/getbcost?currency=" + readcurrency,
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $("#transfer_circuit_fxd").val(data.transfer_circuit_fxd)
            $("#transfer_circuit_pct").val(data.transfer_circuit_pct)
            $("#transfer_outside_fxd").val(data.transfer_outside_fxd)
            $("#transfer_outside_pct").val(data.transfer_outside_pct)
            $("#topup_circuit_fxd").val(data.topup_circuit_fxd)
            $("#topup_circuit_pct").val(data.topup_circuit_pct)
            $("#topup_outside_fxd").val(data.topup_outside_fxd)
            $("#topup_outside_pct").val(data.topup_outside_pct)
            $("#card_fxd").val(data.card_fxd)
            $("#card_ship_reg").val(data.card_ship_reg)
            $("#card_ship_fast").val(data.card_ship_fast)

            if ((readcurrency != "USD") &&
                (readcurrency != "EUR") &&
                (readcurrency != "AUD") &&
                (readcurrency != "NZD") &&
                (readcurrency != "CAD") &&
                (readcurrency != "HUF") &&
                (readcurrency != "SGD") &&
                (readcurrency != "TRY") &&
                (readcurrency != "GBP") &&
                (readcurrency != "RON")) {
                $("#topup_circuit_fxd_div").hide()
                $("#topup_circuit_pct_div").hide()
                $("#topup_outside_fxd_div").hide()
                $("#topup_outside_pct_div").hide()
                $("#transfer_outside_fxd_div").hide()
                $("#transfer_outside_pct_div").hide()
            }
            if ((readcurrency == "AUD") ||
                (readcurrency == "NZD") ||
                (readcurrency == "CAD") ||
                (readcurrency == "HUF") ||
                (readcurrency == "SGD") ||
                (readcurrency == "TRY") ||
                (readcurrency == "GBP") ||
                (readcurrency == "RON")) {
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
                if ((readcurrency == "GBP")) {
                    $("#topup_outside_fxd_div").show()
                    $("#topup_outside_pct_div").show()
                } else {
                    $("#topup_outside_fxd_div").hide()
                    $("#topup_outside_pct_div").hide()
                }
                $("#transfer_outside_fxd_div").hide()
                $("#transfer_outside_pct_div").hide()
            }
            if ((readcurrency == "USD") ||
                (readcurrency == "EUR") ||
                (readcurrency == "GBP")) {
                $("#topup_outside_fxd_div").show()
                $("#topup_outside_pct_div").show()
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
                $("#transfer_outside_fxd_div").show()
                $("#transfer_outside_pct_div").show()
            }
            
            if(readcurrency == "EUR"){
                $("#card_fxd_div").show()
                $("#card_ship_reg_div").show()
                $("#card_ship_fast_div").show()
            }else{
                $("#card_fxd_div").hide()
                $("#card_ship_reg_div").hide()
                $("#card_ship_fast_div").hide()
            }
        },
        error: function(response) {
            alert(response);
        }
    })
}

$("#currency_bcost").on("change", function() {
    bcost();
})

function dcost() {
    var readcurrency = $("#currency_dcost").val();
    if (!readcurrency) {
        document.getElementById("notifcurr").innerHTML = "Please select a Currency.";
    } else {
        document.getElementById("notifcurr").innerHTML = "";
    }

    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/cost/getdcost?currency=" + readcurrency,
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
            $("#walletbank_circuit_fxd").val(data.walletbank_circuit_fxd)
            $("#walletbank_circuit_pct").val(data.walletbank_circuit_pct)
            $("#walletbank_outside_fxd").val(data.walletbank_outside_fxd)
            $("#walletbank_outside_pct").val(data.walletbank_outside_pct)
            $("#wallet_sender_fxd").val(data.wallet_sender_fxd)
            $("#wallet_sender_pct").val(data.wallet_sender_pct)
            $("#wallet_receiver_fxd").val(data.wallet_receiver_fxd)
            $("#wallet_receiver_pct").val(data.wallet_receiver_pct)
            $("#topup_circuit_fxd").val(data.topup_circuit_fxd)
            $("#topup_circuit_pct").val(data.topup_circuit_pct)
            $("#topup_outside_fxd").val(data.topup_outside_fxd)
            $("#topup_outside_pct").val(data.topup_outside_pct)
            $("#swap").val(data.swap)
            $("#swap_fxd").val(data.swap_fxd)
            $("#card_fxd").val(data.card_fxd)
            $("#card_topup_fxd").val(data.card_topup_fxd)
            $("#card_ship_reg").val(data.card_ship_reg)
            $("#card_ship_fast").val(data.card_ship_fast)

            if ((readcurrency != "USD") &&
                (readcurrency != "EUR") &&
                (readcurrency != "AUD") &&
                (readcurrency != "NZD") &&
                (readcurrency != "CAD") &&
                (readcurrency != "HUF") &&
                (readcurrency != "SGD") &&
                (readcurrency != "TRY") &&
                (readcurrency != "GBP") &&
                (readcurrency != "RON")) {
                $("#topup_outside_fxd_div").hide()
                $("#topup_outside_pct_div").hide()
                $("#topup_circuit_fxd_div").hide()
                $("#topup_circuit_pct_div").hide()
                $("#walletbank_outside_fxd_div").hide()
                $("#walletbank_outside_pct_div").hide()
            }
            if ((readcurrency == "AUD") ||
                (readcurrency == "NZD") ||
                (readcurrency == "CAD") ||
                (readcurrency == "HUF") ||
                (readcurrency == "SGD") ||
                (readcurrency == "TRY") ||
                (readcurrency == "GBP") ||
                (readcurrency == "RON")) {
                $("#topup_outside_fxd_div").hide()
                $("#topup_outside_pct_div").hide()
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
                $("#walletbank_outside_fxd_div").hide()
                $("#walletbank_outside_pct_div").hide()
            }
            if ((readcurrency == "USD") ||
                (readcurrency == "EUR") ||
                (readcurrency == "GBP")) {
                $("#topup_outside_fxd_div").show()
                $("#topup_outside_pct_div").show()
                $("#topup_circuit_fxd_div").show()
                $("#topup_circuit_pct_div").show()
                $("#walletbank_outside_fxd_div").show()
                $("#walletbank_outside_pct_div").show()
            }
            if(readcurrency == "EUR"){
                $("#card_fxd_div").show()
                $("#card_topup_fxd_div").show()
                $("#card_ship_reg_div").show()
                $("#card_ship_fast_div").show()
            }else{
                $("#card_fxd_div").hide()
                $("#card_topup_fxd_div").hide()
                $("#card_ship_reg_div").hide()
                $("#card_ship_fast_div").hide()
            }

        },
        error: function(response) {
            console.log(response);
        }
    })
}

$("#currency_dcost").on("change", function() {
    dcost();
})

function validate() {
    $("#btnconfirm").attr("disabled", true);
}
</script>