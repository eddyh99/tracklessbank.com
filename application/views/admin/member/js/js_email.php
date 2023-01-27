<style>
.select2-container .select2-search--inline .select2-search__field {
    vertical-align: top !important;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Summernote CSS - CDN Link -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<!-- //Summernote CSS - CDN Link -->

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>


<script>
$(document).ready(function() {
    $("#message").summernote({
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
        ],
        placeholder: 'Type Message...',
        tabsize: 2,
        height: 300
    });
    $('.dropdown-toggle').dropdown();
});

$(document).ready(function() {
    $('#tujuan').select2();
});

$("#all").on("click", function() {
    if ($(this).is(':checked')) {
        $("#tujuan").prop("disabled", true);
    } else {
        $("#tujuan").prop("disabled", false);
    }
});


function validate() {
    $("#btnconfirm").attr("disabled", true);
    $("#form_submit").submit();
}

listmember();

function listmember() {
    var readbank = $("#bank").val();
    $.ajax({
        url: "<?= base_url() ?>m3rc4n73/member/sendmail_listmember?bank=" + readbank,
        dataType: 'json',
        success: function(result) {
            $("#tujuan").html(result.message);
            console.log(result);
        }
    });
}

$('#bank').on("change", function() {
    listmember();
});
</script>