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

	$('#tablereviewer').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // NIDN
      { width: "30%" }, // Nama
      { width: "20%" }, // Jabatan
      { width: "15%" }, // status
      { width: "15%" }, // action
			
	],
	});

	$('#tblrvrw').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "25%" }, // NIDN
      { width: "35%" }, // Nama
      { width: "25%" }, // Jabatan
      { width: "10%" }, // check
			
	],
	});

	$('#tablecatatan').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "35%" }, // NIDN
      { width: "30%" }, // Nama
      { width: "15%" }, // Jabatan
      { width: "15%" }, // check
			
	],
	});

	$('#tablecatatanadm').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // NIDN
      { width: "20%" }, // Nama
      { width: "25%" }, // Judul
      { width: "15%" }, // Skim
      { width: "10%" }, // Status
      { width: "10%" }, // Action
	],
	});

	$('#tablesubmonevadm').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // tgl
      { width: "30%" }, // berita
      { width: "20%" }, // reviewer1
      { width: "20%" }, // reviewer2
      { width: "10%" }, // download
			
	],
	});

	$('#tablesubmonev').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // tanggal
      { width: "25%" }, // Berita acara
      { width: "15%" }, // review 1
      { width: "15%" }, // review 2
      { width: "15%" }, // Jabatan
      { width: "10%" }, // check
			
	],
	});

	$('#tablesubcatatan').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Tanggal
      { width: "30%" }, // Uraian
      { width: "15%" }, // Persetase
      { width: "15%" }, // File
      { width: "15%" }, // check
			
	],
	});

	$('#tablesubcatatanadmin').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Tanggal
      { width: "40%" }, // Uraian
      { width: "15%" }, // Persetase
      { width: "20%" }, // File
	],
	});

	$('#tablechild').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "30%" }, // Nama
      { width: "15%" }, // biaya
      { width: "10%" }, // kuota
      { width: "15%" }, // status
      { width: "25%" }, // action
			
	],
	});

	$('#tableskema').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Nama
      { width: "13%" }, // min
      { width: "15%" }, // max
      { width: "12%" }, // kuota
      { width: "15%" }, // status
      { width: "20%" }, // action
	],
	});
	$('#tablelembaga').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // Nama
      { width: "13%" }, // jabatan
      { width: "15%" }, // pimpinan
      { width: "12%" }, // pimpinanid
      { width: "15%" }, // lokasi
      { width: "20%" }, // action
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

	// $('#tableusulan').DataTable({
	// columns: [
    //   { width: "3%" }, // No
    //   { width: "20%" }, // Judul
    //   { width: "17%" }, // Skim
    //   { width: "10%" }, // Tahun usulan
    //   { width: "10%" }, // Tahun Ajar
    //   { width: "10%" }, // Review
    //   { width: "10%" }, // kelengkapan
    //   { width: "15%" }, // action
			
	// ],
	// });
	$('#tableusulan').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "25%" }, // Judul
      { width: "15%" }, // skema
      { width: "10%" }, // Tahun usulan
      { width: "10%" }, // Tahun Ajaran
      { width: "10%" }, // review
      { width: "10%" }, // kelengkapan
      { width: "15%" }, // action
			
	],
	});

	$('#tableusulanadmin').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // NIDN
      { width: "25%" }, // Judul
    //   { width: "6%" }, // Tahun usulan
      { width: "18%" }, // review
      { width: "10%" }, // kelengkapan
      { width: "8%" }, // hasilnilai
      { width: "18%" }, // action
			
	],
	});

	$('#tableusulanrvw').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "23%" }, // Judul
      { width: "20%" }, // Skim
      { width: "10%" }, // Tahun usulan
      { width: "15%" }, // Review
      { width: "15%" }, // kelengkapan
      { width: "7%" }, // action
			
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

	$('#tablebatasmin').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "40%" }, // Keterangan
      { width: "40%" }, // Keterangan
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
      { width: "15%" }, // skim
      { width: "33%" }, // judul
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
	$('#tablereport').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // pengusul
      { width: "37%" }, // Judul
      { width: "10%" }, // Tanggal
     	
	],
	});
	$('#tableapb').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "15%" }, // pengusul
      { width: "37%" }, // Judul
      { width: "10%" }, // dana apn 
      { width: "10%" }, // usulan apb 
      { width: "10%" }, // biaya lain
      { width: "20%" }, // sumber dana 
      { width: "10%" }, // dana disetujui
     	
	],
	});
	$('#tableusulanpenelitianadmin').DataTable({
	columns: [
      { width: "5%" }, // No
      { width: "20%" }, // pengusul
      { width: "20%" }, // Judul
      { width: "10%" }, // skim 
      { width: "13%" }, // status 
      { width: "7%" }, // tgl
      { width: "10%" }, // tglpelaksanaan 
      { width: "15%" }, // action
     	
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

function editableBatasminimal(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(data);
	$("#editId").val(exp[0]);
	$("#editNilai").val(exp[1]);
	$("#editTanggal").val(exp[2]);
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


function editableSkema(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log(exp);
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editBudgetmin").val(exp[2]);
	$("#editBudget").val(exp[3]);
	$("#editKuota").val(exp[4]);
	$("#editStatus").val(exp[5]);

	if (exp[5] == 'active') {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active" selected>Active</option>
								<option value="nonactive">Non Active</option>
                            </select></div>`);
	} else {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active">Active</option>
								<option value="nonactive" selected>Non Active</option>
                            </select></div>`);
	}
}

function editableChild(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	console.log("AAA");
	console.log(data);
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editBudget").val(exp[2]);
	$("#editKuota").val(exp[3]);
	$("#editParent").val(exp[4]);
	$("#editStatus").val(exp[5]);

	if (exp[5] == 'active') {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active" selected>Active</option>
								<option value="nonactive">Non Active</option>
                            </select></div>`);
	} else {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active">Active</option>
								<option value="nonactive" selected>Non Active</option>
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

function editablelembaga(param) {
	let data = $(param).data("id");
	let exp = data.split("~");
	$("#editId").val(exp[0]);
	$("#editNama").val(exp[1]);
	$("#editJabatan").val(exp[2]);
	$("#editPimpinan").val(exp[3]);
	$("#editPimpinanId").val(exp[4]);
	$("#editLokasi").val(exp[5]);
	$("#editStatus").val(exp[6]);

	if (exp[6] == 'active') {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active" selected>Active</option>
								<option value="nonactive">Non Active</option>
                            </select></div>`);
	} else {
		$('#status').html(`<div class="input-group input-group-merge">
							<select name="status" class="form-control" id="">
                                <option value="active">Active</option>
								<option value="nonactive" selected>Non Active</option>
                            </select></div>`);
	}
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

