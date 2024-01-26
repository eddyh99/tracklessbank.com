<script>

var i = 1;
var readbank = $("#bank").val();
var tblhistory =
    $('#tbl_history').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/business/categorybisnis",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val();
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["history"]);
                return data["history"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "category"
            },
            {
                "mRender": function(data, type, full, meta) {
                    var button="<a href='<?=base_url()?>m3rc4n73/business/business_category?cat="+btoa(full.id+'-'+full.category)+"' class='btn btn-success btn-sm'>Edit</a>";
                    return button;
                }
            },
        ]
    });

</script>