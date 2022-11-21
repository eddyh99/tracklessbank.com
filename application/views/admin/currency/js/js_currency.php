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

function enablecurrency(cur, status) {
    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/currency/setCurrency?currency=" + cur + "&status=" + status,
        success: function(response) {
            console.log(response);
            var data = JSON.parse(response);
        },
        error: function(response) {
            alert(cur);
        }
    })
}
</script>