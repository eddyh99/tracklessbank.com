<script>
// function enablecurrency(cur, status) {
//     $.get("<?= base_url() ?>m3rc4n73/currency/setCurrency?currency=" + cur + "&status=" + status, function(data) {
//         var data = JSON.parse(data);
//         console.log(data);
//         if (data.error == 'failed') {
//             alert(data.message + ' ' + cur + ' ' + status);
//             $("#" + cur).prop('checked', true);
//         }
//     });
// }

$.ajax({
    url: "<?= base_url() ?>m3rc4n73/currency/getcurrency",
    dataType: 'json',
    success: function(result) {
        $("#list_currency").html(result.message);
        // console.log(result.message);
    }
});

function enablecurrency(cur, status) {
    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/currency/setCurrency?currency=" + cur + "&status=" + status,
        success: function(response) {
            var data = JSON.parse(response);
            console.log(response);
            $.ajax({
                url: "<?= base_url() ?>m3rc4n73/currency/getcurrency",
                dataType: 'json',
                success: function(result) {
                    $("#list_currency").html(result.message);
                    // console.log(result.message);
                }
            });
        }
    })
}
</script>