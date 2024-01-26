<script>
// History member
var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
];

var currentMonth = moment().month();
var currentYear = moment().year();

var start = moment().subtract(29, 'days'); // Subtract 29 days from today
var end = moment(); // Today

var dateRange = {};
dateRange["Today"] = [moment(), moment()];
dateRange["Yesterday"] = [moment().subtract(1, 'days'), moment()];
dateRange["Last 7 Days"] = [moment().subtract(7, 'days'), moment()];
dateRange["Last 30 Days"] = [moment().subtract(29, 'days'), moment()];

$('#tgl').daterangepicker({
    startDate: end,
    endDate: end,
    ranges: dateRange,
    minDate: moment().subtract(365, 'days'),
    maxDate: moment(),
    locale: {
        format: 'MM/DD/YYYY'
    }
});

var tblhistory =
    $('#tbl_history_member').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/member/get_history_user/<?= $user_id ?>",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val();
                d.tgl = $("#tgl").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                return data["history"];
            },
        },
        order: [
            [5, 'DESC']
        ],
        "pageLength": 100,
        "columnDefs": [{
                "width": "12%",
                "targets": 1
            },
            {
                "width": "12%",
                "targets": 2
            },
            {
                "width": "12%",
                "targets": 3
            },
            {
                "width": "12%",
                "targets": 4
            },
        ],
        "columns": [{
                "data": "ket"
            },
            {
                "data": "debit",
                "render": $.fn.dataTable.render.number(',', '.', 4, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "credit",
                "render": $.fn.dataTable.render.number(',', '.', 4, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "fee",
                "render": $.fn.dataTable.render.number(',', '.', 4, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "balance",
                "render": $.fn.dataTable.render.number(',', '.', 4, '<?= $_SESSION['symbol']?> ')
            },
            {
                "data": "date_created"
            },
        ]
    });

$('#tgl').on("change", function(e) {
    e.preventDefault();
    tblhistory.ajax.reload();
});
</script>