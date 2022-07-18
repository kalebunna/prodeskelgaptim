<div class="container-fluid">
	<div class="page-header">
		<div class="row">
			<div class="col-sm-6">
				<h3><?= $page ?></h3>
			</div>
			<div class="col-sm-6">
				<!-- Bookmark Start-->
				<div class="bookmark">
					<ul>
						<li>
							<button class="btn btn-pill btn-secondary btn-air-primary text-white" data-bs-toggle="modal" data-bs-target="#input-excel">Add From Excel</button>
						</li>
					</ul>
				</div>
				<!-- Bookmark Ends-->
			</div>
		</div>
	</div>
</div>
<!-- Container-fluid starts-->

<div class="container-fluid">
	<div class="row">
		<div class="col-xl-12">
			<div class="card employee-status">
				<div class="card-header pb-0 d-flex justify-content-start">
					<h6 class="align-self-center">Filter Data</h6>
					<div class="input-group" style="max-width: 200px; margin-left: 10px; margin-right:10px;">
						<select class="form-select" id="lembaga">

							<?php
							if ($this->session) {
								# code...
							}
							foreach ($lembaga_pendidikan as $key) {
								# code...

							?>
								<option value="<?= $key["id_lembaga"] ?>"><?= $key["tingkat_lembaga"] ?></option>
							<?php
							}
							?>
						</select>
						<a href="#" class="input-group-text" onclick="filter_data()">
							<i class="icon-check"></i> </i>
						</a>
					</div>
					<h6 class="align-self-center">Status</h6>
					<div class="input-group" style="max-width: 200px; margin-left: 10px;">
						<select class="form-select" id="lembaga">
							<option value="1">Active</option>
							<option value="0">Innactive</option>
							<option value="all">Semua</option>
						</select>
						<a href="#" class="input-group-text" onclick="filter_data()">
							<i class="icon-check"></i> </i>
						</a>
					</div>
				</div>
				<div class="card-body">
					<div class="user-status table-responsive">
						<table class="table table-bordered table-hover" id="data">
							<thead>
								<tr>
									
								
								
								
								
								<th scope="col">NO KK</th>
									<th scope="col">NIK</th>
									<th scope="col">NAMA</th>
									<th scope="col">LAHIR</th>
									<th scope="col">TANGGAL LAHIR</th>
									<th scope="col">JENIS KELAMIN</th>
									<th scope="col">NO AKTA</th>
									<th scope="col">KELURAHAN</th>
									<th scope="col">KECAMATAN</th>
									<th scope="col">SHDK</th>
									<th scope="col">KD SHDK</th>
									<th scope="col">AYAH</th>
									<th scope="col">IBU</th>
									<th scope="col">NAMA KK</th>
									<th scope="col">ALAMAT</th>
									<th scope="col">RT</th>
									<th scope="col">RTRW</th>
									<th scope="col">STATUS</th>
									<th scope="col">AGAMA</th>
									<th scope="col">PENDIDIKAN</th>
									<th scope="col">PEKERJAAN</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- modal tambah -->
<div class="modal fade" id="input-excel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form action="<?= base_url("penduduk/add_data") ?>" class="mt-2" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Input Data Dari Excel</h5>
					<button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p>silahkan download template terlebih dahulu. Data guru Disesuikan dengan template dan pastikan bahwa data diinputkan dengan benar</p>
					<a href="<?= base_url("Guru/export_template") ?>" class="btn btn-primary">download templates</a>
					<p class="mt-2">setelah mengisi data guru, masukkan data excel dibawah ini</p>

					<input type="file" name="fileExcel" id="fileExcel" class="form-control">
				</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
					<button class="btn btn-primary" type="submit">Upload Data</button>
				</div>

			</div>
		</form>
	</div>
</div>

<script>
	var data_table = $('#data').DataTable({
		"ajax": "<?= base_url("Penduduk/get_data") ?>",
		"columns": [	
			{
				"data": "NO_KK"
			},
			{
				"data": "NIK"
			},
			{
				"data": "NAMA_LENGKAP"
			},
			{
				"data": "TMP_LHR"
			},
			{
				"data": "TGL_LHR"
			},
			{
				"data": "JK"
			},
			{
				"data": "NO_AKTA"
			},
			{
				"data": "KODE_KEL"
			},
			{
				"data": "KODE_KEC"
			},
			{
				"data": "SHDK"
			},
			{
				"data": "KD_SHDK"
			},
			{
				"data": "AYAH"
			},
			{
				"data": "IBU"
			},
			{
				"data": "NAMA_KK"
			},
			{
				"data": "ALAMAT"
			},
			{
				"data": "RT"
			},
			{
				"data": "RW"
			},
			{
				"data": "STATUS"
			},
			{
				"data": "AGAMA"
			},
			{
				"data": "DIDIK"
			},
			{
				"data": "KERJA"
			},
		]
	});
</script>
<!-- modal tambah -->