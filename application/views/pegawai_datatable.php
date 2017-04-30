<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		
				<link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url('') ?>assets/DataTables/css/dataTables.bootstrap.min.css">


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<h1 class="text-center">Hello World</h1>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
			<script src="<?php echo base_url(''); ?>/assets/datatables.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
 		<script type="text/javascript">
 			$(document).ready(function(){
 				$('#example').DataTable();
 			})
 		</script>

 		<div class="container">
 			<div class="table-responsive">
 			<table class="table table-hover" id="example">
 				<thead>
									<tr>
										<th>Nama</th>
										<th>Nip</th>
										<th>Tanggal Lahir</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
								<?php foreach ($pegawai_list as $key) { ?>
									<tr>
										<td><?php echo $key->nama ?></td>
										<td><?php echo $key->nip ?></td>
										<td><?php echo $key->tanggalLahir ?></td>
										<td>
											<a href="<?php echo site_url('jabatan/index/').$key->id ?>" type="button" class="btn btn-info">Jabatan</a>
											<a href="<?php echo site_url('anak/index/').$key->id ?>" type="button" class="btn btn-success">Anak</a>
											<a href="<?php echo site_url('pegawai/update/').$key->id ?>" class="btn btn-primary">Update</a>
											<a onclick="confirmDelete(<?php echo $key->id; ?>)" class="btn btn-danger">Delete</a>
										</td>
									</tr>
								<?php } ?>
								</tbody>
 			</table>
 		</div>
 		</div>
 		

	</body>
</html>