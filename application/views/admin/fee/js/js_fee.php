<script>
    readfee();
    function readfee(){
        var readcurrency=$("#currency").val();
        $("#editfee").prop("href","<?=base_url()?>admin/fee/editfee/"+readcurrency)

        $.ajax({
            url: "<?=base_url()?>admin/fee/getfee?currency="+readcurrency,
            success: function (response) {
                console.log(response);
                var data = JSON.parse(response);
                $("#topup").val(data.topup)
                $("#walletbank_local").val(data.walletbank_local)
                $("#walletbank_inter").val(data.walletbank_inter)
                $("#w2w_send").val(data.wallet2wallet_send)
                $("#w2w_receive").val(data.wallet2wallet_receive)
                $("#swap").val(data.swap)
                $("#referral_send").val(data.ref_send)
                $("#referral_receive").val(data.ref_receive)
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