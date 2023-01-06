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
				<th>NIDN</th>
				<th>NAMA</th>
				<th>JUDUL</th>
				<th>SKIM</th>
				<th>PUSAT STUDI</th>
				<th>JABATAN</th>
				<th>DANA</th>
				<th>TAHUN</th>
				<th>ANGGOTA</th>
				<th>MAHASISWA</th>
				<th>STATUS</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1;
			foreach ($data as $data) {
			?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data['nidn'] ?></td>
					<td><?= $data['nama'] ?></td>
					<td><?= $data['usulan_judul'] ?></td>
					<td><?= $data['skim_name'] ?></td>
					<td><?= $data['pusat_studi_nama'] ?></td>
					<td><?= $data['anggota_posisi'] ?></td>
					<td><?= $data['usulan_biaya_confirm'] ?></td>
					<td><?= $data['tgl_usulan'] ?></td>
					<td><?= $data['anggota'] ?></td>
					<td><?= $data['mhs'] ?></td>
					<td><?= $data['status_desc']?></td>
				</tr>
			<?php
			}
			?>
	</table>
</body>

</html>