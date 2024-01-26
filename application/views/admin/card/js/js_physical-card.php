<script>
var i = 1;
var tblhistory =
    $('#tbl_history').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/card/showcard",
            "dataSrc": function(data) {
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
                "data": "ucode"
            },
            {
                "data": "lastdigit"
            },
            {
                "mRender": function(data, type, full, meta) {
                    return "<a href='<?=base_url()?>m3rc4n73/card/linkcard/"+btoa(full.id)+"' class='btn btn-success'>Proses</a>";
                }
            },
        ]
    });

$('#tgl').on("change", function(e) {
    i = 1;
    e.preventDefault();
    tblhistory.ajax.reload();
});

$("#bank").on("change", function() {
    i = 1;
    tblhistory.ajax.reload();
})
</script>