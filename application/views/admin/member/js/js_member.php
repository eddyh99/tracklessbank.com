<link href="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/css/dataTables.checkboxes.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/jquery-datatables-checkboxes@1.2.13/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.13.2/api/sum().js"></script>
<script>
var i = 1;

var tblactive =
    $('#memberactive').DataTable({
        "scrollX": true,
        "responsive": true,
        "drawCallback": function () {
          var api = this.api();
          var amount =api.column( 5 ).data().sum();
          console.log(amount);
          $("#userbalance").html(amount.toLocaleString('en'));
        },
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/member/get_all?status=active",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val(),
                    d.bank_id = $("#bank").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["member"]);
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [6],
            "mData": "email",
            "mRender": function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>m3rc4n73/member/history/' +
                    full
                    .id +
                    '" class="m-1 btn btn-success btn-sm">View History</a>';
                return button;
            }
        }],
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "lastdigit"
            },
            {
                "data": "balance",
                render: $.fn.dataTable.render.number(',', '.', 2, '<?= $_SESSION['symbol']?> ')
            },
        ],
    });


var tblactive2 =
    $('#memberactive2').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/member/get_all?status=active",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val(),
                    d.bank_id = $("#bank").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["member"]);
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [6],
            "mData": "email",
            "mRender": function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>m3rc4n73/member/changepass/' + full
                    .id +
                    '" class="m-1 btn btn-secondary btn-sm">Change Password</a> ';
                if (full.status == 'active') {
                    button = button +
                        '<a href="<?= base_url() ?>m3rc4n73/member/disabled/' +
                        full.id +
                        '" class="m-1 btn btn-danger btn-sm">Disable</a> ';
                } else if (full.status == 'new') {
                    button = '<a href="<?= base_url() ?>m3rc4n73/member/activate/' + full
                        .id +
                        '" class="m-1 btn btn-dark btn-sm">Activate</a> ';
                } else if (full.status = 'disabled') {
                    button = button + '<a href="<?= base_url() ?>m3rc4n73/member/enabled/' +
                        full.id +
                        '" class="m-1 btn btn-warning btn-sm">Enable</a> ';
                }
                return button;
            }
        }],
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "status"
            },
            {
                "data": "last_login"
            },
        ],
    });


var tbldisable =
    $('#memberdisabled2').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/member/get_all?status=disabled",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val(),
                    d.bank_id = $("#bank").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["member"]);
                return data["member"];
            },
        },
        order: [
            [0, 'asc']
        ],
        "pageLength": 100,
        "aoColumnDefs": [{
            "aTargets": [6],
            "mData": "email",
            "mRender": function(data, type, full, meta) {
                var button = '<a href="<?= base_url() ?>m3rc4n73/member/changepass/' + full
                    .id +
                    '" class="m-1 btn btn-secondary btn-sm">Change Password</a> ';
                if (full.status == 'active') {
                    button = button +
                        '<a href="<?= base_url() ?>m3rc4n73/member/disabled/' +
                        full.id +
                        '" class="m-1 btn btn-danger btn-sm">Disable</a> ';
                } else if (full.status == 'new') {
                    button = '<a href="<?= base_url() ?>m3rc4n73/member/activate/' + full
                        .id +
                        '" class="m-1 btn btn-dark btn-sm">Activate</a> ';
                } else if (full.status = 'disabled') {
                    button = button + '<a href="<?= base_url() ?>m3rc4n73/member/enabled/' +
                        full.id +
                        '" class="m-1 btn btn-warning btn-sm">Enable</a> ';
                }
                return button;
            }
        }],
        "columns": [{
                "mRender": function(data, type, full, meta) {
                    return i++;
                }
            },
            {
                "data": "email"
            },
            {
                "data": "ucode"
            },
            {
                "data": "referral"
            },
            {
                "data": "status"
            },
            {
                "data": "last_login"
            },
        ],
    });
    
    var tblnew = $('#membernew').DataTable({
        "pageLength": 100,
        "ajax": {
            "url": "<?= base_url() ?>m3rc4n73/member/get_all?status=new",
            "type": "POST",
            "data": function(d) {
                d.csrf_freedy = $("#token").val(),
                    d.bank_id = $("#bank").val()
            },
            "dataSrc": function(data) {
                $("#token").val(data["token"]);
                console.log(data["member"]);
                return data["member"];
            },
        },
        'columnDefs': [{
            'targets': 0,
            'data':"id",
            'checkboxes': {
               'selectRow': true
            }
        },
        {
            "targets": 1,
            "data"  : "email",
        },
        {
            "targets": 2,
            "data"  : "ucode",
        },
        {
            "targets": 3,
            "data"  : "referral",
        },
        {
            "targets": 4,
            "data"  : "status",
        },
        {
            "targets": 5,
            "data"  : "last_login",
        }],
        'select': {
         'style': 'multi'
        },
        'order': [[1, 'asc']]
   });
   
   // Handle form submission event 
   $('#frm-activate').on('submit', function(e){
      var form = this;
      
      var rows_selected = tblnew.column(0).checkboxes.selected();

      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         // Create a hidden element 
         $(form).append(
             $('<input>')
                .attr('type', 'hidden')
                .attr('name', 'id[]')
                .val(rowId)
         );
      });
   });   
   
$('#bank').on("change", function(e) {
    e.preventDefault();
    i = 1;
    tblactive.ajax.reload();
    tblactive2.ajax.reload();
    tbldisable.ajax.reload();
    tblnew.ajax.reload();
});
</script>