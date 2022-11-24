<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</script>

<style>
.select2-container .select2-search--inline .select2-search__field {
    vertical-align: top !important;
}
</style>
<script>
$(document).ready(function() {
    $("#yourid").summernote();
    $('.dropdown-toggle').dropdown();
    $('#message').summernote({
        placeholder: 'Type Message...',
        tabsize: 2,
        height: 300
    });
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
</script>