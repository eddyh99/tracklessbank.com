<script>
$(function() {
    $("#tocurrency").html($('option:selected', this).attr("data-currency"))
})

function calculate() {
    if ($("#amount").val() > 0) {
        $.ajax({
            url: "<?= base_url() ?>admin/swap/swapcalculate",
            method: "post",
            data: $("#swapconfirm").serialize(),
            success: function(response) {
                var data = JSON.parse(response);
                $("#receive").val(data.receive);
                $("#amountget").val(data.receive);
                $("#quoteid").val(data.quoteid);
                $("#token").val(data.token);
            },
            error: function(xhr, status, error) {
                var data = JSON.parse(xhr.responseText);
                $("#amountget").val("0.00");
                $("#token").val(data.token);
                alert(data.message);
            }
        });
    }
}

$("#amount").on("blur", function(e) {
    e.preventDefault;
    calculate();
})

$("#toswap").on("change", function(e) {
    e.preventDefault;
    $("#tocurrency").html($('option:selected', this).attr("data-currency"))
    calculate();
});
</script>