<script>
    readfee();
    function readfee(){
        var readcurrency=$("#currency").val();
        $.ajax({
            url: "<?=base_url()?>admin/cost/getcost?currency="+readcurrency,
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                $("#topup").val(data.topup)
                $("#walletbank_local").val(data.walletbank_local)
                $("#walletbank_inter").val(data.walletbank_inter)
                $("#wallet2wallet").val(data.wallet2wallet)
                $("#swap").val(data.swap)
            },
            error: function(response){
                alert(response);
            }
        })        
    }

    $("#currency").on("change",function(){
        readfee();
    })
</script>