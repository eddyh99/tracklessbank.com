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
    $("#form_submit").submit();
}
</script>