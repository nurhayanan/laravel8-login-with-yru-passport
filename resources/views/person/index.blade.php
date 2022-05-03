@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> นักวิจัย/ผู้เชี่ยวชาญ
                </li>
            </ol>
        </nav>
    </div>

	<?php

	$url = "https://api1.yru.ac.th/profile/v1/users?include=journals,articles&paginate_false=true";

	$content = file_get_contents($url);
	$data = json_decode($content);
	?>
	<div class="container">


		<table id="example" class="table table-striped" style="width:100%">
			<thead>
				<tr>
					<th>ลำดับ</th>
					<th>ชื่อ</th>
					<th>อีเมล</th>
					<th>สังกัด</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=0; foreach ($data->data as $data) { $i++;  ?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><a href="{{route('person.show',$data->id)}}"><?php echo $data->special->name_1; ?></a></td>
						<td><?php echo $data->email; ?></td>
						<td><?php echo $data->department; ?></td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>ลำดับ</th>
					<th>Position</th>
					<th>อีเมล</th>
					<th>สังกัด</th>
				</tr>
			</tfoot>
		</table>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#example').DataTable();
		} );
	</script>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    @endsection
