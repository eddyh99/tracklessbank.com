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


var i = 1;
var readbank = $("#bank").val();
var urlParams = new URLSearchParams(window.location.search);
var status = urlParams.get('status');
var tblhistory =
    $('#tbl_history').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/business/historybisnis",
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
                "data": "ucode"
            },
            {
                "data": "business_name",
            },
            {
                "mRender": function(data, type, full, meta) {
                     return "<a href='"+full.googlemap+"' target='_blank'>"+full.googlemap+"</a>";
                }
            },
            {
                "mRender": function(data, type, full, meta) {
                    if (full.is_approve=='yes'){
                        return "";
                    }else{
                        button="<a href='<?=base_url()?>m3rc4n73/business/approve/"+btoa(full.id)+"' class='btn btn-success btn-sm'>Approve</a>";
                        button=button+" <a href='<?=base_url()?>m3rc4n73/business/reject/"+btoa(full.id)+"' class='btn btn-danger btn-sm'>Reject</a>"
                        return button;
                    }
                }
            },
        ]
    });

</script>