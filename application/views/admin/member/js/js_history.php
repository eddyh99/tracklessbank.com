<script>
var i = 1;
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
    minDate: moment().subtract(90, 'days'),
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
                console.log(data["history"].slice(1));
                return data["history"].slice(1);
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
            }, {
                "data": "ket"
            },
            {
                "data": "debit"
            },
            {
                "data": "credit"
            },
            {
                "data": "fee"
            },
            {
                "data": "cost"
            },
            {
                "data": "comission"
            },
            {
                "data": "balance"
            },
            {
                "data": "date_created"
            },
        ]
    });

$('#tgl').on("change", function(e) {
    i = 1;
    e.preventDefault();
    tblhistory.ajax.reload();
});
</script>