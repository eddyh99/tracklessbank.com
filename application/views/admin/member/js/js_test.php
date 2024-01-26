<style>
table.dataTable tr th.select-checkbox::before {
    content: '';
    margin-top: -6px;
    margin-left: -6px;
    border: 1px solid #00dd9c;
    border-radius: 3px;
}

table.dataTable tr th.select-checkbox.selected::after {
    content: "✔";
    margin-top: -11px;
    margin-left: -4px;
    text-align: center;
    text-shadow: rgb(176, 190, 217) 1px 1px, rgb(176, 190, 217) -1px -1px, rgb(176, 190, 217) 1px -1px, rgb(176, 190, 217) -1px 1px;
}

</style>
<link href="https://cdn.datatables.net/select/1.2.1/css/select.dataTables.min.css" rel="stylesheet" />
<script src="https://cdn.datatables.net/select/1.2.1/js/dataTables.select.min.js"></script>
<script>
let example = $('#membernew').DataTable({
    columnDefs: [{
        orderable: false,
        className: 'select-checkbox',
        targets: 0
    }],
    select: {
        style: 'os',
        selector: 'td:first-child'
    },
    order: [
        [1, 'asc']
    ]
});
example.on("click", "th.select-checkbox", function() {
    if ($("th.select-checkbox").hasClass("selected")) {
        example.rows().deselect();
        $("th.select-checkbox").removeClass("selected");
    } else {
        example.rows().select();
        $("th.select-checkbox").addClass("selected");
    }
}).on("select deselect", function() {
    ("Some selection or deselection going on")
    if (example.rows({
            selected: true
        }).count() !== example.rows().count()) {
        $("th.select-checkbox").removeClass("selected");
    } else {
        $("th.select-checkbox").addClass("selected");
    }
});

</script>