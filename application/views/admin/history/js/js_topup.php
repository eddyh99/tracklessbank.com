<script>
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
    $('#tbl_history').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>admin/transactions/historytopup",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val();
                d.tgl = $("#tgl").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["history"]);
                return data["history"];
            },
        },
        "columns": [{
                "data": "ket"
            },
            {
                "data": "amount"
            },
            {
                "data": "cost"
            },
            {
                "data": "referral"
            },
            {
                "data": "fee"
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