<script>
var i = 1;

var tblactive =
    $('#memberactive').DataTable({
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
                button = button + '<a href="<?= base_url() ?>m3rc4n73/member/history/' +
                    full
                    .ucode +
                    '" class="m-1 btn btn-piggy btn-sm">View History</a>';
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
    $('#memberdisabled').DataTable({
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
                button = button + '<a href="<?= base_url() ?>m3rc4n73/member/history/' +
                    full
                    .ucode +
                    '" class="m-1 btn btn-piggy btn-sm">View History</a>';
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


$('#bank').on("change", function(e) {
    e.preventDefault();
    i = 1;
    tblactive.ajax.reload();
    tbldisable.ajax.reload();
});
</script>