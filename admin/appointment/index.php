<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	#button {
  /* Box in the button */
  display: block;
  width: 190px;
}

#button a {
  text-decoration: none;
  /* Remove the underline from the links. */
}

#button ul {
  list-style-type: none;
  /* Remove the bullets from the list */
}

#button .top {
  background-color: #DDD;
  /* The button background */
}

#button ul li.item {
  display: none;
  /* By default, do not display the items (which contains the links) */
}

#button ul:hover .item {
  /* When the user hovers over the button (or any of the links) */
  display: block;
}
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">List of Appointment Request</h3>
		<div class="card-tools">
		<div class="row gx-2 gx-lg-5 row-cols-1 row-cols-md-0 row-cols-xl-0 justify-content-center" id = 'sched-type-list'>
			<div id="button">
				<ul>
					<li class="btn btn-flat btn-primary"><span class="fas fa-plus"></span> Create New</li>
					<?php 
						$whereData = "";
						$categories = $conn->query("SELECT * FROM `schedule_type` where `status` = 1 order by `sched_type` asc ");
						while($row = $categories->fetch_assoc()):
							foreach($row as $k=> $v){
								$row[$k] = trim(stripslashes($v));
							}
							$row['description'] = strip_tags(stripslashes(html_entity_decode($row['description'])));
					?>
					<li class="item"><a href="javascript:void(0)" class="card sched-item" data-id="<?php echo $row['id'] ?>"  data-name="<?php echo $row['sched_type'] ?>"><?php echo $row['sched_type'] ?></a></li>
					<?php endwhile; ?>
					<center id="noResult" style="display:none"><b><i>No Result</i></b></center>
				</ul>
			</div>
	   	</div>
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-bordered table-hover table-striped">
				<colgroup>
					<col width="8%">
					<col width="10%">
					<col width="12%">
					<col width="25%">
					<col width="30%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr style="text-align:center;">
						<th>No.</th>
						<th>For</th>
						<th>Schedule</th>
						<th>Requested By</th>
						<th>Type for requested</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody style="text-align:center;">
					<?php 
					$i = 1;
						$qry = $conn->query("SELECT r.*, t.sched_type from `appointment_request` r inner join `schedule_type` t on r.sched_type_id = t.id order by FIELD(r.status,0,1,2) asc, unix_timestamp(r.`date_created`) asc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<td><?php echo $row['sched_type'] ?></td>
							<td><?php echo date("M d,Y",strtotime($row['schedule'])) ?></td>
							<td>
								<?php echo $row['fullname'] ?><br>
								<small><?php echo $row['contact'] ?></small> br
								<small class="truncate" title="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></small>
							</td>
							<td>
								<p class="m-0 truncate"><?php echo $row['remarks'] ?></p>
							</td>
							<td class="text-center">
								<?php if($row['status'] == 1): ?>
									<span class="badge badge-success">Confirmed</span>
								<?php elseif($row['status'] == 2): ?>
									<span class="badge badge-danger">Cancelled</span>
								<?php else: ?>
									<span class="badge badge-primary">Pending</span>
								<?php endif; ?>
							</td>
							<td align="center">
								 <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
				                  		Action
				                    <span class="sr-only">Toggle Dropdown</span>
				                  </button>
				                  <div class="dropdown-menu" role="menu">
				                    <a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
				                  </div>
							</td>
						</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.delete_data').click(function(){
			_conf("Are you sure to delete this Appointment Request permanently?","delete_appointment_request",[$(this).attr('data-id')])
		})
		$('.edit_data').click(function(){
			uni_modal("Manage Appointment Request","appointment/manage_appointment.php?id="+$(this).attr('data-id'),'mid-large')
		})
		$('.table th, .table td').addClass("py-1 px-1 align-middle");
		$('.table').dataTable();
	})
	function delete_appointment_request($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_appointment_request",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}
    $(function(){
        $('.sched-item').click(function(){
            var name = $(this).attr('data-name')
            var id = $(this).attr('data-id')
            uni_modal("Create an Appointment Request for "+name,"appointment/create_appointment.php?sched_type_id="+id,"mid-large")
        })
        $('#search').on('input',function(){
            var _txt = $(this).val().toLowerCase()
            $('#sched-type-list .item').each(function(){
                var _contain = $(this).text().toLowerCase().trim()
                if(_contain.includes(_txt) === true){
                    $(this).toggle(true)
                }else{
                    $(this).toggle(false)
                }
            })
            check_result()
        })
    })
    function check_result(){
        if($('#sched-type-list .item:visible').length <= 0){
            if($('#noResult:visible').length <= 0)
            $('#noResult').show('slow');
        }else{
            if($('#noResult:visible').length > 0)
            $('#noResult').hide('slow');
        }
    }
</script>