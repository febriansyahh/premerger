<!DOCTYPE html>
<html>

<?php $this->load->view("_partials/head.php") ?>


<body>
	<style type="text/css">
		body {
			font-family: sans-serif;
		}

		table {
			margin: 20px auto;
			border-collapse: collapse;
		}

		table th,
		table td {
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}

		a {
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<center>
		<h1>DATA USULAN PENELITIAN</h1>
	</center>

	<table id="tablereport" class="table table-bordered table-striped table-hover" style="width:100%">
		<thead>
			<tr>
				<th>No</th>
				<th>Pengusul</th>
				<th>Judul</th>
				<th>Tahun Usulan</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data as $data) {
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data->nidn . ' - ' . $data->nama ?></td>
					<td><?= $data->usulan_judul ?></td>
					<td><?= $data->tgl_usulan ?></td>
				</tr>
			<?php
			}
			?>
	</table>
</body>

</html>