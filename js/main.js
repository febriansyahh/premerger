$(document).ready(function () {
	$('#example').DataTable();
	$('#tableskim').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Nama
      { width: "15%" }, // jabatan
      { width: "15%" }, // pagu min
      { width: "15%" }, // pagu max
      { width: "5%" }, // kuota
      { width: "10%" }, // status
      { width: "15%" }, // action
			
	],
	});

	$('#tableanggota').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "45%" }, // Judul
      { width: "20%" }, // Skim
      { width: "10%" }, // Tahun usulan
      { width: "10%" }, // status
      { width: "10%" }, // action
			
	],
	});

	$('#tableusulan').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "35%" }, // Judul
      { width: "20%" }, // Skim
      { width: "10%" }, // Tahun usulan
      { width: "10%" }, // Review
      { width: "10%" }, // kelengkapan
      { width: "10%" }, // action
			
	],
	});

	$('#tableaspek').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "70%" }, // Keterangan
      { width: "10%" }, // Keterangan
      { width: "15%" }, // action
			
	],
	});

	$('#tablecomponent').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "25%" }, // Keterangan
      { width: "45%" }, // Keterangan
      { width: "10%" }, // Keterangan
      { width: "15%" }, // action
			
	],
	});

	$('#tablepengajuan').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "10%" }, // tanggal
      { width: "18%" }, // skim
      { width: "30%" }, // judul
      { width: "10%" }, // tgl pelaksanaan
      { width: "10%" }, // status
      { width: "17%" }, // action
			
	],
	});

	$('#tablerevisi').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "10%" }, // tanggal
      { width: "18%" }, // skim
      { width: "37%" }, // judul
      { width: "10%" }, // point
      { width: "10%" }, // pelaksanaan
      { width: "10%" }, // action
			
	],
	});
});

// function editableJabatan(param) {
// 	console.log("AAAA");
// 	let data = $(param).data("id");
// 	let exp = data.split("~");
// 	console.log(data);
// 	$("#editkodeJbtns").val(exp[0]);
// 	$("#editUrutanJbtns").val(exp[1]);
// 	$("#editNmJbtsn").val(exp[2]);
// }

function editableJabatanDos(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editkodeJbtn").val(exp[0]);
	$("#editUrutanJbtn").val(exp[1]);
	$("#editNmJbtn").val(exp[2]);
	
}

function resetPassword(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#resetid").val(exp[0]);
	$("#resetusername").val(exp[1]);
	$("#resetnama").val(exp[2]);
}

function editablePemerikasaan(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

function editablePendidikan(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

function editableFaculty(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(exp[4]);
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editDekan").val(exp[2]);
	$("#editNip").val(exp[3]);
	$("#editExternal").val(exp[4]);

	if (exp[4] == '') {
		console.log('ini eskternal');
		$('#eksternal').html(`<select name="ekternal" class="form-control" id="">
                                <option value="1">Ya</option>
                                <option value="" selected>Tidak</option>
                            </select>`);
	} else {
		$('#eksternal').html(`<select name="ekternal" class="form-control" id="">
                                <option value="1" selected>Ya</option>
                                <option value="">Tidak</option>
                            </select>`);
	}
}

function editableProgdi(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(exp[3]);
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editFac").val(exp[2]);
	$("#editExternal").val(exp[3]);

	if (exp[3] == '') {
		console.log('ini eskternal');
		$('#eksternal').html(`<select name="ekternal" class="form-control" id="">
                                <option value="1">Ya</option>
                                <option value="" selected>Tidak</option>
                            </select>`);
	} else {
		$('#eksternal').html(`<select name="ekternal" class="form-control" id="">
                                <option value="1" selected>Ya</option>
                                <option value="">Tidak</option>
                            </select>`);
	}
}

function editableLuaran(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

function editableJabatan(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

function editablePangkat(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

function editableSkim(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editBudget").val(exp[2]);
	$("#editActive").val(exp[3]);
	$("#editEks").val(exp[4]);
	$("#editAnggotamin").val(exp[5]);
	$("#editAnggotamax").val(exp[6]);
	$("#editAnggotamhsmin").val(exp[7]);
	$("#editAnggotaeksmin").val(exp[8]);

	if (exp[3] == 'Active') {
		console.log('ini status');
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="Active" selected>Active</option>
								<option value="Non Active">Non Active</option>
                            </select></div>`);
	} else {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="Active">Active</option>
								<option value="Non Active" selected>Non Active</option>
                            </select></div>`);
	}

	if (exp[4] == '') {
		console.log('ini eskternal');
		$('#eksternal').html(`<div class="input-group input-group-merge">
							<select name="ekternal" class="form-control" id="">
                                <option value="1">Ya</option>
                                <option value="" selected>Tidak</option>
                            </select></div>`);
	} else {
		$('#eksternal').html(`<div class="input-group input-group-merge">
							<select name="ekternal" class="form-control" id="">
                                <option value="1" selected>Ya</option>
                                <option value="">Tidak</option>
                            </select></div>`);
	}
}

function editableStudi(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editKetua").val(exp[2]);
	$("#editNis").val(exp[3]);
}

function editableStatus(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
}

// function editableAspek(param) {
// 	let data = $(param).data("id");
// 	let exp = data.split("~");
// 	console.log(data);
// 	CKEDITOR.replace('aspek');
// 	$("#editId").val(exp[0]);
// 	$("#editketerangan").val(exp[1]);
// 	if (exp[1] != '') {
// 		$('#keterangan').html(`<textarea name="keterangan" class="form-control" id="aspek">${exp[1]}</textarea>`);
// 	} 
// 	$("#editnilai").val(exp[2]);
// }


// function editableFile(param) {
// 	let data = $(param).data("id");
// 	let exp = data.split("~");
// 	let type = exp[1].split(".");
// 	console.log(exp);
// 	console.log(type);
// 	console.log(type[1]);
// 	$("editID").val(exp[0]);
// 	$("editFile").val(exp[1]);
// 	console.log(base_url);
// 	console.log(base_url + '/upload/ajuan/' + exp[1]);
// 	if (type[1] != 'pdf') {
// 		$('#showpreview').html(`<img id="imgs" src="${base_url + '/upload/ajuan/' + exp[1]}" width="520px" height="350px" />`);
// 	} else {
// 		$('#showpreview').html(`<iframe src="${base_url + '/upload/ajuan/' + exp[1]}" height="520px" width="470px"></iframe>`);
// 	}
// }

// function readURL(input, type) {
// 	const [file] = input.files
// 	let fileType = file['type'];
// 	let validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];

// 	if (file) {
// 		if (!validImageTypes.includes(fileType)) {
// 			$('#showFile').html(`<iframe src="${URL.createObjectURL(file) }" height="520px" width="470px"></iframe>`);
// 			document.getElementById(type).value = URL.createObjectURL(file);
// 		} else {
// 			$('#showFile').html(`<img id="blah" src="${URL.createObjectURL(file)}" width="520px" height="350px" />`);
// 			document.getElementById(type).value = URL.createObjectURL(file);
// 		}
// 	}
// }

// function readURLEdit(input, type) {
// 	const [file] = input.files
// 	let fileType = file['type'];
// 	let validImageTypes = ['image/jpg', 'image/jpeg', 'image/png'];
	
// 		if (file) {
// 			// swal({
// 			//   title: "INFO !!",
// 			//   text: "Jika Sudah, Tekan Tombol Ajukan untuk Menyelesaikan Proses Pengajuan!",
// 			//   icon: "info",
// 			//   button: "Baik !",
// 			// })
// 			if (!validImageTypes.includes(fileType)) {
// 				$('#showFile').html(`<iframe src="${URL.createObjectURL(file)}" height="240px" width="470px"></iframe>`);
// 				document.getElementById(type).value = URL.createObjectURL(file);
// 			} else {
// 				$('#showFile').html(`<img id="blah" src="${URL.createObjectURL(file)}" width="240px" height="350px" />`);
// 				document.getElementById(type).value = URL.createObjectURL(file);
// 			}
// 	}

// }

