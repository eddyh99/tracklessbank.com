<script>
$.ajax({
    url: "<?= base_url() ?>m3rc4n73/currency/getcurrency",
    dataType: 'json',
    success: function(result) {
        $("#list_currency").html(result.message);
    }
});

function enablecurrency(cur, status) {
    if (status == 'active') {
        var notif = 'are you sure to activate currency ' + cur + '?';
    } else {
        var notif = 'are you sure to deactivate currency ' + cur + '?';
    }
    var loading = document.getElementById("loadingProgress");
    if (confirm(notif)) {
        if (status == "active") {
            loading.classList.remove("collapse");
            $.ajax({
                url: "<?= base_url() ?>m3rc4n73/currency/setCurrency?currency=" + cur + "&status=" + status,
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(response);
                    $.ajax({
                        url: "<?= base_url() ?>m3rc4n73/cost/sendmail_proses?currency=" + cur,
                        dataType: 'json',
                        success: function(result) {
                            console.log(result);
                            window.location.href =
                                "<?= base_url() ?>m3rc4n73/cost/editbcost?currency=" + cur;
                        }
                    });
                }
            })
        } else {
            $.ajax({
                url: "<?= base_url() ?>m3rc4n73/currency/setCurrency?currency=" + cur + "&status=" + status,
                success: function(response) {
                    var data = JSON.parse(response);
                    console.log(response);
                    alert(data.message);
                    $.ajax({
                        url: "<?= base_url() ?>m3rc4n73/currency/getcurrency",
                        dataType: 'json',
                        success: function(result) {
                            $("#list_currency").html(result.message);
                        }
                    });

                }
            })
        }
    } else {
        $.ajax({
            url: "<?= base_url() ?>m3rc4n73/currency/getcurrency",
            dataType: 'json',
            success: function(result) {
                $("#list_currency").html(result.message);
            }
        });
    }
}
</script>