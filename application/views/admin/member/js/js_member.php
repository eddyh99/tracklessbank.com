<script>
$(function(){
    $('#member').DataTable({
        "scrollX": true,
        "responsive": true,
        "ajax": {
            "url": "<?=base_url()?>admin/member/get_all",
            "type": "POST",
            "data": {
                csrf_freedy: $("#token").val()
            },
            "dataSrc":function (data){
                $("#token").val(data["token"]);
                console.log(data["member"]);
				return data["member"];
			},
        },
        "aoColumnDefs": [{
			"aTargets": [5],
			"mData": "email",
			"mRender": function (data, type, full, meta){
			    var button='<a href="<?=base_url()?>admin/member/changepass/'+full.id+'" class="btn btn-secondary btn-sm">Change Password</a> ';
			    if (full.status=='active'){
			        button=button+'<a href="<?=base_url()?>admin/member/disabled/'+full.id+'" class="btn btn-danger btn-sm">Disable</a> ';
			    }else if (full.status=='new'){
			        button= '<a href="<?=base_url()?>admin/member/activate/'+full.id+'" class="btn btn-dark btn-sm">Activate</a> ';
			    }else if (full.status='disabled'){
			        button=button+'<a href="<?=base_url()?>admin/member/enabled/'+full.id+'" class="btn btn-warning btn-sm">Enable</a> ';
			    }
			    button=button+'<a href="<?=base_url()?>admin/member/memberfee/'+full.ucode+'/'+btoa(full.email)+'" class="btn btn-default btn-sm border">Change Fee</a> ';
			    button=button+'<a href="<?=base_url()?>admin/member/history/'+full.ucode+'" class="btn btn-piggy btn-sm">View History</a>';
				return button;
			}
		}],
        "columns": [
            { "data": "email" },
            { "data": "ucode" },
            { "data": "referral" },
            { "data": "status" },
            { "data": "last_login" },
        ]    
    });    
})
</script>